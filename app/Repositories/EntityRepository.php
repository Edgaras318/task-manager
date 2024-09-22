<?php

namespace App\Repositories;

use App\Models\Entity;
use Illuminate\Support\Collection;

class EntityRepository
{
    public function create(array $data): Entity
    {
        return Entity::create($data);
    }

    public function find(int $id): ?Entity
    {
        return Entity::find($id);
    }

    public function update(Entity $entity, array $data): Entity
    {
        $entity->update($data);
        return $entity;
    }

    public function delete(Entity $entity): void
    {
        $entity->delete();
    }

    public function all(): Collection
    {
        // To see deleted as well for testing purpose
        return Entity::withTrashed()->get();
    }
}

