@extends('admin.auth.layouts.app')

@section('content')
    <!-- Login -->
    <div class="nk-block toggled" id="l-login">
        <h3>Admin Login</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="nk-form">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="email" class="form-control" placeholder="E-Mail" name="email" value="{{ old('email') }}"
                               required autocomplete="email" autofocus/>
                        @error('email')
                        <span class="invalid-feedback  text-left" role="alert">
                            <p class="text-danger">{{ $message }}</p>
                         </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback  text-left" role="alert">
                            <p class="text-danger">{{ $message }}</p>
                         </span>
                        @enderror
                    </div>
                </div>
                <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} /> <i></i> Keep me signed in</label>
                </div>
                <button type="submit" class="btn btn-login btn-success btn-float"><i
                        class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
            </div>
        </form>


        <div class="nk-navigation nk-lg-ic custom-forget-password-link">
            <a href="{{route('password.request')}}"><i>?</i> <span>Forgot Password</span></a>
        </div>
    </div>
@endsection
