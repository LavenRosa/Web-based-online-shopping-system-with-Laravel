@extends('layout.backend')
@section('content')
<div class="card shadow mb-4 p-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $categories)
                    <tr>
                        <td>{{ $categories->id }}</td>
                        <td>{{ $categories->name }}</td>
                    <td class="">
                        <div class="d-flex">
                            <a href="{{ route('CategoryEdit', $categories->id )}}" class="btn btn-primary btn-sm btn-icon-split me-3">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                            <a href="{{ route('CategoryDelete', $categories->id )}}" class="btn btn-danger  btn-sm btn-icon-split me-3">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
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
