<?php

namespace App\Http\Controllers;

use App\News;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

    public function profile()
    {
        $user = Auth::user();

        $viewData = [
            'user' => $user
        ];

        return view('fe.profile')->with($viewData);
    }

    public function updateProfile(Request $request)
    {
        Auth::user()->update($this->getUpdateData($request));
        $request->session()->flash('message', 'Update successful!');
        return redirect(route('user.profile'));
    }

    private function getUpdateData(Request $request)
    {
        $this->validate($request, [
            'name' => 'string',
            'password' => 'confirmed'
        ]);
        $result = [];
        if ($request->name) $result['name'] = $request->name;
        if ($request->password) $result['password'] = bcrypt($request->password);
        return $result;
    }
}
