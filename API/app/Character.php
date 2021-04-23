<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'label', 'element', 'weapon', 'rarity',
        'lvl_up_material1', 'lvl_up_material2', 'lvl_up_material3',
        'talent_up_material1', 'talent_up_material2', 'talent_up_material3'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
