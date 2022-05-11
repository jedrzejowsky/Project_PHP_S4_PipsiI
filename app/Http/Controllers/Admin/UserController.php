<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __constrtuct(){
        $this->middleware('auth:1');
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'name'=>'required',
            'email'=>'required',
            'role_id'=>'required'
        ]);
    }

    public function index(){
        $users = User::all();
        return view('pages/users', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return back();
    }

    public function edit($id)
    {
        $user = User::where('id',$id)->first();

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validator($request->all())->validate();

        $user->role_id = $request->role_id;
        $user->save();

        session()->flash('message', 'User updated!');
        return redirect(route('admin.users'));
    }

    public function show($id)
    {
        $user =  User::where('id', $id)->firstOrFail();

        return view('admin/user/edit', compact('user'));
    }
}
