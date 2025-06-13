<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit book</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('book.update', $editBook) }}" method="post">
        @csrf
        @method('put')

        <input type="text" name="title" placeholder="title goes here" value="{{ $editBook->title }}">
        <input type="text" name="author" placeholder="author goes here" value="{{ $editBook->author }}">
        <input type="date" name="released_at" placeholder="date goes here" value="{{ $editBook->released_at }}">
        <input type="submit" value="Update">
    </form>
</body>
</html>