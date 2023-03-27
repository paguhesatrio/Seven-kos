@extends('layouts.main')

@section('content')
<div class="col-md-5">
    <div class="card">

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endifS

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label class="font-weight-bold text-uppercase">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Masukkan Alamat Email">

                    @error('email')
                    <div class="alert alert-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">SEND PASSWORD RESET LINK</button>
            </form>
        </div>
    </div>
</div>
@endsection
