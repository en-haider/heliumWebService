<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\support;
use App\support_type;
use App\support_status;
use App\companies;
use Auth;

class SupportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports=support::latest()->get();   
        //$supports=support::paginate(5);
        return view('support.index',compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        if($request['id']!=null)
        {$com_id=$this->validate(request(),['id'=>'required|numeric']);
            $company_edit=companies::find($com_id['id']);
        }
        
        
        
        return view('support.create',compact('company_edit'));
        
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
                'sup_details'=>'required|max:255',
                'companies_id'=>'required|numeric',
                'support_type_id'=>'required|numeric',
                'support_status_id'=>'required|numeric',
              
            ]);

            support::create([
                'sup_details'=>request('sup_details'),
                'companies_id'=>request('companies_id'),
                'support_type_id'=>request('support_type_id'),
                'support_status_id'=>request('support_status_id'),
                'users_id'=>Auth::user()->id,
            ]);
   
 
        
        
            return redirect('/support')->withsuccess('Data is Saved Seccessful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $support=support::find($id);      
        return view('support.show',compact('support')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $support=support::find($id);      
        return view('support.edit',compact('support'));   
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
            'sup_details'=>'required|max:255',
            'companies_id'=>'required|numeric',
            'support_type_id'=>'required',
            'support_status_id'=>'required|numeric',
 
        ]);
       
        $support=support::find($id)->update($request->all());  

        return redirect()->route('support.index')->withsuccess('Support is Update Successful');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $support=support::find($id);
        $support->delete();

        return redirect()->route('support.index')->withsuccess('Support is Deleted Successful');

    }
}
