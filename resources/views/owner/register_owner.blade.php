@extends('layout.header')

@section('title','signup page')

@section('content')
    <section class="container">
        <div class="form login">
            <div class="form-content">
                <header>Owner Register</header>
                {{-- including successmsg  --}}
                @include('layout.Successmsg')
                <form action="{{ route('signup') }}" method="post">
                    @csrf
                    <div class="field input-field">
                        <input type="text" name="name" placeholder="Enter the name" class="input">
                        @error('name')
                            <span class="validate">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Enter the Email Address" class="input">
                        @error('email')
                            <span class="validate">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="field input-field">
                        <input type="number" name="mobile" placeholder="Enter the mobile number" class="input">
                        @error('mobile')
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
                    <div class="field input-field">
                        <input type="password" name="cnf_password" placeholder="Renter the Password" class="password">
                        @error('cnf_password')
                            <span class="validate">{{ $message }}</span>
                        @enderror
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <br>
                    <div class="field button-field">
                        <button type="submit">Register</button>
                    </div>
                    <div class="form-link">
                        <span>already have an account? <a href="{{route('login')}}">login</a></span>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
