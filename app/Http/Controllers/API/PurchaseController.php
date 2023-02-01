<?php

namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Models\Purchase;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $purchases = Purchase::with(["purchaseItems", "project"])->paginate(10);
        return PurchaseResource::collection($purchases);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PurchaseResource
     */
    public function store(StorePurchaseRequest $request)
    {
        $purchase = Purchase::create($request->all());
        return new PurchaseResource(
            $purchase->load(["purchaseItems", "project"])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Purchase $purchase
     * @return PurchaseResource
     */
    public function show(Purchase $purchase)
    {
        return new PurchaseResource(
            $purchase->load(["purchaseItems", "project"])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePurchaseRequest $request
     * @param Purchase $purchase
     * @return PurchaseResource
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        $purchase->update($request->all());
        return new PurchaseResource(
            $purchase->load(["purchaseItems", "project"])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Purchase $purchase
     * @return Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
