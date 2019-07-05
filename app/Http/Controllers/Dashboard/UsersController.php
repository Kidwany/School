<?php

namespace App\Http\Controllers\Dashboard;

use App\Image;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $this->validate($request,[
            'name'      => 'required|max:100',
            'email'     => 'required|unique:users|max:100',
            'password'  => 'required|min:6|confirmed',
            'image_id'  => 'image'
        ], [], [
            'email'     => 'Email',
            'password'  => 'Password',
            'image_id'  => 'Image'
        ]);

        if ($file = $request->file('image_id'))
        {
            $name =  time() . $file->getClientOriginalName();

            $file->move('images/dashboard/users', $name);

            $path = 'images/dashboard/users/' . $name;

            $image = Image::create(['name' => $name, 'path' => $path]);

            $input['image_id'] = $image->id;
        }

        $user = User::create($input);
        Session::flash('create', 'User ' . $user->name . ' Has Been Created Successfully');

        return redirect('admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::with('role')->find($id);
        return view('dashboard.users.edit', compact('user', 'roles'));
    }





    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $user = User::find($id);

        $this->validate($request,[
            'name'      => 'required|max:100',
            'email'     => 'required|unique:users,id,'. $id .'|max:100',
            'password'  => 'required|min:6|confirmed',
            'image_id'  => 'image'
        ], [], [
            'email'     => 'Email',
            'password'  => 'Password',
            'image_id'  => 'Image'
        ]);

        if ($file = $request->file('image_id'))
        {
            $name =  time() . $file->getClientOriginalName();

            $file->move('images/dashboard/users', $name);

            $path = 'images/dashboard/users/' . $name;

            $image = Image::create(['name' => $name, 'path' => $path]);

            $input['image_id'] = $image->id;
        }

        $user->update($input);

        Session::flash('update', 'User ' . $user->name . ' Has Been Updated Successfully');
        return redirect('admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        try
        {
            $user->delete();
        }
        catch (\Exception $e)
        {
            Session::flash('exception', 'Error, Can\'t Delete User Because The user is related to another table');
            return redirect()->back();
        }

        Session::flash('delete', 'User ' . $user->name . ' Has Been Deleted Successfully');
        return redirect('admin/users');
    }
}
