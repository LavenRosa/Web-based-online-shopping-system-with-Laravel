@extends('layout.backend')
@section('title', 'Edit Item')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="m-0 fw-bold text-primary">Edit Item</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('ItemUpdate', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                <div class="mb-3">
                    <label for="itemname" class="form-label">Name</label>
                    <input type="text" class="form-control" name="itemname" id="itemname" value="{{ $item->name }}">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        <option value="0" disabled>-- Choose Category --</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $item->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <select name="brand" id="brand" class="form-control">
                        <option value="0" disabled>-- Choose Brand --</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @if($brand->id == $item->brand_id) selected @endif>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="itemprice" class="form-label">Price</label>
                    <input type="text" class="form-control" name="itemprice" id="itemprice" value="{{ $item->price }}">
                </div>
                <div class="mb-3">
                    <label for="itemimage" class="form-label">Image</label>
                    <input type="file" class="form-control" name="itemimage" id="itemimage">
                </div>
                <div class="mb-3">
                    <label for="itemdetail" class="form-label">Detail</label>
                    <textarea name="itemdetail" id="itemdetail" cols="30">{{ $item->detail }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="arrival_date" class="form-label">Arrival Date</label>
                    <input type="date" class="form-control" name="arrival_date" id="arrival_date" value="{{ $item->arrival_date }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm btn-icon-split mb-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

