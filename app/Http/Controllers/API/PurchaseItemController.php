<?php

namespace app\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseItemRequest;
use App\Http\Requests\UpdatePurchaseItemRequest;
use App\Http\Resources\PurchaseItemResource;
use App\Models\PurchaseItem;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $purchaseItems = PurchaseItem::with(["unit", "product"])->paginate(10);
        return PurchaseItemResource::collection($purchaseItems);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseItemRequest  $request
     * @return PurchaseItemResource
     */
    public function store(StorePurchaseItemRequest $request)
    {
        $purchaseItem = PurchaseItem::create($request->all());
        return new PurchaseItemResource(
            $purchaseItem->load(["unit", "purchase", "product"])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseItem  $purchaseItem
     * @return PurchaseItemResource
     */
    public function show(PurchaseItem $purchaseItem)
    {
        return new PurchaseItemResource(
            $purchaseItem->load(["unit", "purchase", "product"])
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseItemRequest  $request
     * @param  \App\Models\PurchaseItem  $purchaseItem
     * @return PurchaseItemResource
     */
    public function update(
        UpdatePurchaseItemRequest $request,
        PurchaseItem $purchaseItem
    ) {
        $purchaseItem->update($request->all());
        return new PurchaseItemResource(
            $purchaseItem->load(["unit", "purchase", "product"])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseItem  $purchaseItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->delete();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
