<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\News;

class CommentsController extends Controller
{
	public function page()
	{
		$comments = Comments::get();
		$news = News::get();
		return view('techsite.single',['comments'=>$comments],['news'=>$news]);
	}
    public function store(Request $request)
    {
    	Comments::create([
            "news_id"=>$request->input("id"),
    		"name"=>$request->input("name"),
    		"email"=>$request->input("gmail"),
    		"comment"=>$request->input("comment"),
    	]);
        return redirect()->back();
    }
}


