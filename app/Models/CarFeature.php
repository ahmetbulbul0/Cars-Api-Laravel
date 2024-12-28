<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeature extends Model
{
    use HasFactory;

    protected $table = "car_features";

    protected $fillable = [
        "name",
        "description",
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];
}
