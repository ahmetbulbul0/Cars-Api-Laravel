<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    protected $fillable = [
        "model_name",
        "brand_id",
        "type_id",
        "production_year",
        "color",
        "engine_type",
        "horsepower",
        "torque",
        "transmission",
        "fuel_consumption",
        "price",
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'brand_id');
    }

    public function type()
    {
        return $this->belongsTo(CarType::class, 'type_id');
    }

    public function features()
    {
        return $this->belongsToMany(CarFeature::class, 'car_car_feature', 'car_id', 'feature_id');
    }
}
