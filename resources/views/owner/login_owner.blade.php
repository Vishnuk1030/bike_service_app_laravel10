@extends('layout.header')

@section('title','login page')

@section('content')
    <section class="container">
        <div class="form login">
            <div class="form-content">
                <header>Owner Login</header>
                {{-- including successmsg  --}}
                @include('layout.Successmsg')
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Enter the Email Address" class="input">
                        @error('email')
                            <span class="validate">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Enter the Password" class="password">
                        @error('password')
                            <span class="validate">{{ $message }}</span>
                        @enderror
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <br>
                    <div class="field button-field">
                        <button type="submit">Login</button>
                    </div>
                    <div class="form-link">
                        <span>Don't have an account? <a href="{{ route('signup') }}">Signup</a></span>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
