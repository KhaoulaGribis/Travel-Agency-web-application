@extends('Layouts.admin')
@section('page')

<div class="main-panel">
    <div class="content-wrapper">
        <h1>Coupons List</h1>
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
                                <th>Code</th>
                                <th>Amount to subtract</th>
                                <th>Number of uses</th>
                                <th>Percentage of reduction</th>
                                <th>Expiration date</th>
                                <th>Travel ID</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->discount }}</td>
                                <td>{{ $coupon->max_user }}</td>
                                <td>{{ $coupon->pourcentage }}</td>
                                <td>{{ $coupon->expires_at }}</td>
                                <td>{{ $coupon->package_id }}</td>
                                <td>
                                    <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-warning">Update</a>
                                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $coupon->id }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="confirmDelete({{$coupon->id}})" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(couponId) {
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
                    document.getElementById('delete-form-' + couponId).submit();
                }
            })
        }
    </script>

@endsection
