<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function Manage()
  {
    $packages= Package::all();
    return view('admin.manage_packages',compact('packages'));
  }
  public function StorePackage(Request $request)
  {
    $package= new Package();
    $package->package_name=$request->package_name;
    $package->package_price= $request->package_price;
    $package->percentage= $request->percentage;
    $package->duration=$request->duration;
    $package->sponsor_bonus=$request->sponsor_bonus;
    $package->status=$request->status;
    $package->save();
    return back()->with('package_added','Package has been added successfully!');
  }
  public function UpdatePackage(Request $request)
  {
    $package= Package::find($request->id);
    $package->package_name=$request->package_name;
    $package->package_price= $request->package_price;
    $package->percentage= $request->percentage;
    $package->duration=$request->duration;
    $package->sponsor_bonus=$request->sponsor_bonus;
    $package->status=$request->status;
    $package->save();
    return back()->with('package_updated','Package has been updated successfully!');
  }
  public function DeletePackage($id)
  {
    $package= Package::find($id);
    $package->delete();

    return back()->with('package_deleted','Package has been deleted successfully!');
  }
}
