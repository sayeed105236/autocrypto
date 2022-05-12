<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use Auth;
use Carbon\Carbon;
use App\Models\Settings;
use App\Models\Package;
use App\Models\Purchase;
use DateTime;

//use App\Models\User;
use DB;
//test data
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Activate($id)
    {

      $data['user']=User::all();
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      $data['packages']=Package::where('status','active')->get();

      return view('user.activation_package',compact('data'));
    }
    public function ActivatePackage(Request $request)
    {
      $user= User::find($request->user_id);
      //dd($user->sponsor);
      $pack_id= Package::where('id',$request->package_id)->first();
      $sum_deposit = AddMoney::where('user_id', Auth::id())->where('status', 'approve')->sum('amount');
      $calculated_amount = $pack_id->package_price;
      //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

      if ($sum_deposit < $calculated_amount) {

          return back()->with('error', 'Insufficient Balance');

      }else
      {
        //dd($pack_id->package_price);
      //  $activation_check = User::find($request['sponsor'])->activation_status;
      //  dd($activation_check);
        $user_data=User::where('id',Auth::id())->get()->first();
        //dd($user_data->placement_id);
        $this->binary_count($user_data->placement_id,$user_data->position);
      //  $activation_check = User::find($request['sponsor'])->activation_status;
      $membership=User::where('sponsor',$user->sponsor)->where('activation_status','1')->count();

      //dd($membership);
      if($membership >= 6)
      {
        $membership_bonus = User::find($user->sponsor);
        //$member=$user->sponsor;
        //$date= date('Y-m-d');
        $membership_bonus->membership_status= '1';
        //DB::statement("UPDATE users SET membership_status = `0`+1 WHERE id = '$member'");
        $membership_bonus->save();

      }

      $deduct_amount = new AddMoney();
      $deduct_amount->user_id = Auth::id();
      $deduct_amount->amount = -($pack_id->package_price);
      $deduct_amount->method = 'Activation Charge';
      $deduct_amount->status = 'approve';
      $deduct_amount->type= 'Debit';
      $deduct_amount->created_at = Carbon::now();

      $deduct_amount->save();

      $deduct = User::find(Auth::user()->id);
      $deduct->activation_status= '1';

      $deduct->save();


      $settings= Settings::first();
      //dd($settings->sponsor_bonus);

      $sponsor_bonus = new AddMoney();
      $sponsor_bonus->user_id = $user->sponsor;
      $sponsor_bonus->amount = ($pack_id->package_price)*(($pack_id->sponsor_bonus)/100);
      $sponsor_bonus->received_from= Auth::id();
      $sponsor_bonus->method = 'Sponsor Bonus';
      $sponsor_bonus->status = 'approve';
      $sponsor_bonus->type= 'credit';
      $sponsor_bonus->created_at = Carbon::now();

      $sponsor_bonus->save();
      $purchase= new Purchase();
      $purchase->user_id= $request->user_id;
      $purchase->package_id= $request->package_id;
      $purchase->start_date= Carbon::now();
      $purchase->save();

      return back()->with('package_activated','Congratulations!! Your have Successfully Purchased the Package');
      }


    }

    public function binary_count($placement_id,$pos)
    {
        //dd($placement_id,$pos);
        if ($pos == 1){
            $pos = 'left_count';
            $pos_ac = 'left_active';
        }else{
            $pos = 'right_count';
            $pos_ac = 'right_active';
        }

        while($placement_id != '' && $pos != ''){

            DB::statement("UPDATE users SET $pos = `$pos`+1 WHERE user_name = '$placement_id'");
            DB::statement("UPDATE users SET $pos_ac = `$pos_ac`+1 WHERE user_name = '$placement_id'");

            //$this->is_pair_generate($placement_id);
            $pos= $this->find_position_id($placement_id);
            $pos_ac= $this->find_active_position_id($placement_id);
            $placement_id= $this->find_placement_id($placement_id);

        }

    }
    public function find_position_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();
        $pos= $user_id->position;
        if ($pos == 1){
            $pos = 'left_count';
        }elseif($pos == 2){
            $pos = 'right_count';
        }

        return $pos;

    }
    public function find_active_position_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();

        $pos_ac= $user_id->position;

        if ($pos_ac == 1){
            $pos_ac = 'left_active';
        }elseif($pos_ac == 2){
            $pos_ac = 'right_active';
        }

        return $pos_ac;

    }
    public function find_placement_id($placement_id){

        $user_id = User::where('user_name',$placement_id)->first();
        return $user_id->placement_id;
    }
    public function SilverRank(Request $request)
    {
      //dd($request);
      $rank_amount = new AddMoney();
      $rank_amount->user_id = Auth::id();
      $rank_amount->amount = $request['amount'];
      $rank_amount->method = 'Rank Bonus';
      $rank_amount->status = 'approve';
      $rank_amount->created_at = Carbon::now();

      $rank_amount->save();

      $rank = User::find(Auth::user()->id);
      $rank->rank= '1';

      $rank->save();



    return back()->with('silver_claimed','Congratulations!! Your Rank Bonus has been Claimed');
    }
    public function BronzeRank(Request $request)
    {
      //dd($request);
      $rank_amount = new AddMoney();
      $rank_amount->user_id = Auth::id();
      $rank_amount->amount = $request['amount'];
      $rank_amount->method = 'Rank Bonus';
      $rank_amount->status = 'approve';
      $rank_amount->created_at = Carbon::now();

      $rank_amount->save();

      $rank = User::find(Auth::user()->id);
      $rank->rank= '2';

      $rank->save();



    return back()->with('silver_claimed','Congratulations!! Your Rank Bonus has been Claimed');
    }
    public function GoldRank(Request $request)
    {
      //dd($request);
      $rank_amount = new AddMoney();
      $rank_amount->user_id = Auth::id();
      $rank_amount->amount = $request['amount'];
      $rank_amount->method = 'Rank Bonus';
      $rank_amount->status = 'approve';
      $rank_amount->created_at = Carbon::now();

      $rank_amount->save();

      $rank = User::find(Auth::user()->id);
      $rank->rank= '3';

      $rank->save();

    return back()->with('silver_claimed','Congratulations!! Your Rank Bonus has been Claimed');
    }
    public function PlatinumRank(Request $request)
    {

      $rank_amount = new AddMoney();
      $rank_amount->user_id = Auth::id();
      $rank_amount->amount = $request['amount'];
      $rank_amount->method = 'Rank Bonus';
      $rank_amount->status = 'approve';
      $rank_amount->created_at = Carbon::now();

      $rank_amount->save();

      $rank = User::find(Auth::user()->id);
      $rank->rank= '4';

      $rank->save();




    return back()->with('silver_claimed','Congratulations!! Your Rank Bonus has been Claimed');
    }
    public function daily_bonus()
    {
      $daily_bonus= AddMoney::where('method','Daily Bonus')->get();
      $level_bonus= AddMoney::where('method','Level Bonus')->get();

      return view('admin.manage_dailybonus',compact('daily_bonus','level_bonus'));
    }
    public function DailyBonusStore(Request $request)
    {

      $purchases= Purchase::all();

      //$daily_bonus= User::where('id',Auth::id())->first();
      //dd($daily_bonus->packages->price);
      //dd($sponsor_bonus['royality_bonus']);

      foreach ($purchases as $row) {
        $user=User::where('id',$row->user_id)->first();

        $date1 = new DateTime($row['created_at']);
        $date2 = new DateTime(Carbon::now()->addDay(1));
        $days  = $date2->diff($date1)->format('%a');
        $package= Package::where('id',$row->package_id)->first();
        $g_set = Settings::first();
        $data= (($package->package_price)*(($package->percentage)/100));
        if ($days <= $package->duration){

            $placement_id= $user['placement_id'];
            //dd($placement_id);

            $bonus= new AddMoney();
            $bonus->user_id= $row->user_id;

            $bonus->amount= (($package->package_price)*(($package->percentage)/100));
            $bonus->method= 'Daily Bonus';
            $bonus->type= 'Credit';
            $bonus->status= 'approve';
            $bonus->description= (($package->package_price)*(($package->percentage)/100)). '$ ' . 'Daily Bonus for purchasing '. ' ' . $package->package_name;
            $bonus->save();
            $income=[$g_set->level_1,$g_set->level_2,$g_set->level_3,$g_set->level_4,$g_set->level_5];

            $i=0;
            while($i < 5 && $placement_id != ''){

                $user = User::where('user_name',$placement_id)->first('id');

                $bonus_amount = new AddMoney();
                $bonus_amount->user_id = (int)$user->id;
                $bonus_amount->amount = $income[$i]*$data/100;
                $bonus_amount->method = 'Level Bonus';
                $bonus_amount->status = 'approve';

                $bonus_amount->type ='Credit';
                $bonus_amount->description= ($income[$i]*$data/100). ' Level Bonus for purchasing '. ' '. $package->package_name;
                $bonus_amount->save();

                $next_id= $this->find_placement_id($placement_id);
               // dd($next_id,$placement_id);
                $placement_id = $next_id;
                $i++;
            }


        }

      }


      $notification=array(
          'message'=>'Approved!!!',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
  }


}
