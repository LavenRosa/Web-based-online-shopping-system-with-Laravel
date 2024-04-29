@extends('layout.backend')
@section('content')
@if (session('success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('success')}}</li>
            </ul>
        </div>

    @endif
<div class="card shadow mb-4 p-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Item List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Detail</th>
                        <th>Arrival Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $items as $item )
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->Category->name }}</td>
                        <td>{{ optional($item->brand)->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td><img style="width: 100px; height:100px;" src="{{ asset($item->image)}}" alt=""></td>
                        <td>{{ $item->detail}}</td>
                        <td>{{ $item->arrival_date }}</td>
                        {{-- need to fix here --}}
                    <td class="">
                        <div class="d-flex">
                            <a href="{{ route('ItemEdit', $item->id )}}" class="btn btn-primary btn-sm btn-icon-split me-3">

                                <span class="text">Edit</span>
                            </a>
                            <a href="{{ route('ItemDelete', $item->id )}}" class="btn btn-danger  btn-sm btn-icon-split me-3">

                                <span class="text">Delete</span>
                            </a>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
