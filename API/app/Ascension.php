<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ascension extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level', 'stone', 'lvl_stone', 'core', 'flower', 'item', 'lvl_item', 'moras', 'xp1', 'xp2', 'xp3'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
