<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\ControllersCommand;

class FallbackController extends Controller
{
    public function __invoke()
    {
        return view('fallback');
    }
}
