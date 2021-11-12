<?php

namespace App\Repository\Eloquent;

use App\Models\Player;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Support\Collection;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{

   /**
    * TeamRepository constructor.
    *
    * @param Player $model
    */
    public function __construct(Player $model) {
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

    public function withTeam() {
        $this->model = $this->model->with('team');
        return $this;
    }

    public function searchKeyword(string $keyword) {
        $this->model = $this->model->where('name', 'like', '%' . strtolower($keyword) . '%');
        return $this;
    }
}