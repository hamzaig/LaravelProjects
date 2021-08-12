<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        DB::insert('INSERT INTO users(username,email,password) VALUES(?,?,?)',[$username, $email, $password]);
        return view("signup");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        // dd($request);
        $data = DB::select('SELECT id FROM users WHERE username =? AND password=?',[$username,$password]);
        if (count($data)) {
            $url = url('/') . '/login';
            return response()->json(array(
                'status' => true, 'data' => ['res' => $data], 'message' => 'Login Successfull',
                'action' => ['type' => 'redirect', 'url' => $url]
            ));
        }else {
            $url = url('/') ;

            return response()->json(array(
                'status' => false, 'data' => [], 'message' => 'Login Failed',
                'action' => ['type' => 'redirect', 'url' => $url]
            ));
        }
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
        //
    }
}
