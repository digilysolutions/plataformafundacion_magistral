<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


interface ServiceInterface
{

    public function all(array $colums = ['*'], array $relations = []): Collection;
    public function all_is_activated($is_activated = null): Collection;

    public function allTrashed(): Collection;

    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends  = []
    ): ?Model;

    public function findTrashedById(int $modelId): ?Model;

    public function create(array $payload): ?Model;

    public function update(int $modelId, array $payload): ?Model;

    public function restoreById(int $modelId): bool;

    public function deleteById(int $modelId): bool;

    public function permanentlyDeleteById(int $modelId): bool;

    public function activateModule(int $modelId): bool;

    public function deactivateModule(int $modelId): bool;
}
