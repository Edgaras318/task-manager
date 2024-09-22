<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityLog extends Model
{
    protected $fillable = ['entity_id', 'action', 'old_value', 'new_value'];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
