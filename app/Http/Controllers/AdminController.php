<?php

namespace App\Http\Controllers;

use App\Admin;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = [
            'admins' => Admin::query()->paginate(10),
        ];
        return view('be.operator.index')-> with($viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be.operator.create');
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
        Admin::query()->create($insertData);

        return redirect(route('operator.index'));
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
            'admin' => Admin::query()->findOrFail($id),
        ];

        return view('be.operator.edit')->with($viewData);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $admin = Admin::query()->findOrFail($id);

        $updateData = $this->getUpdateData($request);

        $nameImg = $this->storeImg($request);
        if ($nameImg){
            $updateData['ava'] = '/uploads/'.$nameImg;
            Storage::disk('upload')->delete(str_replace('/uploads/', '', $admin->ava));
        }
        $admin->update($updateData);

        $request->session()->flash('message', 'Update successful!');
        return redirect(route('operators.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::query()->where('admin_id', $id)->delete();
        Admin::destroy($id);

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
