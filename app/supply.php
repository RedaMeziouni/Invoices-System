<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supply extends Model
{
    //1st Methode
    // protected $guarded = [];

    // 2nd Method
    protected $fillable = [
        'supply_name',
        'section_name',
        'description',
        'section_id'
    ];
}
