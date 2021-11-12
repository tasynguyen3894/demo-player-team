<?php

namespace App\Http\Resources;

use App\Http\Resources\Team as TeamResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamCollection extends ResourceCollection
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
            'teams' => $this->collection->map(function (TeamResource $team) {
                return $team->getCountry(true);
            })
        ];
    }
}
