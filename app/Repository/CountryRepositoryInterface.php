<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface CountryRepositoryInterface
{
    public function all(): Collection;

    public function get(): Collection;

    public function searchKeyword(string $keyword);

    public function find($id);
}