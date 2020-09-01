<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camping extends Model
{
    protected $fillable = ['seatLimit',
                            'dailyValue',
                            'colorMonday',
                            'colorTuesday',
                            'colorWednesday',
                            'colorThursday',
                            'colorFriday',
                            'colorSaturday',
                            'colorSunday',
                            'colorOuther'
                        ];
    
}
