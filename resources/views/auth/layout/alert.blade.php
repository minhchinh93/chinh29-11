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
        </div>
    </div>
</div>


@endsection
