<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\pccode;

use App\loginmap;

class loginMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return loginmap::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function Add($name=null,$lastname=null)
    {
      

    }
    public function store($Server,$DB,$UserName,$pcname,$PCCode,$AcitveName,$version)
    {
       
        $order = [
            'Server' => $Server,
            'DB'=> $DB,
            'UserName' => $UserName,
            'PCCode' => $PCCode,
            'AcitveName' => $AcitveName,
            'version' => $version,      
        ];
        
        $rules = [
           
            'Server' => '',
            'DB' =>'',
            'UserName' => '',
            'PCCode' => '',
            'AcitveName' => '',
            'version' => 'string',
               
        ];
         
        $validator= Validator::make($order, $rules);
         
        if ($validator->fails())
        {
          return false;
        }
        else
        {
            $pccode=new pccode();
            loginmap::create([
                'l_server'=>$order['Server'],  
                'l_db'=>$order['DB'],   
                'l_username'=>$order['UserName'], 
                'l_version'=>$order['version'], 
                'pccode_id'=>$pccode->GetPCcodeId($PCCode,$AcitveName,$pcname)
            ]);
            
        }

    
      

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
