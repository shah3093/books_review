@extends('admin.auth.layouts.app')

@section('content')
    <!-- Login -->
    <div class="nk-block toggled" id="l-login">
        <h3>Reset Password</h3>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="nk-form">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input type="text" class="form-control" placeholder="E-Mail Address" name="email"
                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus/>
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
                        <input type="password" class="form-control" placeholder="Password" name="password" required
                               autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback  text-left" role="alert">
                            <p class="text-danger">{{ $message }}</p>
                         </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" class="form-control" placeholder="Confirm Password"
                               name="password_confirmation" required autocomplete="new-password">
                        @error('password_confirmation')
                        <span class="invalid-feedback  text-left" role="alert">
                            <p class="text-danger">{{ $message }}</p>
                         </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-login btn-success btn-float"><i
                        class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
            </div>
        </form>

        <div class="nk-navigation nk-lg-ic rg-ic-stl custom-sign-link">
            <a href="{{route('login')}}">
                <i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
        </div>
    </div>
@endsection
