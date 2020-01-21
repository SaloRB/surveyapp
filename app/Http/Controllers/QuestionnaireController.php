<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);

        // Mail::to(auth()->user()->email)->send(new WelcomeMail($questionnaire));

        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');

        return view('questionnaire.show', compact('questionnaire'));
    }

    public function destroy(Questionnaire $questionnaire)
    {
        foreach ($questionnaire->questions as $question) {
            $question->answers()->delete();
        }

        $questionnaire->questions()->delete();

        $questionnaire->delete();

        return redirect('/home');
    }
}
