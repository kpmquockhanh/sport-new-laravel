<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::getNews();
        $trends = News::getTrending(3);
        $randoms = News::getTrending(4);
        $viewData =[
            'news' => $news,
            'trends' => $trends,
            'randoms' => $randoms,
        ];

//        dd($news);
        return view('FE.Home.index')->with($viewData);
    }
}
