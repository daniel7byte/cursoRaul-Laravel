<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
