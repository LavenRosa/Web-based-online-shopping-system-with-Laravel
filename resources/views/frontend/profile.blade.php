@extends('layout.frontend')
@section('content')

<script>
    window.onload = function() {
        @if (!Auth::check())
            alert("Please log in to view your profile.");
        @endif
    };
</script>

<div class="row main-content text-center" style="margin-top:50px; margin-left:300px;">
    @if(Auth::check())
        <div class="col-md-8 col-xs-12 col-sm-12" id="profile">
            <div class="img">
                <img src="{{ asset('images/profile.png')}}" width="150px" height="150px" style="border-radius: 50%;" alt="">
            </div>
            <div class="title">
                <h5>{{  $users->name }}</h5><br>
                <h5>{{ $users->email }}</h5>
            </div>
            <div class="foot">
                <a href="{{ route('ShowChangePassword')}}"><button id="btn" style="width: 150px; height:30px; border-radius: 5px;"  type="submit">Change Password</button></a>
                <a href="{{ route('Logout') }}"><button id="btn" style="width:150px; height:30px; border-radius: 5px;"  type="submit">Logout</button></a>
            </div>
        </div>
        <div class="col-md-4 text-center login_form">
            <h6 style="margin-top: 100px;"><b>FAVORITE ITEM LIST</b></h6><br>
            <div>
                @foreach($favorites as $favorite)
                <table>
                    <tr>
                        <td><span>{{ $favorite->item->name }}</span></td>
                        <td style="width: 150px;"><a href="{{ route('DeleteFavorite', ['item_id' => $favorite->item_id]) }}">
                            <button type="button" class="btn" style="background-color: lightsalmon; color:white;">Remove</button>
                        </a></td>
                    </tr>
                </table>

                @endforeach
            </div>
        </div>
    @else
            <div class="card" style="background-color: lightsalmon;">
                <div class="card-header">
                    <h6 style="color: white;">Please log in to view your profile.</h6>
                </div>
            </div>
    @endif
</div>

@endsection
