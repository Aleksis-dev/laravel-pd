@extends("layouts.app")

@section('title', 'Page Title')

@section('sidebar')

@endsection

@section('content')

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
    
@endsection