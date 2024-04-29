@extends('layout.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h1 class=" m-5">Change Password</h1>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-7">
                            <form method="POST" action="{{ route('ChangePassword')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old("name", Auth::user()->name )}}" required autocomplete="name" autofocus placeholder="Blog Admin">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old("email", Auth::user()->email )}}" required autocomplete="email" autofocus placeholder="admin@gmail.com">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Current Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" value="{{ old("password")}}" required autocomplete="password" autofocus placeholder="Enter Current Password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newpassword" class="col-md-4 col-form-label text-md-end">New Password</label>
                                    <div class="col-md-6">
                                        <input id="newpassword" type="password" class="form-control" name="newpassword" value="{{ old("newpassword")}}" required autocomplete="newpassword" autofocus placeholder="Enter New Password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="cnewpassword" class="col-md-4 col-form-label text-md-end">Confirm New Password</label>
                                    <div class="col-md-6">
                                        <input id="cnewpassword" type="password" class="form-control" name="cnewpassword" value="{{ old("cnewpassword")}}" required autocomplete="newpassword" autofocus placeholder="Confirm New Password">
                                    </div>
                                </div>
                                <div >
                                        <a href="{{ route('ShowProfile')}}" class="btn btn-secondary" style="width: 150px; height:50px; border-color:lightsalmon; background-color: lightsalmon;color: white;">Cancel</a>
                                        <button style="width: 150px; background-color: lightsalmon;color: white; border-color:lightsalmon; height:50px; margin-left:30px;" class="btn btn-primary" type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
