<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function departments()
    {
        $departments = Department::all();

        return view('departments', compact('departments'));
    }
}