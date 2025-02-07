@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>Selamat datang : {{ Auth::user()->name }} </h4>
                        <p>Anda login sebagai : <span class="badge bg-success">{{ Auth::user()->role }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
