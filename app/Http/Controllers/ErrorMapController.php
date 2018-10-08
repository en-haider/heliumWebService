<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\error_map;
use Gate;
class ErrorMapController extends Controller
{
    public function index()
    {
        if(!GATE::allows('isAdmin'))
        {
            abort(404,"Sorry, This To Admin Only");
        }
        
        $errors=error_map::orderBy('e_date','DESC')->get();  
        $errors=error_map::paginate(10);         
        return view('errormap.index',compact('errors'));

    }
}
