<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [
//            'auth' => Auth::user(),
            'users' => User::query()->paginate(10),
        ];

        return view('be.users.index')->with($viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'user' => User::query()->findOrFail($id),
        ];

        return view('be.users.edit')->with($viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);

        $updateData = $this->getUpdateData($request);

        $nameImg = $this->storeImg($request);

        if ($nameImg){
            $updateData['ava'] = '/uploads/'.$nameImg;
            Storage::disk('upload')->delete(str_replace('/uploads/', '', $user->ava));
        }

        $user->update($updateData);

        $request->session()->flash('message', 'Update successful!');
        return redirect(route('users.edit', ['id' => $id]));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy($id)
    {
        Comment::query()->where('user_id', $id)->delete();
        Vote::query()->where('user_id', $id)->delete();
        User::destroy($id);

        return response()->json([
            'status' => true
        ], 201);
    }

    private function storeImg(Request $request)
    {
        if ($request->file('ava'))
        {
            $name = time().'_'.Auth::guard('admin')->id().'.'.$request->file('ava')->getClientOriginalExtension();

            Storage::disk('upload')->put($name, \Illuminate\Support\Facades\File::get($request->file('ava')));

            return $name;
        }

        return null;
    }

    private function getUpdateData(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'confirmed'
        ]);

        $result = [];

        if ($request->name) $result['name'] = $request->name;
        if ($request->password) $result['password'] = bcrypt($request->password);
        if ($request->email) $result['email'] = $request->email;
        return $result;
    }
}
