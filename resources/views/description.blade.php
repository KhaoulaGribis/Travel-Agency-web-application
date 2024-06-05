@extends('Layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<br>
<br>
<br>
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="intro-wrap">
                    <h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In {{ $package->destination }}</h1>
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



<style>
    /* ADVERTISERS SERVICE CARD */
body {
  font-family: "Roboto", sans-serif !important;
}

.sec-icon {
  position: relative;
  display: inline-block;
  padding: 0;
  margin: 0 auto;
}

.sec-icon::before {
  content: "";
  position: absolute;
  height: 1px;
  left: -70px;
  margin-top: -5.5px;
  top: 60%;
  background: #f5f5f5;
  width: 50px;
}

.sec-icon::after {
  content: "";
  position: absolute;
  height: 1px;
  right: -70px;
  margin-top: -5.5px;
  top: 60%;
  background: #333;
  width: 50px;
}

.advertisers-service-sec {
  background-color: #f5f5f5;
}

.advertisers-service-sec span {
  color:#7AB730;
}

.advertisers-service-sec .col {
  padding: 0 1em 1em 1em;
  text-align: center;
}

.advertisers-service-sec .service-card {
  width: 100%;
  height: 100%;
  padding: 2em 1.5em;
  border-radius: 5px;
  box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  transition: 0.5s;
  position: relative;
  z-index: 2;
  overflow: hidden;
  background: #fff;
}

.advertisers-service-sec .service-card::after {
  content: "";
  width: 100%;
  height: 100%;
  background: linear-gradient(#0dcaf0, #7AB730);
  position: absolute;
  left: 0%;
  top: -98%;
  z-index: -2;
  transition: all 0.4s cubic-bezier(0.77, -0.04, 0, 0.99);
}

.advertisers-service-sec h3 {
  font-size: 20px;
  text-transform: capitalize;
  font-weight: 600;
  color: #1f194c;
  margin: 1em 0;
  z-index: 3;
}

.advertisers-service-sec p {
  color: #575a7b;
  font-size: 15px;
  line-height: 1.6;
  letter-spacing: 0.03em;
  z-index: 3;
}

.advertisers-service-sec .icon-wrapper {
  background-color: #2c7bfe;
  position: relative;
  margin: auto;
  font-size: 30px;
  height: 2.5em;
  width: 2.5em;
  color: #ffffff;
  border-radius: 50%;
  display: grid;
  place-items: center;
  transition: 0.5s;
  z-index: 3;
}

.advertisers-service-sec .service-card:hover:after {
  top: 0%;
}

.service-card .icon-wrapper {
  background-color: #ffffff;
  color:#7AB730;
}

.advertisers-service-sec .service-card:hover .icon-wrapper {
  color: #0dcaf0;
}

.advertisers-service-sec .service-card:hover h3 {
  color: #ffffff;
}

.advertisers-service-sec .service-card:hover p {
  color: #f0f0f0;
}
/* ADVERTISERS SERVICE CARD ENDED */
.res-btn {
                    padding: 15px 55px;
                    border: unset;
                    border-radius: 15px;

                    color: #212121;
                    z-index: 1;
                    background: #e8e8e8;
                    position: relative;
                    font-weight: 1000;
                    font-size: 17px;
                    -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    transition: all 250ms;
                    overflow: hidden;
                   }

                   .res-btn::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 0;
                    border-radius: 15px;
                    background-color: #212121;
                    z-index: -1;
                    -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    transition: all 250ms
                   }

                   .res-btn:hover {
                    color: #e8e8e8;
                   }

                   .res-btn:hover::before {
                    width: 100%;
                   }
    </style>
<div class="row">
    <div class="container pt-5 pb-3">
<section id="advertisers" class="advertisers-service-sec pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="section-header text-center">
          <h2 class="fw-bold fs-1">
            Our<span class="b-class-secondary">Travel </span>Details
            <a class="" href="{{url('reserve/' . $package->id)}}">
                <button type="submit" name="addtocart" value="5" class="btn res-btn" >Get a reservation</button>
            </a>
          </h2>
        </div>
      </div>
      <div class="row mt-5 mt-md-4 row-cols-1 row-cols-sm-1 row-cols-md-3 justify-content-center">
        <div class="col">
          <div class="service-card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <p>
                <h3> Destination</h3> {{ $package->destination }}<br>
                <h3> Available_places</h3>{{ $package->available_places }}
            </p>
          </div>
        </div>
        <div class="col">
          <div class="service-card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-arrows-down-to-people"></i>
            </div>

            <p style="text">
                <h3>Ticket price</h3>{{ $package->prix_unit }}<br>
                <h3>Category Type</h3>{{ $package->category->category_name }}
            </p>
          </div>
        </div>
        <div class="col">
          <div class="service-card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-globe"></i>
            </div>

            <p>
                <h3>Departure date</h3> {{ $package->date_depart }}<br>
                <h3>Arrival date</h3> {{ $package->date_retour }}
            </p>
          </div>
        </div>
        <div class="col">
          <div class="service-card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-money-check-dollar"></i>
            </div>
            <h3>Activities included</h3>
            <p>
                {{ $package->activite }}
            </p>
          </div>
        </div>
        <div class="col">
          <div class="service-card">
            <div class="icon-wrapper">
              <i class="fa-regular fa-circle-check"></i>
            </div>
            <h3>Included services</h3>
            <p>
                {{ $package->services_inclus }}
            </p>
          </div>
        </div>
        <div class="col">
          <div class="service-card">
            <div class="icon-wrapper">
              <i class="fa-solid fa-people-group"></i>
            </div>
            <p>
                <h3>Departure from</h3>{{ $package->lieu_depart }}<br>
                <h3>Transportation</h3>{{ $package->transport }}
            </p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!-- ADVERTISERS SERVICE CARD ENDED -->







        </div>
    </div>
</div>
</div>




@endsection
