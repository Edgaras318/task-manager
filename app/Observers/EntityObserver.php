<?php

namespace App\Observers;

use App\Models\Entity;
use App\Models\EntityLog;

class EntityObserver
{
    public function created(Entity $entity)
    {
        $this->logChange($entity, 'created', null, json_encode($entity->toArray()));
    }

    public function updated(Entity $entity)
    {
        $oldValues = json_encode($entity->getOriginal());
        $newValues = json_encode($entity->toArray());
        $this->logChange($entity, 'updated', $oldValues, $newValues);
    }

    public function deleted(Entity $entity)
    {
        $this->logChange($entity, 'deleted', json_encode($entity->toArray()), null);
    }

    private function logChange(Entity $entity, string $action, ?string $oldValue, ?string $newValue)
    {
        EntityLog::create([
            'entity_id' => $entity->id,
            'action' => $action,
            'old_value' => $oldValue,
            'new_value' => $newValue,
        ]);
    }
}
