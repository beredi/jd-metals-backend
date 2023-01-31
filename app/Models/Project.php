<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "project_type_id",
        "description",
        "planned_start",
        "planned_end",
        "real_start",
        "real_end",
        "customer_id",
    ];

    public function projectType()
    {
        return $this->hasOne(ProjectType::class, "id", "project_type_id");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
