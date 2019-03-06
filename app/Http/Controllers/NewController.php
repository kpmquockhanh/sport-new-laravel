<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use App\Vote;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [
            'news' => News::with('admin')->paginate(10),
        ];
        return view('be.news.index')-> with($viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be.news.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|string|max:70',
           'content' => 'required|string',
        ]);
        $insertData = $request->only([
            'title',
            'content'
        ]);
        $nameImg = $this->storeImg($request);

        if ($nameImg){
            $insertData['thumbnail'] = '/uploads/'.$nameImg;
        }

        $insertData['admin_id'] = Auth::guard('admin')->id();
//        dd($insertData);
        News::query()->create($insertData);

        return redirect(route('news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewData = [
            'new' => News::query()->findOrFail($id),
        ];

        return view('be.news.edit')->with($viewData);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $oldNews = News::query()->findOrFail($id);

        $this->validate($request, [
            'title' => 'required|string|max:70',
            'content' => 'required|string',
        ]);
        $insertData = $request->only([
            'title',
            'content'
        ]);
        $nameImg = $this->storeImg($request);

        if ($nameImg){
            $insertData['thumbnail'] = '/uploads/'.$nameImg;
            Storage::disk('upload')->delete(str_replace('/uploads/', '', $oldNews->thumbnail));
        }

        $oldNews->update($insertData);

        return redirect(route('news.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::query()->where('new_id', $id)->delete();
        Vote::query()->where('new_id', $id)->delete();
        News::destroy($id);

        return response()->json([
            'status' => true
        ], 201);
    }

    private function storeImg(Request $request)
    {
        if ($request->file('thumbnail'))
        {
            $name = time().'_'.Auth::guard('admin')->id().'.'.$request->file('thumbnail')->getClientOriginalExtension();

            Storage::disk('upload')->put($name, \Illuminate\Support\Facades\File::get($request->file('thumbnail')));

            return $name;
        }

        return null;
    }
}
