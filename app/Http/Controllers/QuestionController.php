<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function edit(Questionnaire $questionnaire, Question $question)
    {
        $answers = ($question->answers);

        return view('question.edit', compact('questionnaire', 'question', 'answers'));
    }

    public function update(Questionnaire $questionnaire, Question $question)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question->update($data['question']);

        foreach ($data['answers'] as $key => $answer) {
            $question->answers[$key]->update($answer);
        }

        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function destroy(Questionnaire $questionnaire, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($questionnaire->path());
    }
}
