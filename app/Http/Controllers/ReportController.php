<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use App\Models\Unit;

class ReportController extends Controller
{
  public function Manage()
  {
    $pair_bonus= AddMoney::where('method','Pair Bonus')->get();

    return view('admin.reports.pair_bonus_history',compact('pair_bonus'));
  }
  public function ManageRank()
  {
    $rank_bonus= AddMoney::where('method','Rank Bonus')->get();

    return view('admin.reports.rank_bonus_history',compact('rank_bonus'));
  }
  public function ManageClub()
  {
    $club_bonus= AddMoney::where('method','Club Bonus')->get();

    return view('admin.reports.club_bonus_history',compact('club_bonus'));
  }
  public function ManageSponsor()
  {
    $sponsor_bonus= AddMoney::where('method','Sponsor Bonus')->get();

    return view('admin.reports.sponsor_bonus_history',compact('sponsor_bonus'));
  }
  public function ManageProfit()
  {
    $profit_bonus= AddMoney::orderBy('id','desc')->where('method','Profit Bonus')->take(500)->get();

    return view('admin.reports.profit_bonus_history',compact('profit_bonus'));
  }
  public function ManageTransfer()
  {
    $transfers= AddMoney::where('method','Transfer')->get();

    return view('admin.reports.transfer_history',compact('transfers'));
  }
  public function ManageUnit()
  {
    $unit_bonus= AddMoney::orderBy('id','desc')->where('method','Unit Bonus')->take(1000)->get();

    return view('admin.reports.unit_bonus_history',compact('unit_bonus'));
  }
  public function ManageUnitPurchase()
  {
    $units= Unit::all();

    return view('admin.reports.unit_purchase_history',compact('units'));
  }
  public function ManageUnitLevel()
  {
    $units= Unit::all();

    return view('admin.reports.unit_level',compact('units'));
  }
}
