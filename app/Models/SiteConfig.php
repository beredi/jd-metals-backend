<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "address",
        "logo",
        "phone",
        "owner",
        "pib",
        "maticni_broj",
    ];

    public function getLogoAttribute($value)
    {
        return $value ? asset("storage/" . $value) : null;
    }
}
