<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function ParentDashboard(){
        return view('parent.parent_dashboard');
    }//end method
}
