<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    protected $table = "car_brands";

    protected $fillable = [
        "name"
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public function cars() {
        return $this->hasMany(Car::class, "brand", "id");
    }
}
