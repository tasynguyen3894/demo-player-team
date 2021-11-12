<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface TeamRepositoryInterface
{
    public function all(): Collection;

    public function get(): Collection;

    public function searchKeyword(string $keyword);

    public function withCountry();

    public function find($id);
}