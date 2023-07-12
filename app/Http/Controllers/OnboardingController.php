<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    public function index(string $step)
    {
        $view = "theme::onboarding.step-$step";
        if(view()->exists($view)){
            return view($view);
        }
        return abort(404);
    }
}
