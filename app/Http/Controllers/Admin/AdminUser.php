<?php

namespace App\Http\Controllers;

use App\MyModel;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        $myModel = AdminUser::all();
        return view('myview', ['myModels' => $myModels]);
    }
}


