@extends('layout.frontend')
@section('content')
<section class="main-top" style="margin-top:50px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4" style="margin-top:50px;">
                <span style="font-family:'Poppins', sans-serif; margin-left:50px; text-align:center;">Have Enjoy your Shopping with Us!</span>
                <a href="">
                    <button type="submit" class="btn" style="border:raduis:">Shop Now</button>
                </a>
            </div>
            <div class="col-lg-4">
                <img src="./img/about.png" alt="" width="300px" height="350px" style="margin-left:30px;">
            </div>
            <div class="col-lg-4" style="font-family:'Poppins', sans-serif; margin-top: 250px;">
                <span>Make You More Beautiful From Here!</span>
            </div>
        </div>
    </div>
</section>
<section class="second">
    <div class="container-fluid" style="margin-top:50px;">
        <div class="row">
            <div class="col-lg-8">
                <div class="row2">
                    <div class="col5">
                            <img src="./img/makeuptools.png" alt="" style="width: 300px; height: 350px;">
                        </div>
                        <div class="cols" >
                            <div class="col1">
                                <div class="incol d-flex">
                                    <div class="col2">
                                        <img src="./img/makeuptools.png" alt="" style="width: 180px; height: 170px; margin-left:20px; margin-top:20px;">
                                    </div>
                                    <div class="col3">
                                        <img src="./img/makeuptools.png" alt="" style="width: 180px; height: 170px; margin-top:20px;">
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-evenly;">
                                    <div class="col4">
                                        <img src="./img/makeuptools.png" alt="" style="width: 180px; height: 170px; margin-left:20px;">
                                    </div>
                                    <div class="col6">
                                        <img src="./img/makeuptools.png" alt="" style="width: 180px; height: 170px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="category">
    <div class="container-fluid" style="margin-top:100px;">
        <div class="row1" style="margin-top:50px;">
            <h6 style="font-family:'Poppins', sans-serif; text-align:center">CATEGORY</h6>
        </div>
        <div class="row" style="margin-top:50px; margin-left:40px;">
            <div class="col-lg-3">
                <a href=""><img src="./img/face.webp" alt=""></a><br>
                <span style="margin-left:60px;">FACE</span>
            </div>
            <div class="col-lg-3">
                <a href=""><img src="./img/eye.jpg" alt=""></a><br>
                <span style="margin-left:60px;">EYE</span>
            </div>
            <div class="col-lg-3">
                <a href=""><img src="./img/lip.webp" alt=""></a><br>
                <span style="margin-left:60px;">LIP</span>
            </div>
            <div class="col-lg-3">
                <a href=""><img src="./img/makeuptools.png" alt=""></a><br>
                <span>MAKEUP TOOLS</span>
            </div>
        </div>
    </div>
</section>
<section class="third">
    <div class="container" style="margin-top:100px;">
        <div class="center">
            <p>Have a nice Shopping.</p>
            <div class="btn">
                <a href=""><button type="submit" class="btn">Shop Now</button></a>
            </div>
        </div>
    </div>
</section>
@endsection
