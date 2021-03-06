@extends('auth.layout.hearder')
@section('content')


{{-- form login --}}
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            @if (session('success'))
            <div class="alert alert-success " role="alert">
                    {{  session('success') }}
            </div>
            @elseif (session('erros'))
            <div class="alert alert-erros " role="alert">
                {{ session('erros') }}
           </div>
            @endif
            <form class="login100-form validate-form" method="POST" action="{{ route('auth.login') }}">
                @csrf
                <span class="login100-form-title p-b-26">
						Welcome
					</span>
                <span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit">
								DANG NHAP
							</button>
                    </div>
                </div>

                <div class="text-center p-t-115">
                    <span class="txt1">
							Don’t have an account?
						</span>

                    <a class="txt2" href="{{ route('register.index') }}">
							Sign Up
						</a>
                </div>
                <div class="text-center p-t-10">
                    <span class="txt1">
							Don’t remember password?
						</span>

                    <a class="txt2" href="{{ route('email.index') }}">
							get password
						</a>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
