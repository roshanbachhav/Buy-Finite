<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{

    public function aboutUs()
    {
        return view('legal.AboutUs');
    }

    public function faq()
    {
        return view('legal.FAQ');
    }

    public function payment()
    {
        return view('legal.Payments');
    }

    public function privacyPolicy()
    {
        return view('legal.Privacy_Policy');
    }

    public function termCondition()
    {
        return view('legal.Term_Condition');
    }
}