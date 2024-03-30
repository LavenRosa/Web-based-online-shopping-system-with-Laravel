@extends('layout.frontend')
@section('content')

<h5 style="text-align: center; color:rgb(74, 176, 239); margin-top:50px;">Search Results</h5>

    @if($results->count() > 0)
        <ul>
            <div class="col-lg-12" style="margin-top:50px; display:flex; justify-content:space-evenly;">
                @foreach ( $results as $result )
                <div class="col-lg-3">
                    <div class="card" style="width: 16rem;">
                        <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Job Function : {{ $result->function->name }}</h6>
                          <h5 class="card-title" style="margin-top: 10px;"><b>{{ $result->job_position }}</b></h5>
                          <div style="margin-top: 40px;">
                            <i class="fa fa-globe" aria-hidden="true"></i>&nbsp;<span><b>{{ $result->location->name }}</b></span>
                            <small style="margin-left: 30px;">{{ $result->job_type }}</small>
                          </div>
                          <div style="margin-top: 40px; margin-left: 30px;">
                            <span><b>{{ $result->company_name }}</b></span>
                            <img style="margin-left: 10px;" src="img/kbz.jfif" alt="" width="70px" height="70px">
                          </div>
                          <a href="{{ route('JobDetail', ['jobId' => $result->id]) }}" style="background-color:rgb(74, 176, 239); margin-left:100px; border-color:rgb(74, 176, 239);" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </ul>
    @else
        <p>No results found.</p>
    @endif

@endsection
