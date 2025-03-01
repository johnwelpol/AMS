<?php

namespace App\Modules\Management\Model;

use Illuminate\Database\Eloquent\Model;

class BillingStatus extends Model
{
    protected $fillable = [];

    public function bills(){
        return $this->hasMany('App\Bill');        
    }
}
