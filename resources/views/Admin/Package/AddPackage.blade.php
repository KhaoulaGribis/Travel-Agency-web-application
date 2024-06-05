@extends('Layouts.admin')
@section('page')

<div class="main-panel">
    <div class="content-wrapper">
        <h1>Add new Package</h1>
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <br>
                <div class="container">
                    <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" maxlength="300" required>
                        </div>
                        <div class="form-group">
                            <label for="prix_unit">Unit Price</label>
                            <input type="number" step="0.01" class="form-control" id="prix_unit" name="prix_unit" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>
                        <div class="form-group">
                            <label for="date_depart">Departure Date</label>
                            <input type="date" class="form-control" id="date_depart" name="date_depart" required>
                        </div>
                        <div class="form-group">
                            <label for="date_retour">Return Date</label>
                            <input type="date" class="form-control" id="date_retour" name="date_retour" required>
                        </div>
                        <div class="form-group">
                            <label for="nbr_place_dispo">Number of Available Seats</label>
                            <input type="number" class="form-control" id="nbr_place_dispo" name="nbr_place_dispo" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" class="form-control" id="destination" name="destination" required>
                        </div>
                        <div class="form-group">
                            <label for="transport">Transport</label>
                            <input type="text" class="form-control" id="transport" name="transport" required>
                        </div>
                        <div class="form-group">
                            <label for="lieu_depart">Departure location</label>
                            <input type="text" class="form-control" id="lieu_depart" name="lieu_depart" required>
                        </div>
                        <div class="form-group">
                            <label for="services_inclus">Included services</label>
                            <input type="text" class="form-control" id="services_inclus" name="services_inclus" required>
                        </div>
                        <div class="form-group">
                            <label for="activite">Activity</label>
                            <input type="text" class="form-control" id="activite" name="activite" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
