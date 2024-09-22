<?php

namespace App\Http\Controllers;

use App\Models\EntityLog;

use Illuminate\Routing\Controller;

class EntityLogController extends Controller
{
    public function all()
    {
        $logs = EntityLog::all();

        return response()->json($logs);
    }
}
