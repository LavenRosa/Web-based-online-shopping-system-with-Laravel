@extends('layout.backend')
@section('title','Create Category')
@section('content')

    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session('success')}}</li>
                </ul>
            </div>

        @endif
        <div class="card shadow mb-4 ">
            <div class="card-header">
                <h3 class="m-0 fw-bold text-primary">Create Category</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('CategoryUpdate', $data->id)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="categoryName" id="categoryName" value="{{ $data->name }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm btn-icon-split mb-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
