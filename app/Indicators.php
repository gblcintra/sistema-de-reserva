<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicators extends Model
{
   	protected $table = 'indicators';
   	protected $primaryKey = 'id';


	public function user(){
		return $this->belongsTo('App\User', 'user_id');
	}

    protected $guarded = ['_token'];
}
