<?php

namespace Nirmal\RoleRight\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'target_type',
        'target_id',
        'changes',
        'ip_address'
    ];

    protected $casts = [
        'changes' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    /**
     * Helper to log an action.
     */
    public static function log($action, $targetType, $targetId, $changes = [])
    {
        return self::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'target_type' => $targetType,
            'target_id' => $targetId,
            'changes' => $changes,
            'ip_address' => request()->ip(),
        ]);
    }
}
