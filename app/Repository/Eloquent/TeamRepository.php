<?php

namespace App\Repository\Eloquent;

use App\Models\Team;
use App\Repository\TeamRepositoryInterface;
use Illuminate\Support\Collection;

class TeamRepository extends BaseRepository implements TeamRepositoryInterface
{

   /**
    * TeamRepository constructor.
    *
    * @param Team $model
    */
    public function __construct(Team $model) {
        parent::__construct($model);
    }

   /**
    * @return Collection
    */
    public function all(): Collection {
        return $this->model->all();    
    }

    /**
    * @return Collection
    */
    public function get(): Collection {
        return $this->model->get();    
    }

    public function withCountry() {
        $this->model = $this->model->with('country');
        return $this;
    }

    public function searchKeyword(string $keyword) {
        $this->model = $this->model->where('name', 'like', '%' . strtolower($keyword) . '%');
        return $this;
    }
}