@extends('admin.auth.layouts.app')

@section('content')
    <!-- Forgot Password -->
    <div class="nk-block" id="l-forget-password">
        <form method="post" action="{{route('password.email')}}">
            @csrf
            <h3>Reset Password</h3>
            <div class="nk-form">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert-list mg-b-15">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                                </button>
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                @endif

                <p class="text-left">Enter your registerd e-mail to reset email</p>


                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                    <div class="nk-int-st">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                </div>

                <button type="submit"
                        class="btn btn-login btn-success btn-float">
                    <i class="notika-icon notika-right-arrow"></i>
                </button>
            </div>
        </form>


        <div class="nk-navigation nk-lg-ic rg-ic-stl custom-sign-link">
            <a href="{{route('login')}}">
                <i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
        </div>
    </div>
@endsection
