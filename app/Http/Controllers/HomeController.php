<?php

namespace App\Http\Controllers;

use App\News;
use http\Client\Curl\User;
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
            'news' => $news->load('admin', 'comments'),
            'trends' => $trends,
            'randoms' => $randoms,
        ];

//        dd($news);
        return view('FE.Home.index')->with($viewData);
    }

    public function getNew(Request $request, $id)
    {
        $new = News::with('admin', 'comments')
            ->findOrFail($id);
        $viewData =[
            'new' => $new,
        ];

        $new->increment('view');

        return view('fe.home.detail')->with($viewData);
    }

    public function profile($id)
    {
        $user = \App\User::query()
            ->findOrFail($id);

        $viewData = [
            'user' => $user
        ];

        return view('fe.profile')->with($viewData);
    }
}
