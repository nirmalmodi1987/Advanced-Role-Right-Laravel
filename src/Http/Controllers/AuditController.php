<?php

namespace Nirmal\RoleRight\Http\Controllers;

use Illuminate\Routing\Controller;
use Nirmal\RoleRight\Models\AuditLog;

class AuditController extends Controller
{
    /**
     * Display a listing of the audit logs.
     */
    public function index()
    {
        $logs = AuditLog::with('user')->latest()->paginate(20);
        return view('role-right::audit-logs.index', compact('logs'));
    }
}
