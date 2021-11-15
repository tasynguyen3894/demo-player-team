<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TeamRepositoryInterface;
use App\Http\Resources\TeamCollection as TeamCollectionResource;
use App\Http\Resources\Team as TeamResource;
use App\Http\Requests\TeamCreateRequest;
use App\Http\Requests\TeamUpdateRequest;

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

    public function find($teamId) {
        $team = $this->teamRepository->find($teamId);
        if(!$team) {
            return response()->json([
                'status' => false,
                'message' => 'Team not found'
            ], 404);
        }
        return (new TeamResource($team));
    }

    public function create(TeamCreateRequest $request) {
        $validator = $request->validator;
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $teamCreated = $this->teamRepository->create($request->validationData());
        
        return new TeamResource($teamCreated);
    }

    public function update(TeamUpdateRequest $request, int $teamId) {
        $team = $this->teamRepository->find($teamId);
        if(!$team) {
            return response()->json([
                'status' => false,
                'message' => 'Team not found'
            ], 404);
        }
        $validator = $request->validator;
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $teamUpdated = $this->teamRepository->save($teamId, $request->validationData());
        
        return new TeamResource($teamUpdated);
    }

    public function delete(int $teamId) {
        $team = $this->teamRepository->find($teamId);
        if(!$team) {
            return response()->json([
                'status' => false,
                'message' => 'Team not found'
            ], 404);
        }
        $this->teamRepository->delete($teamId);
        
        return response()->json([
            'status' => true,
            'message' => 'Delete successfully'
        ]);
    }
}
