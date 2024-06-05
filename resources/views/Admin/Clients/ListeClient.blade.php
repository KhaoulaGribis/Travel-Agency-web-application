@extends('Layouts.admin')
@section('page')

 <!-- partial -->
 <div class="main-panel">
    <div class="content-wrapper">
      <h1>Clients List</h1>
      <br>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <br>
            <div class="container">
                <table class="table">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Contact number</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{ $client -> id }}</td>
                    <td>{{ $client -> name }}</td>
                    <td>{{ $client -> phone }}</td>
                    <td>{{ $client -> email}}</td>
                    <td>

                        <a href="/deleteClient/{{ $client->id }}" class="btn btn-info">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>



















@endsection
