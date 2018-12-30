<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class FeedCat extends Model
{

    protected $table='feed_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','description','language'
    ];


}
