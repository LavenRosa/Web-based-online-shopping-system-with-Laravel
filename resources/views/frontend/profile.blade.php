@extends('layout.frontend')
@section('content')

<div class="row main-content  text-center" style="margin-top:50px; margin-left:300px;">
    <div class="col-md-8 col-xs-12 col-sm-12" id="profile">
        <div class="img">
            <img src="img/makeuptools.png" width="150px" height="150px" style="border-radius: 50%;" alt="">
        </div>
        <div class="title">
            <h5>Username</h5><br>
            <h5>user@gmail.com</h5>
        </div>
        <div class="foot">
            <a href=""><button id="btn" style="width: 150px;"  type="submit">Change Password</button></a>
            <a href=""><button id="btn"  type="submit">Logout</button></a>
        </div>
    </div>
    <div class="col-md-4 text-center login_form">
        <h6 style="margin-top: 100px;"><b>FAVORITE ITEM LIST</b></h6><br>
        <ul>
            <li>lipstick</li>
            <li>lipstick</li>
            <li>lipstick</li>
            <li>lipstick</li>
            <li>lipstick</li>
            <li>lipstick</li>
        </ul>
    </div>
</div>

@endsection
