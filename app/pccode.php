<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pccode extends Model
{

    protected $fillable = [
     'companies_id','pc_code','pc_activename','pc_name',
    ];
  
    public function company()
    {
    
        return $this->belongsTo(companies::class);
    
    }

    public function GetPCcodeId($PCCode,$AcitveName,$pcname)
    {
        $pccodes_id =DB ::table('pccodes')->where([
            ['pc_code', '=', $PCCode],
            ['pc_activename', '=', $AcitveName],
            ['pc_name', '=', $pcname],
            
          ])->pluck('id');
          
         

          if(!$pccodes_id->isEmpty())
          { 
            foreach ($pccodes_id as $pccode_id) {
               return $pccode_id;
            }
          }
          else
          {
            //Add New Coluem To The Pccodes Table
            pccode::create([
                'pc_code'=>$PCCode,  
                'pc_activename'=>$AcitveName,   
                'pc_name'=>$pcname, 
                'companies_id'=>'1', 
             
            ]);

          }

    }

    public  function loginmap()
    {
        return $this->hasMany(loginmap::class);
      
    }


}
