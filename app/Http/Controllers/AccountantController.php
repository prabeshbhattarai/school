<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function AccountantDashboard(){
        return view('accountant.accountant_dashboard');
    }//end method
}
