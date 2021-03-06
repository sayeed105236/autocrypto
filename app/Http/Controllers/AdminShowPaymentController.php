<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use App\Models\Withdraw;


class AdminShowPaymentController extends Controller
{

    public function Manage()
    {
      $deposit= AddMoney::where('method','Deposit')->get();

      return view('admin.deposit_request_manage',compact('deposit'));

    }
    public function approve($id)
    {

        AddMoney::findOrFail($id)->update([
            'status'=>'approve'
        ]);
        $notification=array(
            'message'=>'Approved!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        AddMoney::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Request Deleted !!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function WithdrawManage()
    {
      $withdraw= Withdraw::all();

      return view('admin.withdraw_request',compact('withdraw'));

    }
    public function Withdrawapprove($id)
    {
        Withdraw::findOrFail($id)->update([
            'status'=>'approve'

        ]);

        $notification=array(
            'message'=>'Approved!!!',
            'alert-type'=>'success'
        );


        return Redirect()->back()->with($notification);
    }
    public function rejected($id,$user_id,$amount)
    {
        //dd($id,$user_id,$amount);
        Withdraw::findOrFail($id)->update([
            'status'=>'rejected'
        ]);
        $refund = new AddMoney;
        $refund->user_id = $user_id;
        $refund->amount = +(($amount) + ($amount * 10 / 100));
        $refund->method = 'Withdraw';

        $refund->status = 'approve';
        $refund->save();

        $notification=array(
            'message'=>'Rejected!!!',
            'alert-type'=>'danger'
        );
        return Redirect()->back()->with($notification);
    }
    public function Withdrawdestroy($id)
    {
        Withdraw::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Request Deleted !!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

}
