@extends('Auth.master')

@section('title')
    register
@endsection

@section('style')

@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>


                                    @if (session()->has('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{session('success')}}
                                        </div>
                                    @endif


                                    <form action="{{ route('post.register') }}" method="POST" id="regForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
                                            @error('name')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                            @error('email')
                                            <small class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                                @error('password')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Register Account
                                        </button>
                                    </form>

                                    {{--
                                    <hr>
                                    <a href="" class="btn btn-facebook btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Join Us with Facebook
                                    </a>
                                     <a href="" class="btn btn-google btn-block">
                                        <i class="fab fa-google fa-fw"></i> Register with Google
                                    </a>


                                      <hr>
                                            <div class="text-center">
                                                <a class="small" href="">Forgot Password?</a>
                                            </div>
                                    --}}

                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
