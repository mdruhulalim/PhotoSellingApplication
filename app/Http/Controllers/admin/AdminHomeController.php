<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cashout;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    // showing admin home
    public function index(){
        return view('admin.home');
    }

    // for approval
    public function approveShow(){
        $pendingImages = Photo::with('user')->where('status','pending')->orderBy('created_at','desc')->paginate(10);
        return view('admin.approval', compact('pendingImages'));
    }
    // update photo status
    public function imageApproveStatusUpdate($imageID,$satus){
        $image = Photo::findOrFail($imageID);
        if($satus == 'approved'){
            $image->update([
                'status' => 'approved',
                'approve_by' => Auth::guard('admin')->id(),
                'approve_date' => date('Y-m-d H:i:s')
            ]);
            return redirect()->back();
        }elseif($satus == 'declined'){
            $image->update([
                'status' => 'declined'
            ]);
            return redirect()->back();
        }
    }

    // for buy out image
    public function buyOutShow(){
        $images = Photo::where('status','selling')->paginate(10);
        return view('admin.buyout', compact('images'));
    }
    // for buy out update
    public function buyOutUpdate(Request $request){
        $statusArry = ['buy_out','approve_unsellable'];
        $status = request('status');
        if(request('image_id') != null && in_array(request('status'),$statusArry)){
            $image = Photo::findOrFail(request('image_id'));

            if($status == "buy_out"){
                // update buy_out image status
                $image->update([
                    'status' => 'buy_out',
                    'boyout_by' => Auth::guard('admin')->id(),
                    'buyout_date' => date('Y-m-d H:i:s'),
                    'rate' => request('rate')
                ]);
                // create new blance
                $getUser = User::findOrFail($image->user_id);
                $getPrevBlance = $getUser->financial->blance;
                $newBlance = $getPrevBlance + request('rate');

                // update financial blance
                $getUser->financial()->update([
                    'blance' => $newBlance
                ]);

                // return
                return redirect()->back();

            }else{
                // update approve_unsellable
                $image->update([
                    'status' => 'approve_unsellable'
                ]);

                // return
                return redirect()->back();
            }
            
        }else{
            return "Hacked";
        }
    }

    // for cashout
    public function showCashouts(){
        $cashouts = Cashout::with('user')->latest()->paginate(10);
        return view('admin.cashouts', compact('cashouts'));
    }
    // for cashoutUpdate
    public function cashoutUpdate($cashoutiD = null,$status = null){
        if($cashoutiD && $status){
            $cashout = Cashout::findOrfail($cashoutiD);
            $cashout->update([
                'status' => $status,
            ]);
            return redirect()->back();
        }else{
            abort(403);
        }
    }
}
