@extends('layout')

@section('content')
<h1>Items List</h1>
<a href="{{ route('items.create') }}">Add New Item</a>

<ul class="list-group list-group-flush">
    @foreach($items as $item)
    <li class="list-group-item">{{ $item->name }} - {{ $item->description }}
        <br>
        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-block">Edit</a><br>
        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary btn-block mt-2">Delete</button>
        </form>
    
    </li>
    @endforeach
</ul>
@endsection
