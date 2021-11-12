<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Country;

class Team extends JsonResource
{
    public static $wrap = 'team';

    public bool $_getCountry = true;

    public function __construct($resource) {
        parent::__construct($resource);
        $this->resource = $resource;
    }

    public function getCountry(bool $value = true) {
        $this->_getCountry = $value;
        return $this;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $team = [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status
        ];
        if($this->_getCountry) {
            $team['country'] = new Country($this->country);
        }
        return $team;
    }
}
