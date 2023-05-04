@extends('layouts.layout')
@section('content')
    <div class="btn-div clearfix">
        <a href="{{route('student#create')}}" class="btn btn-primary">Create</a>
        <a href="{{route('student#ex')}}" class="btn btn-primary">Go to Example</a>
    </div>
    <div class="info">
        <h1>Students Lists</h1>
        <table class="table table-secondary table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Major</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{$student->id}}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->major->major}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->address}}</td>
                    <td>
                        <form action="{{route('student#destroy' , $student->id)}}" id="form" method="POST">
                            @csrf
                            <a href="{{route('student#edit' , $student->id)}}" class="btn btn-success">Edit</a>
                        </form>
                        <button type="submit" name="delete" class="btn btn-danger" onclick="deleteData('{{$student->id}}')">Delete</button>
                    </td>          
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function deleteData(id) {
            axios.delete(`/destroy/${id}`)
                .then(response => {
                console.log(response);
                })
                .catch(error => {
                console.log(error);
                });
        }
    </script>
@endsection
