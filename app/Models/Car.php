<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    protected $fillable = [
        "name",
        "type",
        "brand",
        "year"
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public function type() {
        return $this->hasOne(CarType::class, "id", "type");
    }

    public function brand() {
        return $this->hasOne(CarBrand::class, "id", "brand");
    }
}
