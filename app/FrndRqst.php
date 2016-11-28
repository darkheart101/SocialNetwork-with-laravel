<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FrndRqst extends Model {
	
    public function userFrnd(){
        return $this->belongsTo('App\User');
    }
}
