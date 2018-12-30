<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Seed extends Model
{

    protected $table='seeds';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','content','sample_picture','user_id','seed_category_id','language'
    ];


    public function category()
    {
        return $this->belongsTo('App\SeedCat','seed_category_id','id');
    }

}
