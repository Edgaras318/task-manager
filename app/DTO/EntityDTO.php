<?php

namespace App\DTO;

class EntityDTO
{
    public string $title;
    public string $description;
    public string $creator;
    public ?string $tester;
    public ?string $assignee;
    public string $status;
    public string $type;

    public function __construct(array $data)
    {
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->creator = $data['creator'];
        $this->tester = $data['tester'] ?? null;
        $this->assignee = $data['assignee'] ?? null;
        $this->status = $data['status'];
        $this->type = $data['type'];
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'creator' => $this->creator,
            'tester' => $this->tester,
            'assignee' => $this->assignee,
            'status' => $this->status,
            'type' => $this->type,
        ];
    }
}
