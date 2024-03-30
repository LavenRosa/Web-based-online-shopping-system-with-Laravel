@extends('layout.frontend')
@section('content')

<section id="category">
    <div class="container-fluid">
        <div class="row">
            <h4 style="text-align: center; margin-top:50px;"><b>{{ $category->name }}</b></h4>
        </div>
        <div class="row1">
            @foreach ($items as $index => $item)
            @if ($index > 0 && $index % 4 == 0)
                </div><div class="row">
            @endif
            <div class="col-lg-3 mb-4" style="margin-left: 20px;">
                <a href="{{ route('ItemDetail', ['id' => $item->id ])}}">
                    <img src="{{ asset( $item->image )}}"  alt="">
                </a>
                <div class="caption">
                    <h6>{{ $item->name }}</h6>
                    <span>{{ $item->price }}</span><br>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

@endsection
