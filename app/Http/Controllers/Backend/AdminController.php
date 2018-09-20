<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Admin View 
     * 
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('backend.admin');
    }
}
