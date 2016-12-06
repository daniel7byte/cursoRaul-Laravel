<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description'
    ];

    public function user()
    {
        //return $this->belongsTo('App\User');
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function commentary()
    {
        return $this->hasMany('App\Commentary', 'commentary_id', 'id');
    }
}
