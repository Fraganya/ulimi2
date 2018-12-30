<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Feed extends Model
{

    protected $table='feeds';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','content','sample_picture','user_id','feed_category_id','language'
    ];


    public function category()
    {
        return $this->belongsTo('App\FeedCat','feed_category_id','id');
    }

}
