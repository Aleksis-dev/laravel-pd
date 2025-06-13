@extends("layouts.app")

@section('title', 'Page Title')

@section('sidebar')

@endsection

@section('content')

    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('book.destroy', $singleBook) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Dzēst">
    </form>

    <h2>{{ $singleBook->title }}</h2>
    <h3>{{ $singleBook->author }}</h3>
    <p>{{ $singleBook->released_at }}</p>
    <a href="{{ route('book.index') }}">All books</a>
    
@endsection