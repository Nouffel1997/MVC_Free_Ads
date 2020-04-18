<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table = 'ads';

    

    public function user()
    {
        return $this->belongsTo('App\User');
        
    }




}
