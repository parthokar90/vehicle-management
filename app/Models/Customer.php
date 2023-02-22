<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function district(){
        return $this->hasOne(District::class,'district');
    }
}
