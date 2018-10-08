<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class support extends Model
{
    //
    protected $fillable = [
        'sup_details', 'support_type_id', 'support_status_id','users_id','companies_id',
    ];


    public function support_status()
    {
    
        return $this->belongsTo(support_status::class);
    
    }

    public function support_company()
    {
    
        return $this->belongsTo(companies::class);
    
    }

    


    
}



