<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'description', 'creator', 'tester', 'assignee', 'status', 'type'
    ];

    protected $with = ['comments'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function logs()
    {
        return $this->hasMany(EntityLog::class);
    }
}
