<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function mark(){
        return $this->hasMany('App\Mark');
    }
}
