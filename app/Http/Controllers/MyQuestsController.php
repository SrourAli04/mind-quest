<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyQuestsController extends Controller
{
    public function index()
    {
        return view('My_Quests');
    }
}
