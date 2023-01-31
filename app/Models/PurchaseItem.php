<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_id",
        "unit_id",
        "price",
        "count",
        "purchase_id",
    ];

    protected $with = ["unit", "product"];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, "id", "unit_id");
    }

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }
}
