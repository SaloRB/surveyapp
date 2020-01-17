@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Question</div>

                <div class="card-body">
                    <form action="{{ $questionnaire->path() }}/questions/{{ $question->id }}" method="post">
                        @method('PATCH')

                        @include('question.form')

                        <button type="submit" class="btn btn-primary">Update Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection