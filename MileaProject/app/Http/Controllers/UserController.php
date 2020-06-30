<?php

namespace App\Http\Controllers;

use App\Officer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $officers                           = Officer::paginate(10);
        $users                              = User::paginate(10);
        return view('officer.user.user-list', compact('officers','users'));
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user       = User::findOrFail($id);
        if(!is_null($user->avatar)) {
            unlink($user->avatar);
        }
        $user->delete();

        return redirect()->route('user.management');
    }

    public function resetPassword($id)
    {
        $password       = Str::random(10);
        $user           = User::find($id);
        $user->password = Hash::make($password);
        if($user->save()) {
            $message    = "Password berhasil direset";
            return response()->json(compact('password','message'), 200);
        }
        $message        = "Kesalahan Server";
        return response()->json(compact('password','message'), 500);
    }
    public function fetch_data(Request $req)
    {
        if($req->ajax()) {
            $sort_by    = $req->get('sort_by');
            $sort_type  = $req->get('sort_type');
            $search     = $req->get('search');
            $page       = $req->page;
            $search     = str_replace(" ", "%", $search);
            $users      = User::where('name', 'LIKE', '%'.$search.'%')
                                ->orderBy($sort_by, $sort_type)
                                ->paginate(10);
            return view('officer.user.user-data', compact('users'))->render();
        }
    }
}
