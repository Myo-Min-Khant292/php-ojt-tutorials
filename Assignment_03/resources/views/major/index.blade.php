@extends('layouts.layout')
@section('content')
    <div class="btn-div clearfix">
        <a href="{{route('major.create')}}" class="btn btn-primary">Create</a>
    </div>
    <div class="info">
        <h1>Major Lists</h1>
        <table class="table table-secondary table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($majors as $major)
                <tr>
                    <th scope="row">{{$major->id}}</th>
                    <td>{{$major->major}}</td>
                    <td>
                        <form action="{{route('major.destroy' , $major->id)}}" id="form" method="POST">
                            @csrf
                            <a href="{{route('major.edit' , $major->id)}}" class="btn btn-success">Edit</a>
                            <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>          
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
