@extends('Layouts.admin')
@section('page')
<div class="main-panel">
    <div class="content-wrapper">
        <h1>Add new Coupon</h1>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <br>
                <div class="container">
                    <form action="{{ route('coupons.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" maxlength="300" required>
                        </div>
                        <div class="form-group">
                            <label for="discount">Amount to subtract</label>
                            <input type="number" step="0.01" class="form-control" id="discount" name="discount" >
                        </div>
                        <div class="form-group">
                            <label for="discount">Number of uses</label>
                            <input type="number"  class="form-control" id="max_user" name="max_user" >
                        </div>
                        <div class="form-group">
                            <label for="discount">Percentage of reduction</label>
                            <input type="number" step="0.01" class="form-control" id="pourcentage" name="pourcentage" >
                        </div>
                        <div class="form-group">
                            <label for="expires_at">Expiration date</label>
                            <input type="date" class="form-control" id="expires_at" name="expires_at" required>
                        </div>
                        <div class="form-group" >
                            <label for="package_id">Package</label>
                            <select class="form-control" id="package_id" name="package_id" required>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}">{{ $package->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Valid</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
