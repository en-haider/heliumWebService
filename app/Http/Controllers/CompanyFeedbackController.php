<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CompanyFeedback;

use Gate;


class CompanyFeedbackController extends Controller
{
    public function index()
    {
        if(!GATE::allows('isAdmin'))
        {
            abort(404,"Sorry, This To Admin Only");
        }

        $feedbacks=companyfeedback::get();           
        return view('feedback.index',compact('feedbacks'));

    }
}
