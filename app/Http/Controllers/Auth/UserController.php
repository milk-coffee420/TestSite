<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $model =\App\User::class;

    protected $validate = [
        'email' => 'required',
        'password' => 'required',
    ];

    public function _construct(){
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    public function index()
    {
        if (Auth::check()) {

            return redirect('admin/news');
        }else{
            return redirect('auth/login');
        }

    }


    public function getProfile(){
        return view('admin.user.profile');
    }

    public function edit($id)
    {
        //
        $item = User::find($id);

        return view('admin.user.edit');
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
        //
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|max:255',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return redirect('/admin/profile');

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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/profile');
    }


}
