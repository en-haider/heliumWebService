<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class pccode extends Model
{

    protected $fillable = [
     'companies_id','pc_code','pc_activename','pc_name','pccode_register_id'
    ];
  
    public function company()
    {
    
        return $this->belongsTo(companies::class);
    
    }

    public function GetPCcodeId($PCCode,$AcitveName,$pcname)
    {
        $pccodes_id =DB::table('pccodes')->where([
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
                'pccode_register_id'=>'1',           
            ]);

            return pccode::all()->last()->id;

          }

    }

    public  function loginmap()
    {
        return $this->hasMany(loginmap::class);
      
    }


    public function get_DateLastLogin($creat_at)
    {

            if (count($creat_at) >= 1) {
                $creat_at = new Carbon($creat_at);
                $now = Carbon::now();
         if ($creat_at->diffInMinutes($now) < 1) {
            return $lastOnline = "Last seen less than a minute ago";
        }

            elseif ($creat_at->diff($now)->h < 1) {
                return $lastOnline = $creat_at->diffInMinutes($now) > 1 ? sprintf(" %d minutes ago", $creat_at->diffInMinutes($now)) : sprintf("Last seen %d minute ago", $creat_at->diffInMinutes($now));
            } elseif ($creat_at->diff($now)->d < 1) {
                return $lastOnline = $creat_at->diffInHours($now) > 1 ? sprintf("%d hours ago", $creat_at->diffInHours($now)) : sprintf("Last seen %d hour ago", $creat_at->diffInHours($now));
            } elseif ($creat_at->diff($now)->d < 7) {
                return  $lastOnline = $creat_at->diffInDays($now) > 1 ? sprintf(" %d days ago", $creat_at->diffInDays($now)) : sprintf("Last seen %d day ago", $creat_at->diffInDays($now));
            } elseif ($creat_at->diff($now)->m < 1) {
                return $lastOnline = $creat_at->diffInWeeks($now) > 1 ? sprintf(" %d weeks ago", $creat_at->diffInWeeks($now)) : sprintf("Last seen %d week ago", $creat_at->diffInWeeks($now));
            } elseif ($creat_at->diff($now)->y < 1) {
                return  $lastOnline = $creat_at->diffInMonths($now) > 1 ? sprintf("%d months ago", $creat_at->diffInMonths($now)) : sprintf("Last seen %d month ago", $creat_at->diffInMonths($now));
            } else {
                return  $lastOnline = $creat_at->diffInYears($now) > 1 ? sprintf(" %d years ago", $creat_at->diffInYears($now)) : sprintf("Last seen %d year ago", $creat_at->diffInYears($now));
            }
            
        }
    }




}
