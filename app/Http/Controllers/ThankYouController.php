<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ThankYouController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        if (! app()->isProduction()) {
            return view('pages.thank-you');
        }

        if (Session::has('master_form_submitted') && Session::get('master_form_submitted') === true) {
            return view('pages.thank-you');
        }

        return redirect()->route('home');
    }
}
