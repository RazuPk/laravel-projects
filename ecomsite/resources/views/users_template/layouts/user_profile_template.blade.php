@extends('users_template.layouts.template')
@section('page-title')
    User Profile | EcomSite
@endsection
@section('banner-slider')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{ route('userprofile') }}">Dashboard</a></li>
                        <li><a href="{{ route('pendingorders') }}">Pending Order</a></li>
                        <li><a href="{{ route('history') }}">History</a></li>
                        <li><a href="{{ route('userlogout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="box_main">
                    @yield('profilecontent')
                </div>
            </div>
        </div>
    </div>
@endsection
