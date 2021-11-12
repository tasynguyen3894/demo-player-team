<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CountryCollection as CountryCollectionResource;
use App\Http\Resources\Country as CountryResource;
use App\Repository\CountryRepositoryInterface;

class CountryController extends Controller
{
    private $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository) {
        $this->countryRepository = $countryRepository;
    }

    public function get(Request $request) {
        if(!empty($request->get('search'))) {
            $this->countryRepository->searchKeyword($request->get('search'));
        }
        return new CountryCollectionResource($this->countryRepository->get());
    }

    public function find(Request $request, $countryId) {
        return new CountryResource($this->countryRepository->find($countryId));
    }
}