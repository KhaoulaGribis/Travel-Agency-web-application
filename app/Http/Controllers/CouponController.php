<?php

namespace App\Http\Controllers;
use App\Models\Coupon;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::all();
        return view('Admin.Coupon.ListCoupon', compact('coupons'));
    }

    public function create()
    {
        $packages = Package::all();
        return view('Admin.Coupon.AddCoupon',['packages' => $packages]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons',
            'discount' => 'nullable|numeric',
            'max_user' =>  'nullable|numeric',
            'pourcentage'=> 'nullable|numeric',
            'expires_at' => 'required|date',
            'package_id' => 'required|exists:packages,id',
        ]);

        $filePath = public_path('uploads');
        $insert = new Coupon();
        $insert->code = $request->code;
        $insert->discount = $request->discount;
        $insert->max_user = $request->max_user;
        $insert->pourcentage = $request->pourcentage;
        $insert->expires_at = $request->expires_at;
        $insert->package_id = $request->package_id;
        $result = $insert->save();
        Session::flash('success', 'Couon registered successfully');
        return redirect()->route('ListCoupon');
    }

    public function edit(Coupon $coupon)
    {
        return view('Admin.Coupon.EditCoupon', compact('coupon'));
    }



    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'discount' => 'nullable|numeric',
            'max_user' =>  'nullable|numeric',
            'pourcentage'=> 'nullable|numeric',
            'expires_at' => 'required|date',
            'is_active' => 'boolean',
            'package_id' => 'required|exists:packages,id',
        ]);

        $coupon->update($request->all());
        return redirect()->route('ListCoupon')->with('success', 'Coupon mis à jour avec succès.');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('ListCoupon')->with('success', 'Coupon supprimé avec succès.');
    }
}
