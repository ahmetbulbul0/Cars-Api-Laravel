<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    use HasFactory;

    protected $table = "car_types";

    protected $fillable = [
        "name"
    ];

    protected $hidden = [
        "updated_at",
        "created_at"
    ];

    public function cars() {
        return $this->hasMany(Car::class, "type", "id");
    }
}
