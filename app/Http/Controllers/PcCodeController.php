<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;


use App\pccode;
class PccodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Get PCs Register
    public function index()
    {
        if(!GATE::allows('isAdmin'))
        {
            abort(404,"Sorry, This To Admin Only");
        }
     
        $pccodes=pccode::where('companies_id', '!=', 1)->get();
        return view('pccode.index',compact('pccodes'));
    }

      

       //Get PCs Not Register
       public function PcNotRegister()
       {
        if(!GATE::allows('isAdmin'))
        {
            abort(404,"Sorry, This To Admin Only");
        }
        
           $pccodes=pccode::where('companies_id', '=', 1)->get();
           return view('pccode.PcNotRegister',compact('pccodes'));
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
        $pccode=pccode::find($id);      
        return view('pccode.edit',compact('pccode')); 
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
           
            'companies_id'=>'required|numeric',
 
        ]);
       
        $pccode=pccode::find($id)->update($request->all());  

        return redirect()->route('pcs.index')->withsuccess('Pc is Update Successful');
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
