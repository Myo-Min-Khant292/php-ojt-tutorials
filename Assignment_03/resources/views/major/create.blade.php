@extends('layouts.layout')
@section('content')
    <div class="info">
        <h3>Major Create</h3>
        <form action="{{route('major.store')}}" class="edit-form clearfix" id="form" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="name">
                <p class="error">@error ('name'){{$message}} @enderror</p>
            </div>
            <a href="{{route('major.index')}}" class="btn btn-secondary left">Back</a>
            <button type="submit" name="create" class="btn btn-primary right">Create</button>
        </form>
    </div>
@endsection