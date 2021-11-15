<?php
namespace App\Repository;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface TeamRepositoryInterface
{
    public function create(array $attributes): Model;

    public function save(int $id, array $attributes);

    public function all(): Collection;

    public function get(): Collection;

    public function delete(int $id);

    public function searchKeyword(string $keyword);

    public function withCountry();

    public function find($id);
}