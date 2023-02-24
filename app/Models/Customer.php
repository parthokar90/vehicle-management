<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Division;
use App\Models\District;
use App\Models\Thana;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function divisions(){
        return $this->belongsTo(Division::class,'division');
    }

    public function districts(){
        return $this->belongsTo(District::class,'district');
    }

    public function thanas(){
        return $this->belongsTo(Thana::class,'thana');
    }
}
