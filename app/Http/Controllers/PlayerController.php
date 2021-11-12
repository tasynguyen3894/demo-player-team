<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PlayerRepositoryInterface;
use App\Http\Resources\Player as PlayerResource;
use App\Http\Resources\PlayerCollection as PlayerCollectionResource;

class PlayerController extends Controller
{
    private $playerRepository;

    public function __construct(PlayerRepositoryInterface $playerRepository) {
        $this->playerRepository = $playerRepository;
    }

    public function get(Request $request) {
        if(!empty($request->get('search'))) {
            $this->playerRepository->searchKeyword($request->get('search'));
        }
        return new PlayerCollectionResource($this->playerRepository
            ->withCountry()
            ->withTeam()
            ->get()
        );
    }

    public function find(Request $request, $countryId) {
        return new PlayerResource($this->playerRepository
            ->withCountry()
            ->withTeam()
            ->find($countryId)
        );
    }
}
