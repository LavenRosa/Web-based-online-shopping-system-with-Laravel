@extends('layout.backend')
@section('title','ItemCreate')
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
            <h3 class="m-0 fw-bold text-primary">Add New Item</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('ItemCreate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="itemname" class="form-label">Name</label>
                    <input type="text" class="form-control" name="itemname" id="itemname" placeholder="Item">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="0" disabled>-- Choose Category --</option>
                        @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand" id="brand" class="form-control">
                        <option value="0" disabled>-- Choose Brand --</option>
                        @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                </div>
                <div class="mb-3">
                    <label for="itemprice" class="form-label">Price</label>
                    <input type="text" class="form-control @error('itemprice') is-invalid @enderror" name="itemprice" id="itemprice">
                    @error('itemprice')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="itemimage" class="form-label">Image</label>
                    <input type="file" class="form-control @error('itemimage') is-invalid @enderror" name="itemimage" id="itemimage">
                    @error('itemimage')
                    <div class="invalid-feedback">{{ $validate }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="itemdetail" class="form-label">Detail</label>
                    <textarea name="itemdetail" id="itemdetail" cols="30"></textarea>
                </div>
                <div class="mb-3">
                    <label for="arrival_date" class="form-label">Arrival Date</label>
                    <input type="date" class="form-control @error('arrival_date') is-invalid @enderror" name="arrival_date" id="arrival_date">
                    @error('arrival_date')
                    <div class="invalid-feedback">{{ $validate }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm btn-icon-split mb-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Create</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
