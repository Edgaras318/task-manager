<?php

namespace App\Repositories;

use App\DTO\EntityLogDTO;
use App\Models\EntityLog;

class EntityLogRepository
{
    public function log(EntityLogDTO $dto): EntityLog
    {
        // Use the DTO's toArray() method to handle the data conversion
        return EntityLog::create($dto->toArray());
    }

    public function findByEntityId(int $entityId)
    {
        return EntityLog::where('entity_id', $entityId)->get();
    }

    public function find(int $id): ?EntityLog
    {
        return EntityLog::find($id);
    }

    public function delete(EntityLog $log): void
    {
        $log->delete();
    }

    public function all()
    {
        return EntityLog::all();
    }
}
