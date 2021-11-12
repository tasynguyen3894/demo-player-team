<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TeamRepositoryInterface;
use App\Http\Resources\TeamCollection as TeamCollectionResource;
use App\Http\Resources\Team as TeamResource;

class TeamController extends Controller
{
    private $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository) {
        $this->teamRepository = $teamRepository;
    }

    public function get(Request $request) {
        if(!empty($request->get('search'))) {
            $this->teamRepository->searchKeyword($request->get('search'));
        }
        return new TeamCollectionResource($this->teamRepository->withCountry()->get());
    }

    public function find(Request $request, $teamId) {
        return (new TeamResource($this->teamRepository->find($teamId)))->getCountry(true);
    }
}
