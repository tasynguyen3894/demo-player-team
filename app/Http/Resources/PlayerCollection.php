<?php

namespace App\Http\Resources;

use App\Http\Resources\Player as PlayerResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlayerCollection extends ResourceCollection
{
    public static $wrap = null;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'players' => $this->collection->map(function (PlayerResource $team) {
                return $team->getCountry(true)->getTeam(true);
            })
        ];
    }
}
