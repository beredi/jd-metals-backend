<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "is_company",
        "name",
        "lastname",
        "company_name",
        "address",
        "phone",
        "email",
        "pib",
        "maticni_broj",
    ];

    protected $attributes = [
        "is_company" => false,
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
