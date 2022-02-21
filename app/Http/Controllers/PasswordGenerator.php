<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordGenerator extends Controller
{
    public function generate() {
        return view('password');
    }
}
