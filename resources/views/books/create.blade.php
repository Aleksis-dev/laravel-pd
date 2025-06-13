@extends("layouts.app")

@section('title', 'Page Title')

@section('sidebar')

@endsection

@section('content')

    <h1>New book</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="title goes here" value="{{ old('title') }}">
        <input type="text" name="author" placeholder="author goes here" value="{{ old('author') }}">
        <input type="date" name="released_at" placeholder="date goes here" value="{{ old('released_at') }}"><br>
        <label for="image">Image: </label>
        <input type="file" name="image"><br>
        <input type="submit" value="Create">
    </form>

@endsection
