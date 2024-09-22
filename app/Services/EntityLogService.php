<?php

namespace App\Services;

use App\DTO\EntityLogDTO;
use App\Models\EntityLog;
use App\Repositories\EntityLogRepository;

class EntityLogService
{
    protected $entityLogRepository;

    public function __construct(EntityLogRepository $entityLogRepository)
    {
        $this->entityLogRepository = $entityLogRepository;
    }

    // Create a new entity log
    public function create(EntityLogDTO $dto): EntityLog
    {
        return $this->entityLogRepository->create($dto->toArray());
    }

    // Retrieve all logs for a specific entity
    public function getLogsForEntity(int $entityId)
    {
        return $this->entityLogRepository->findByEntityId($entityId);
    }

    // Optionally, you can implement other methods like update or delete logs
}
