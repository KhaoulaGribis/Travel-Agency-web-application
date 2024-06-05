@extends('Layouts.admin')
@section('page')

<div class="main-panel">
    <div class="content-wrapper">
        <h1>Update le Coupon</h1>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <br>
                <div class="container">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ $coupon->code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="discount">Amount to subtract</label>
                            <input type="number" step="0.01" class="form-control" id="discount" name="discount" value="{{ $coupon->discount }}">
                        </div>
                        <div class="form-group">
                            <label for="discount">Number of uses</label>
                            <input type="number"  class="form-control" id="max_user" name="max_user" value="{{ $coupon->max_user }}">
                        </div>
                        <div class="form-group">
                            <label for="discount">Percentage of reduction</label>
                            <input type="number" step="0.01" class="form-control" id="pourcentage" name="pourcentage" value="{{ $coupon->pourcentage }}">
                        </div>
                        <div class="form-group">
                            <label for="expires_at">Expiration date</label>
                            <input type="date" class="form-control" id="expires_at" name="expires_at" value="{{ $coupon->expires_at }}" required>
                        </div>
                        <div class="form-group">
                            <label for="package_id">Travel ID</label>
                            <input type="number" class="form-control" id="package_id" name="package_id" value="{{ $coupon->package_id }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Valid</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
