@extends('layout.frontend')
@section('content')

<section id="category">
    <div class="container-fluid">
        <div class="row">
            <h4 style="text-align: center; margin-top:50px;"><b>Search Results</b></h4>
        </div>
        @if($results->count() > 0)
            <div class="row1">
                @foreach ($results as $result)
                    @if ($loop->index > 0 && $loop->index % 4 == 0)
                        </div><div class="row">
                    @endif
                    <div class="col-lg-3 mb-4" style="margin-left: 20px;">
                        <a href="{{ route('ItemDetail', ['id' => $result->id]) }}">
                            <img src="{{ asset($result->image) }}" alt="">
                        </a>
                        <div class="caption">
                            <h6>{{ $result->name }}</h6>
                            <span>{{ $result->price }}</span><br>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <span style="margin-left: 30px; margin-top:50px;">No Results Found.</span>
        @endif
    </div>
</section>


@endsection
