<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    function index()
    {
        return view('admin.pages.profile.profile');
    }

    function edit()
    {
        return view('admin.pages.profile.edit-profile');
    }
}