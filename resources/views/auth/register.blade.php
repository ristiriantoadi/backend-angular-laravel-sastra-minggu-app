@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->
                <div class="card-header">Register Admin</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <!-- <div>
                            <label for="nama-lengkap">Nama Lengkap</label>
                            <input type="text" id="nama-lengkap" name="nama_lengkap">
                        </div> -->
                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
