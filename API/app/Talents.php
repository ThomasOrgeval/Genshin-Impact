<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talents extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'core', 'book', 'lvl_book', 'item', 'lvl_item', 'moras', 'crown'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
