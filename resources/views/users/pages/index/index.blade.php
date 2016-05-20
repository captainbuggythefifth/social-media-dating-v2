@extends('users.layouts.app')

@section('content')
    <div style="margin-top: 60px">
        <video autoplay  poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid">
            <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
            <source src="/videos/polina.webm" type="video/webm">
            <source src="/videos/polina.mp4" type="video/mp4">
        </video>

        <div class="container">
            <div class="col-sm-6 col-md-offset-3 col-md-2 col-md-offset-5">
            <div class="row">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/register" class="btn btn-raised btn-lg btn-info cols-sm-12">Sign Up</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="/login" class="btn btn-raised btn-lg btn-warning cols-sm-12">Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
