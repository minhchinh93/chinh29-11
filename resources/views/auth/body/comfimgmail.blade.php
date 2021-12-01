@extends('auth.layout.hearder')




@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('checkmail') }}">
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

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            confirm
							</button>
                    </div>
                </div>

                <div class="text-center p-t-115">
                    <span class="txt1">
							Don’t have an account?
						</span>

                    <a class="txt2" href="{{ route('login') }}">
							Sign Up
						</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

