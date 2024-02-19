<?php

namespace App\Http\Controllers;

use App\Models\User_account;
use App\Models\user_account as ModelsUser_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User_account::all();
        return response()->json($users); 
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
        try {
            $data = $request->only(['name', 'user_name', 'password']);
            $user = User_account::create($data);
    
            return response()->json([
                'msg' => 'user created',
                'status' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'msg' => 'error creating user',
                'status' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $user = $request->user_name;
        $pass = $request->password;

        $userAccount = DB::table('user_accounts')
                        ->where('user_name', $user)
                        ->where('password', $pass)
                        ->first();
       

        if ($userAccount){
            $login = DB::table('user_accounts')
            ->where('id', $userAccount->id)
            ->update(['login' => 1]);

            return response()->json(['message' => 'Login successful','login' => true]);
        } else {
            return response()->json(['error' => 'Incorrect credentials','login' => false], 401);
        }
    }


    public function validateLogin(Request $request)
    {
        $user = $request->user_name;
        $pass = $request->password;

        $userAccount = DB::table('user_accounts')
                        ->where('user_name', $user)
                        ->where('password', $pass)
                        ->first();
        if ($userAccount){
            return response()->json(['message' => 'Login successful','login' => true]);
        } else {
            return response()->json(['error' => 'Incorrect credentials','login' => false], 401);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User_account $user)
    {
        return response()->json($user);
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
    public function update(Request $request, User_account $user)
    {
        $user->fill($request->post())->save();
        return response()->json([
            'msg'       => 'user updated',
            'status'    => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_account $user)
    {
        $user->delete();
        return response()->json([
            'msg'       => 'user deleted',
            'status'    => true  
        ]);
    }

    
}
