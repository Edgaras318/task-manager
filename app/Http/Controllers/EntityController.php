<?php

namespace App\Http\Controllers;

use App\DTO\CommentDTO;
use App\DTO\EntityDTO;
use App\Http\Requests\StoreEntityRequest;
use App\Http\Requests\UpdateEntityRequest;
use App\Services\EntityService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EntityController extends Controller
{
    protected $entityService;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }

    public function all()
    {
        $entities = $this->entityService->all();

        return response()->json($entities);
    }

    public function store(StoreEntityRequest $request)
    {
        $dto = new EntityDTO($request->validated());
        $entity = $this->entityService->create($dto);

        return response()->json($entity, 201);
    }

    public function update(UpdateEntityRequest $request, int $id)
    {
        $validated = $request->validated();
        $entityDTO = new EntityDTO($validated);
        $entity = $this->entityService->update($id, $entityDTO);

        return response()->json($entity);
    }

    public function destroy(int $id)
    {
        $this->entityService->delete($id);

        return response()->json(null, 204);
    }

    public function changeStatus(Request $request, int $id)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:50',
        ]);

        $entity = $this->entityService->changeStatus($id, $validated['status']);

        return response()->json($entity);
    }

    public function changeType(Request $request, int $id)
    {
        $validated = $request->validate([
            'type' => 'required|string|max:50',
        ]);

        $entity = $this->entityService->changeType($id, $validated['type']);

        return response()->json($entity);
    }

    public function addComment(Request $request, int $entityId)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
            'parent_id' => 'nullable|integer|exists:comments,id', // For replies
        ]);

        $validated['entity_id'] = $entityId;
        $commentDTO = new CommentDTO($validated);
        $comment = $this->entityService->addComment($entityId, $commentDTO);

        return response()->json($comment, 201);
    }

    public function show(int $id)
    {
        $entity = $this->entityService->find($id);

        return response()->json($entity);
    }
}


