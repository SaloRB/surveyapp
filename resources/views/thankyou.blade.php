@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Thank you!</div>

                <div class="card-body">
                    <p class="card-text">Please <a href="/register">register</a> so you can make and share your own
                        surveys!</p>

                    <hr>

                    <p>Share this survey by copying this link: <br />
                        <a href="{{ $questionnaire->publicPath() }}">{{ $questionnaire->publicPath() }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection