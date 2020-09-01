<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
   	protected $table = 'reports';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];
}
