@extends('Layouts.admin')
@section('page')

<div class="main-panel">
    <div class="content-wrapper">
        <h1>Travel packages list</h1>
        <br>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <br>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <br>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Unit Price</th>
                                <th>Destination</th>
                                <th>Catégorie</th>
                                <th>Number of Available Seats</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                            <tr>
                                <td>{{ $package->id }}</td>
                                <td>
                                    @if($package->photo)
                                        <img src="{{ asset('storage/' . $package->photo) }}" width="100" height="100" alt="Package Photo">
                                    @else
                                        Pas de photo
                                    @endif
                                </td>
                                <td>{{ $package->description }}</td>
                                <td>{{ $package->prix_unit }}</td>
                                <td>{{ $package->destination }}</td>
                                <td>{{ $package->nbr_place_dispo }}</td>
                                <td>{{ $package->category->category_name }}</td>


                                <td>
                                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning">Update</a>
                                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $package->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $package->id }})">Delete</button>
                                    </form>
                                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#detailsModal{{ $package->id }}">
                                        Details
                                    </button>

                                    <div class="modal fade" id="detailsModal{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel{{ $package->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="detailsModalLabel{{ $package->id }}">Details</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Departure Date:</strong> {{ $package->date_depart }}</p>
                                                    <p><strong>Return Date:</strong> {{ $package->date_retour }}</p>
                                                    <p><strong>Transport:</strong> {{ $package->transport }}</p>
                                                    <p><strong>Departure location:</strong> {{ $package->lieu_depart }}</p>
                                                    <p><strong>Included services:</strong> {{ $package->services_inclus }}</p>
                                                    <p><strong>Activity:</strong> {{ $package->activite }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(packageId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + packageId).submit();
            }
        })
    }
</script>
@endsection
