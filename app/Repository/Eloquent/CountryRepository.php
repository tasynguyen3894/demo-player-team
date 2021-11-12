<?php

namespace App\Repository\Eloquent;

use App\Models\Country;
use App\Repository\CountryRepositoryInterface;
use Illuminate\Support\Collection;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{

   /**
    * CountryRepository constructor.
    *
    * @param User $model
    */
    public function __construct(Country $model) {
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

    public function searchKeyword(string $keyword) {
        $this->model = $this->model
                            ->where('name', 'like', '%' . strtolower($keyword) . '%')
                            ->orWhere('code', 'like', '%' . strtolower($keyword) . '%');
        return $this;
    }
}