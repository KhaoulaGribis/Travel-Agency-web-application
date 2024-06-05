@extends('Layouts.master')
@section('content')
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="intro-wrap">
                    <h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In </h1>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="slides">
                    <img src="/img/hero-slider-1.jpg" alt="Image" class="img-fluid active">
                    <img src="/img/hero-slider-2.jpg" alt="Image" class="img-fluid">
                    <img src="/img/hero-slider-3.jpg" alt="Image" class="img-fluid">
                    <img src="/img/hero-slider-4.jpg" alt="Image" class="img-fluid">
                    <img src="/img/hero-slider-5.jpg" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 mb-5 mb-md-0" style="margin-left: 90px">
   <h3>Our Client informations </h3>
   <form action="{{ route('reservations.store',['id'=> $pkg_id->id]) }}" class="formRes" method="POST" enctype="multipart/form-data">
       @csrf


       <div class="flex">
           <label>
               <input class="input" type="text"  name="first_name" placeholder="first name" required>
           </label>

           <label>
               <input class="input" type="text"  name="last_name" placeholder="last name" required>
           </label>
       </div>

       <label>
           <input class="input" type="email"  name="email" placeholder="email" required>
       </label>

       <label>
           <input class="input"  name="contact_number" placeholder="contact number" type="tel" required>
       </label>
       <div class="row">
           <legend class="col-form-label col-sm-2 pt-0" style="color: white">Gender</legend>
           <div class="col-sm-10">
             <div class="form-check">
               <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked>
               <label class="form-check-label" for="gridRadios1"  style="color: white">
                 Male
               </label>
             </div>
             <div class="form-check">
               <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
               <label class="form-check-label" for="gridRadios2" style="color: white">
                 Female
               </label>
             </div>
           </div>
       </div>
       <label>
           <input class="input"  name="departure_city" placeholder="Departure city" type="text" required>
       </label>
       <div class="cart-btn d-flex mb-50">
        <p  style="color: white" > Ticket(s) </p>
           <div class="quantity">
               <span  style="color: white" class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
               <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
               <span  style="color: white" class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
           </div>

       </div>
       <label>
           <textarea class="input01"  name="message" placeholder="Message" rows="3" ></textarea>
       </label>
       <div class="form-group">
           <label for="photo" style="color: white">Your identity picture</label>
           <input type="file" class="form-control-file" id="photo" name="photo" style="color: white">
       </div>

   </div>
   <br>
   <br>
   <div class="col-md-4">
       <div class="col-md-12">
         <br>
         <br>
         <label class="text-black h4" for="coupon">Coupon</label>
         <div class="formRes">
         <p style="color: white">Enter your coupon code if you have one.</p>

       {{-- <form action="{{ route('reservations.store',['id'=> $pkg_id->id])  }}"  method="POST" enctype="multipart/form-data">
           @csrf --}}
       <div class="col-md-8 mb-3 mb-md-0">
           {{-- <input type="hidden" name="pkg_id" value="{{ $pkg_id }}"> --}}
         <input type="text" class="form-control py-3" id="coupon" name="coupon" placeholder="Coupon Code">
       </div>
    </div>
       <br>
       <div class="col-md-4">
         <button class="fancy">confirm reservation</button>
       </div>
       </form>
       <br>
         <br>
         <div class="invoice">
         <br>
         <h4 >Reservation Details</h4>
         <div class="formRes">
            @isset($originalPrice)
                <p style="color: white"><strong>Original Price : </strong> ${{ $originalPrice }}</p>
            @endisset
            @isset($discountAmount)
                <p style="color: white"><strong>Discount Amount : </strong> ${{ $discountAmount }}</p>
            @endisset
            @isset($totalPrice)
                <p style="color: white"><strong>Total Price : </strong> ${{ $totalPrice }}</p>
            @endisset
         </div>
          </div>
          <br>

          <div id="paypal-button-container"> </div>
      </div>
 </div>


   <script src="https://www.paypal.com/sdk/js?client-id=AUQfXC3a1AD3vwCd1Bn_fWw--TjQxlLWqCEI-4XDfxKq4q5QqeFs4sdmAKVS226Zxbmk-DykWNzPQRNR"></script>
                        <script>
                            paypal.Buttons({
                                createOrder:function (data,action){
                                    return action.order.create({
                                        purchase_units:[{
                                            amount:{
                                                @isset($totalPrice)
                                                value:'{{ $totalPrice }}'
                                                @endisset
                                            }
                                        }]
                                    });
                                },
                                onApprove:function (data,action){
                                    return action.order.capture().then(function(details){
                                        alert('transaction completed by '+ details.payer.name.given_name);
                                        window.location.href = "{{ route('facture.show',['id' => Session::get('reservation_id')]) }}";
                                    });

                                }
                            }).render('#paypal-button-container')

           </script>
   </div>

@endsection
