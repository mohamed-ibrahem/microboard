<?php

namespace Microboard\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function __invoke()
    {
        return view('microboard::home');
    }
}
