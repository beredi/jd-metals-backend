<?php

namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;
use App\Http\Resources\ProjectTypeResource;
use App\Models\ProjectType;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $projectTypes = ProjectType::paginate(10);
        return ProjectTypeResource::collection($projectTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectTypeRequest  $request
     * @return ProjectTypeResource
     */
    public function store(StoreProjectTypeRequest $request)
    {
        $projectType = ProjectType::create($request->all());
        return new ProjectTypeResource($projectType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return ProjectTypeResource
     */
    public function show(ProjectType $projectType)
    {
        return new ProjectTypeResource($projectType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectTypeRequest  $request
     * @param  \App\Models\ProjectType  $projectType
     * @return ProjectTypeResource
     */
    public function update(
        UpdateProjectTypeRequest $request,
        ProjectType $projectType
    ) {
        $projectType->update($request->all());
        return new ProjectTypeResource($projectType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectType $projectType)
    {
        $projectType->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
