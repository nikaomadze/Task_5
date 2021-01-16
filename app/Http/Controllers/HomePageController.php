<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;

class HomePageController extends Controller
{
    public function index()
    {
    	$comments = Comments::get();
    	return view('/TechSite/index');
    }
}
