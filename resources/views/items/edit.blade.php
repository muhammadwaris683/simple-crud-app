@extends('layout')

@section('content')
<h1>Edit Item</h1>

<form action="{{ route('items.update', $items->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$items->name}}">
      </div>

      <label for="description">Description:</label>
      <textarea class="form-control" rows="5" id="description" name="description">{{ $items->description }}</textarea>
      <button type="submit" class="btn btn-primary">Update item</button>

  

    
</form>
@endsection
