@extends('layouts.layout')
@section('content')
    <div class="info">
        <h3>Major Edit</h3>
        <form action="{{route('major#update' , $major->id)}}" class="edit-form clearfix" id="form" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$major->major}}" placeholder="name">
                <p class="error">@error ('name'){{$message}} @enderror</p>
            </div>
            <a href="{{route('major#index')}}" class="btn btn-secondary left">Back</a>
            <button type="submit" name="update" class="btn btn-primary right">Update</button>
        </form>
    </div>
@endsection