<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companions extends Model
{
    protected $fillable = [

        'name_responsible',
        'cpf_responsible',
        'name',
        'free',
        'sock',
        'entire',
        'age',
        'cpf',
        'birth',
    ];
}
