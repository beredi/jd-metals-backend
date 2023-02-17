<?php

namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiteConfigRequest;
use App\Http\Requests\UpdateSiteConfigRequest;
use App\Http\Resources\SiteConfigResource;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SiteConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SiteConfigResource::collection(SiteConfig::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiteConfigRequest  $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function store(StoreSiteConfigRequest $request)
    {
        $siteConfig = SiteConfig::create($request->all());

        if ($request->hasFile("logo")) {
            $siteConfig->logo = $request
                ->file("logo")
                ->store("public/siteconfigs");
        }

        $siteConfig->save();

        return (new SiteConfigResource($siteConfig))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteConfig  $siteConfig
     * @return SiteConfigResource
     */
    public function show(SiteConfig $siteConfig)
    {
        return new SiteConfigResource($siteConfig);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiteConfigRequest  $request
     * @param  \App\Models\SiteConfig  $siteConfig
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function update(
        UpdateSiteConfigRequest $request,
        SiteConfig $siteConfig
    ) {
        $siteConfig->update($request->all());

        if ($request->hasFile("logo")) {
            Storage::delete($siteConfig->logo);
            $siteConfig->logo = $request
                ->file("logo")
                ->store("public/siteconfigs");
        }

        $siteConfig->save();

        return (new SiteConfigResource($siteConfig))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteConfig  $siteConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteConfig $siteConfig)
    {
        $siteConfig->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }

    /**
     * @return SiteConfigResource
     */
    public function getSiteConfig()
    {
        $siteConfig = SiteConfig::first();

        return new SiteConfigResource($siteConfig);
    }
}
