<?php

namespace App\Http\Controllers;
use App\Models\Coupon;
use App\Models\Reserv;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservController extends Controller
{
    public function reservation($id) {
        $pkg_id = Package::findOrFail($id);
        return view('reserve', compact('pkg_id'));
    }




    public function store(Request $request,$id)
        {
            if ($request->session()->has('loginId')) {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'contact_number' => 'required|string|max:15',
                'gender' => 'required|string|in:Male,Female',
                'departure_city' => 'required|string|max:255',
                'quantity' => 'required|integer|min:1',
                'coupon' => 'nullable|string|max:50',
                'message' => 'nullable|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',


            ]);

            $package = Package::findOrFail($id);
        $originalPrice = $package->prix_unit * $request->quantity;

        $discountAmount = 0;
        if ($request->filled('coupon')) {
            $coupon = Coupon::where('code', $request->coupon)
                            ->where('package_id', $package->id)
                            ->first();

            if ($coupon) {
                if ($coupon->pourcentage) {
                    $discountAmount = ($originalPrice * $coupon->pourcentage) / 100;
                } elseif ($coupon->discount) {
                    $discountAmount = $coupon->discount;
                }
            } else {
                return redirect()->back()->withErrors(['coupon' => 'Invalid coupon code.']);
            }
        }
        $totalPrice = $originalPrice - $discountAmount;

            $reservation = new Reserv();
            $reservation->first_name = $request->first_name;
            $reservation->last_name = $request->last_name;
            $reservation->email = $request->email;
            $reservation->contact_number = $request->contact_number;
            $reservation->gender = $request->gender;
            $reservation->departure_city = $request->departure_city;
            $reservation->quantity = $request->quantity;
            $reservation->coupon = $request->coupon;
            $reservation->message = $request->message;

            $reservation->original_price = $originalPrice;
            $reservation->discount_amount = $discountAmount;
            $reservation->total_price = $totalPrice;


            if ($request->hasFile('photo')) {
                $file_name = $request->file('photo')->store('Client', 'public');
                $reservation->photo = $file_name;
            }

            $reservation->clt_id = session('loginId');
            $reservation->pkg_id = $id;

            $reservation->save();
            Session::put('reservation_id', $reservation->id);
            Session::put('package_id', $id);
            Session::flash('success', 'Reservation submitted successfully');
            return view('reserve')
            ->with('pkg_id', $package)
            ->with('originalPrice', $originalPrice)
            ->with('discountAmount', $discountAmount)
            ->with('totalPrice', $totalPrice);

        }else{
            return redirect()->route('login_register')->with('error', 'Please log in to make a reservation.');
        }
}



        public function showReservationsForAdmin()
        {
            $reservations = Reserv::all();
            return view('Admin.Reservation.ListReservation', compact('reservations'));
        }

        public function destroy($id)
        {
            $reservation = Reserv::find($id);
            if ($reservation) {
                $reservation->delete();
                return redirect()->route('ListReservation')->with('success', 'Reservation deleted successfully');
            }
            return redirect()->route('ListReservation')->with('error', 'Reservation not found');
        }


        public function showInvoice() {
            $reservation_id = Session::get('reservation_id');
    if ($reservation_id) {
        $reservation = Reserv::findOrFail($reservation_id);
        $package = Package::findOrFail($reservation->pkg_id);
        return view('facture', compact('reservation', 'package'));
        }
    }

    }
