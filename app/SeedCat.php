<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SeedCat extends Model
{

    protected $table='seed_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description','language'
    ];


}
