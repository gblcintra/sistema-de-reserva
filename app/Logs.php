<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
   	protected $table = 'logs';
   	protected $primaryKey = 'id';

    protected $guarded = ['_token'];

    static public function cadastrar($user_id, $message)
    {
        self::create([
            'description' => $message,
            'c_auth' => $user_id
        ]);
    }
}
