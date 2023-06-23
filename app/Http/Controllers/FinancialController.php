<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialController extends Controller
{
    public function showFinancial(){
        $myFinancial = Auth::user()->financial;
        return view('user.financial', compact('myFinancial'));
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
