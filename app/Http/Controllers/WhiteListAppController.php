<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Whitelists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhiteListAppController extends Controller
{
    use PasswordValidationRules;


    public function create(array $input) {
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fullname' => ['required', 'string', 'max:255'],
            'fivemHours' => ['required', 'number', 'max:20'],
            'steamName' => ['required', 'string', 'max:20', 'unique:users'],
            'story' => ['required', 'string', 'max:500']
        ])->validate();

        return Whitelists::create([
            'email' => $input['name'],
            'fullname' => $input['fullname'],
            'fivemHours' => $input['fivemHours'],
            'steamName' => $input['steamName'],
            'story' => $input['story'],
            'status' => 'Pending'
        ]);
    }
}
