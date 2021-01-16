<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Comments;

class NewsController extends Controller
{
    public function page()
    {
    	$news = News::get();
    	return view('techsite.blog',['news'=>$news]);
    	
    }
    public function add_news()
    {
    	$news = News::get();
    	return view('techsite.add_news',['news'=>$news]);
    }
    public function store(Request $request)
    {
    	News::create([
    		"title"=>$request->input("title"),
    		"author"=>$request->input("author"),
    		"text"=>$request->input("text"),
    	]);
        return redirect()->route('blog');
    }

        public function show($id)
    {
        $comments = Comments::where("news_id",$id)->get();
        $news = News::where("id",$id)->firstOrFail();
        return view('techsite.single',["new"=>$news],['comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id)->firstOrFail();
        return view('techsite.edit',['new'=>$new]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        News::where("id",$request->input("id"))->update([
            "title"=>$request->input("title"),
            "author"=>$request->input("author"),
            "text"=>$request->input("text"),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        News::where('id',$request->input('id'))->delete();
        return redirect()->route('blog');
    }
}
