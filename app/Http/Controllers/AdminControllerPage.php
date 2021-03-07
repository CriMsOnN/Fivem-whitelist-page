<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminControllerPage extends Controller
{

    public function show(Request $request) {
        return Inertia::render('Admin/admin_default', [
            'name' => $request->user()->name
        ]);
    }
}
