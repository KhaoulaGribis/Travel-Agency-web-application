@extends('Layouts.admin')
@section('page')

<div class="main-panel">
    <div class="content-wrapper">
        <h1>Reservations List</h1>
        <br>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <br>
        <div class="row">
            <div class="col-lg-5 grid-margin stretch-card">
                <br>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Client ID</th>
                                <th>Package ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Number of Tickets</th>
                                <th>Original Price</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>
                                    @if($reservation->photo)
                                        <img src="{{ asset('storage/' . $reservation->photo) }}" width="100" height="100" alt="Reservation Photo">
                                    @else
                                        Pas de photo
                                    @endif
                                </td>
                                <td>{{ $reservation->clt_id }}</td>
                                <td>{{ $reservation->pkg_id }}</td>
                                <td>{{ $reservation->first_name }} </td>
                                <td>{{ $reservation->last_name }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->contact_number }}</td>
                                <td>{{ $reservation->quantity }}</td>
                                <td>{{ $reservation->Original_price}}</td>
                                <td>{{ $reservation->total_price}}</td>

                                <td>
                                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#detailsModal{{ $reservation->id }}">
                                        Details
                                    </button>
                                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $reservation->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $reservation->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="detailsModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel{{ $reservation->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="detailsModalLabel{{ $reservation->id }}">Details</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Gender:</strong> {{ $reservation->gender }}</p>
                                                <p><strong>Coupon:</strong> {{ $reservation->coupon }}</p>
                                                <p><strong>Discount Amount:</strong> {{ $reservation->discount_amount }}</p>
                                                <p><strong>Departure City:</strong>{{ $reservation->departure_city }}</p>
                                                <p><strong>Message:</strong> {{ $reservation->message }}</p>
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
    function confirmDelete(reservationId) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas annuler cette action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + reservationId).submit();
            }
        })
    }
</script>




@endsection
