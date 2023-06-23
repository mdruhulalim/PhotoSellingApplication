<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class FinancialController extends Controller
{
    public function showFinancial(){
        $myFinancial = Auth::user()->financial;
        $myCashouts = Auth::user()->Cashout;
        return view('user.financial', compact('myFinancial','myCashouts'));
    }
    // for cashout
    public function cashout(){
        $id = Auth::id();
        $user = User::find($id);

        if($user->financial->blance > 10){
            $currentBlance = $user->financial->blance;
            $user->Cashout()->create([
                'financial_id' => $user->financial->id,
                'amount' => $currentBlance
            ]);
            $user->financial()->update([
                'blance' => (float)0.00
            ]);
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
