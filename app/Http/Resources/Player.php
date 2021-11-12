<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Country;
use App\Http\Resources\Team;

class Player extends JsonResource
{
    public static $wrap = 'player';

    public bool $_getCountry = true;

    public bool $_getTeam = true;

    public function __construct($resource) {
        parent::__construct($resource);
        $this->resource = $resource;
    }

    public function getCountry(bool $value = true) {
        $this->_getCountry = $value;
        return $this;
    }

    public function getTeam(bool $value = true) {
        $this->_getTeam = $value;
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
        $player = [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'birthday' => $this->birthday,
        ];
        if($this->_getCountry) {
            $player['country'] = new Country($this->country);
        }
        if($this->_getTeam) {
            $player['team'] = new Team($this->team);
        }
        return $player;
    }
}
