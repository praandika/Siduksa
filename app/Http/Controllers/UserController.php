<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('name','asc')->get();
        return view('page', compact('data'));
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
        $data = new User;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->position = $request->position;
        $data->roles = $request->roles;
        $data->save();
        toast('Data user berhasil disimpan','success');
        return redirect()->route('user.index')->with('display', true);
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
    public function edit(User $user)
    {
        return view('page', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = User::find($user->id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->position = $request->position;
        $data->roles = $request->roles;
        $data->update();
        toast('Data user berhasil disimpan','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request, $id){
        $old = $request->oldpassword;
        $new = $request->password;

        $data = User::find($id);

        if (Hash::check($old, $data->password)) {
            $data->password = Hash::make($new);
            $data->save();
            toast('Password '.$data->username.' berhasil diubah','success');
            return redirect()->route('logout.action');
        } else {
            alert()->warning('Warning','Password lama salah!');
            return redirect()->back()->withInput();
        }
    }

    public function logoutAction(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
