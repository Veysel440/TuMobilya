<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class ActivityLogger
{
    public static function log(string $action, string $model, int $modelId)
    {
        ActivityLog::create([
            'action' => $action,
            'model' => $model,
            'model_id' => $modelId,
        ]);
    }
}
