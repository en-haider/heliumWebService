<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\support;
use App\support_type;
use App\support_status;
use App\companies;
use Auth;
use App\user;


use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\RegistersUsers;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=user::get();   
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {

        $this->validate(request(),[         
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|string',
            

        ]);

    
        User::create([
            'name' =>$data['name'],
            'email' =>$data['email'],
            'user_type' =>$data['user_type'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/users')->withsuccess('Users is Add Successful');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=user::find($id);      
        return view('users.show',compact('user')); 
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);      
        return view('users.edit',compact('user'));
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
        $user=User::find($id);  
        $this->validate(request(),[
            'name' => 'required|string|max:255',
            'email'=>'required|string|email|max:191|unique:users,email,'.$user->id,
            'user_type' => 'required|string',
        ]);
       
        if(!empty($request->password)){
            $request->merge(['password'=>Hash::make($request
            ['password'])]);
        }
        else
        {
            $request->merge(['password'=>$user->password]);
           
        }

        $user->update($request->all());

        return redirect()->route('users.index')->withsuccess('User is Update Successful');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user=user::find($id);
        $user->delete();

        return redirect()->route('users.index')->withsuccess('User is Deleted Successful');


    }
}
