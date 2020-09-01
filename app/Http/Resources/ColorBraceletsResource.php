<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ColorBraceletsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'colorSunday' => $this->colorSunday,
            'colorMonday' => $this->colorMonday,
            'colorTuesday' => $this->colorTuesday,
            'colorWednesday' => $this->colorWednesday,
            'colorThursday' => $this->colorThursday,
            'colorFriday' => $this->colorFriday,
            'colorSaturday' => $this->colorSaturday
        
        ];
    }
}
