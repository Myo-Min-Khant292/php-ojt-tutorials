@extends('layouts.layout')
@section('content')
    <div class="info">
        <h3>Student Edit</h3>
        <form action="{{route('student#store')}}" class="edit-form clearfix" id="form" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name">
                <p class="error">@error ('name'){{$message}} @enderror</p>
            </div>
            <div class="mb-3">
                <label for="major" class="form-label">Major</label>
                <select class="form-select" name="major" id="major">
                    <option value="" selected disabled>Choose Major</option>
                    @foreach ($majors as $major)
                    <option value="{{$major->id}}">{{$major->major}}</option>
                    @endforeach
                </select>
                <p class="error">@error ('major'){{$message}} @enderror</p>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="09-*******">
                <p class="error">@error ('phone'){{$message}} @enderror</p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="test@gmail.com">
                <p class="error">@error ('email'){{$message}} @enderror</p>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                <p class="error">@error ('address'){{$message}} @enderror</p>
            </div>
            <a href="{{route('student#index')}}" class="btn btn-secondary left">Back</a>
            <button type="submit" name="create" class="btn btn-primary right">Create</button>
        </form>
    </div>
@endsection