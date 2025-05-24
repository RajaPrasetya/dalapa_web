<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    public static function log($action, $description = null)
    {
        return Activity::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'description' => $description,
            'created_at' => now(),
        ]);
    }
}