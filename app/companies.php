<?php

namespace App;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    //
    
    protected $fillable = [
        'co_name', 'co_alies', 'co_address','cofk_gov','co_address','co_active','co_sqlserver_version','co_is_backup','co_rec_money','co_phone','co_details','user_id'
    ];

 

    public static  function support()
    {
        return $this->hasMany(support::class);
      
    }

    public  function pccode()
    {
        return $this->hasMany(pccode::class);
      
    }



    public  function LastLogin()
    {
        //Get the Id of pccode company 
         $pccode=$this->hasMany(pccode::class)->get();
         
        //Get last login of company
         $login_map= loginmap::whereIn('pccodes_id',$pccode->pluck('id'))->orderBy('l_date', 'desc')->first(); 
   
         return $login_map;

    
    }



        //Get Company FeedBack By Company Id 
        public function CompanyFeedback()
        {
            $pccode=$this->hasMany(pccode::class)->get();

        $feedback=CompanyFeedback::whereIn('pccodes_id',$pccode->pluck('id'))->get(); 
      
   
           
       return $feedback;

        }


    public  function LastLoginByComId($id)
    {
        
        $pccode= pccode::where('companies_id',$id)->get()->pluck('id');
           if($pccode->isEmpty())
           {
              return false;
              
           }
           else
           {
     
            $login_map= loginmap::whereIn('pccodes_id',$pccode)->orderBy('l_date', 'desc')->first(); 
      
                return $login_map;

           }
     
                
        }


    




public function get_DateLastLogin($creat_at)
{
   
    if (count($creat_at) >= 1) {
      
        $now = Carbon::now();
        if ($creat_at->diff($now)->m < 1) {
            $lastOnline = "Last seen less than a minute ago";
        } elseif ($creat_at->diff($now)->h < 1) {
            $lastOnline = $creat_at->diffInMinutes($now) > 1 ? sprintf(" %d minutes ago", $creat_at->diffInMinutes($now)) : sprintf("Last seen %d minute ago", $creat_at->diffInMinutes($now));
        } elseif ($creat_at->diff($now)->d < 1) {
            $lastOnline = $creat_at->diffInHours($now) > 1 ? sprintf("%d hours ago", $creat_at->diffInHours($now)) : sprintf("Last seen %d hour ago", $creat_at->diffInHours($now));
        } elseif ($creat_at->diff($now)->d < 7) {
            $lastOnline = $creat_at->diffInDays($now) > 1 ? sprintf(" %d days ago", $creat_at->diffInDays($now)) : sprintf("Last seen %d day ago", $creat_at->diffInDays($now));
        } elseif ($creat_at->diff($now)->m < 1) {
            $lastOnline = $creat_at->diffInWeeks($now) > 1 ? sprintf(" %d weeks ago", $creat_at->diffInWeeks($now)) : sprintf("Last seen %d week ago", $creat_at->diffInWeeks($now));
        } elseif ($creat_at->diff($now)->y < 1) {
            $lastOnline = $creat_at->diffInMonths($now) > 1 ? sprintf("%d months ago", $creat_at->diffInMonths($now)) : sprintf("Last seen %d month ago", $creat_at->diffInMonths($now));
        } else {
            $lastOnline = $creat_at->diffInYears($now) > 1 ? sprintf(" %d years ago", $creat_at->diffInYears($now)) : sprintf("Last seen %d year ago", $creat_at->diffInYears($now));
        }
        return $lastOnline;
    } 
}
            
         
   
         
        
    
    

    


}
