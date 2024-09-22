<?php

namespace App\DTO;

class EntityLogDTO
{
    public int $entityId;
    public string $action;
    public ?string $oldValue;
    public ?string $newValue;

    public function __construct(array $data)
    {
        $this->entityId = $data['entity_id'];
        $this->action = $data['action'];
        $this->oldValue = $data['old_value'] ?? null;
        $this->newValue = $data['new_value'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'entity_id' => $this->entityId,
            'action' => $this->action,
            'old_value' => $this->oldValue,
            'new_value' => $this->newValue,
        ];
    }
}
