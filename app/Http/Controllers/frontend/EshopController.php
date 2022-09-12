<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;


class EshopController extends Controller
{
    public function eshop()

    {
        // echo "this is webpack";
        return view('frontend.layout.app');
    }
}