@extends('layout.backend')
@section('content')
<div class="card shadow mb-4 p-4">
    @if (session('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('success')}}</li>
            </ul>
        </div>

        @endif
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registered Customer List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $customers as $customer )
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
