<?php

namespace App\Http\Controllers;

use App\Models\Whitelists;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WhiteListsControllerPage extends Controller
{
    public function show() {
        return Inertia::render('Admin/Whitelists', [
            'whitelists' => Whitelists::all()
        ]);
    }

    public function delete(Request $request) {
        $input = $request->input('id');
        $whitelist = Whitelists::findOrFail($input);
        $whitelist->delete();
        return redirect('/admin/whitelists');
    }

    public function update(Request $request) {
        $input = $request->input('id');
        $whitelist = Whitelists::find($input);
        $whitelist->status = 'Accepted';
        $whitelist->save();
        return redirect('/admin/whitelists');
    }

    public function getId($id) {
        return Inertia::render('Admin/SearchWhitelist', [
            'whitelist' => WhiteLists::find($id)
        ]);
    }
}
