@extends('Layouts.admin')
@section('page')

<div class="main-panel">
    <div class="content-wrapper">
        <h1>Modifier le Package</h1>
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
                    <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" maxlength="300" value="{{ $package->description }}" required>
                        </div>
                        <div class="form-group">
                            <label for="prix_unit">Prix Unitaire</label>
                            <input type="number" step="0.01" class="form-control" id="prix_unit" name="prix_unit" value="{{ $package->prix_unit }}" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            @if($package->photo)
                                <div>
                                    <img src="{{ asset('storage/' . $package->photo) }}" width="100" height="100" alt="Package Photo">
                                </div>
                            @endif
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>
                        <div class="form-group">
                            <label for="date_depart">Departure Date</label>
                            <input type="date" class="form-control" id="date_depart" name="date_depart" value="{{ $package->date_depart }}" required>
                        </div>
                        <div class="form-group">
                            <label for="date_retour">Return Date</label>
                            <input type="date" class="form-control" id="date_retour" name="date_retour" value="{{ $package->date_retour }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nbr_place_dispo">Number of Available Seats</label>
                            <input type="number" class="form-control" id="nbr_place_dispo" name="nbr_place_dispo" value="{{ $package->nbr_place_dispo }}" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" class="form-control" id="destination" name="destination" value="{{ $package->destination }}" required>
                        </div>
                        <div class="form-group">
                            <label for="lieu_depart">Departure location</label>
                            <input type="text" class="form-control" id="lieu_depart" name="lieu_depart" value="{{ $package->lieu_depart }}" required>
                        </div>
                        <div class="form-group">
                            <label for="transport">Transport</label>
                            <input type="text" class="form-control" id="transport" name="transport" value="{{ $package->transport }}" required>
                        </div>
                        <div class="form-group">
                            <label for="services_inclus">services_inclus</label>
                            <input type="text" class="form-control" id="services_inclus" name="services_inclus" value="{{ $package->services_inclus }}" required>
                        </div>
                        <div class="form-group">
                            <label for="activite">Activity</label>
                            <input type="text" class="form-control" id="activite" name="activite" value="{{ $package->activite }}" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($package->category_id == $category->id) selected @endif>{{ $category->category_name }}</option>
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


