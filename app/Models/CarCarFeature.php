<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCarFeature extends Model
{
    use HasFactory;

    protected $table = "car_car_feature";

    protected $fillable = [
        "car_id",
        "feature_id",
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_car_feature', 'feature_id', 'car_id');
    }
}
