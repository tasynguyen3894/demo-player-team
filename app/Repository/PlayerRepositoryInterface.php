<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface PlayerRepositoryInterface
{
    public function all(): Collection;

    public function get(): Collection;

    public function searchKeyword(string $keyword);

    public function withCountry();

    public function withTeam();

    public function find($id);
}