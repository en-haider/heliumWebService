<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class loginmap extends Model
{
    //

    protected $fillable = [
        'l_server','l_db','l_username','pccodes_id','l_version','l_date',
    ];

    
    public  function pccode()
    {
    
        return $this->belongsTo(pccode::class);
    
    }

   

  

}
