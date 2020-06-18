@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="hero bg-primary text-white">
            <div class="hero-inner">
            <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
                <p class="lead">Aplikasi Evoting Sederhana .</p>
            </div>
        </div>
    </div>
</div>
@endsection