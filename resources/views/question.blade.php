<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello dear</h1>
    <h1>{{ $question->question_title }}</h1>

    @if ($question->image)
        <img src="{{ asset('storage/' . $question->image) }}" alt="{{ $question->question_title }}">
    @endif
</body>
</html>