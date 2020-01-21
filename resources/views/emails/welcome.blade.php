@component('mail::message')
# New Questionnaire

You have created a new questionnaire with the title **{{ $questionnaire->title }}**
and the purpose **{{ $questionnaire->purpose }}**

Make sure to add some questions!

Thanks,<br>
{{ config('app.name') }}
@endcomponent