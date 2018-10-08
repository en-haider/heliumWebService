<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\companies;


class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function index()
    {
        $companies=companies::get();   
        $companies=companies::paginate(20);

     
        
          return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
       return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[         
            'co_name'=>'required',
            'co_alies'=>'required',
            'co_address'=>'required',
            'cofk_gov'=>'required|numeric',
            'co_active'=>'required',
            'co_sqlserver_version'=>'required',
            'co_is_backup'=>'required',
            'co_rec_money'=>'',
            'co_phone'=>'required|numeric',
            'co_details'=>'',
            'user_id'=>auth()->id(),

        ]);

    
        companies::create(request(['co_name','co_alies','co_address','cofk_gov','co_active','co_sqlserver_version','co_is_backup','co_rec_money','co_phone','co_details','user_id']));
        return redirect('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $company=companies::find($id); 
      

        return view('companies.show',compact('company')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies=companies::find($id);      
        return view('companies.edit',compact('companies'));
        
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
        $this->validate(request(),[
            'co_name'=>'required',
            'co_alies'=>'required',
            'co_address'=>'required',
            'cofk_gov'=>'required|numeric',
            'co_active'=>'',
            'co_sqlserver_version'=>'required',
            'co_is_backup'=>'required',
            'co_rec_money'=>'',
            'co_phone'=>'required',
            'co_details'=>'',
 
        ]);
       
        $companies=companies::find($id)->update($request->all());  
        return redirect('/company/'.$id.'')->withsuccess('Company is Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=support::find($id);
        $user->delete();

        return redirect()->route('user.index')->withsuccess('User is Deleted Successful');
    }
}
