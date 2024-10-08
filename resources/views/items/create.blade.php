@extends('layout')

@section('content')
<h1>Add New Item</h1>

<form action="{{ route('items.store') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <label for="description">Comments:</label>
    <textarea class="form-control" rows="5" id="description" name="description"></textarea>
    <button type="submit" class="btn btn-primary">Add item</button>
  </form>
@endsection


