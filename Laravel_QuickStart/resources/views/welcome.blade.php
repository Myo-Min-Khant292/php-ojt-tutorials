@extends('layouts.layout')
@section('content')
    <div class="task">
        <h3>New Task</h3>
        <form action="{{route('task.index')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <input type="text" class="form-control" id="task" name="name">
                <p class="error-text">@error ('name'){{$message}} @enderror</p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="task">
        <h3>Current Task</h3>
        <p>Task</p>
        <table class="table table-secondary table-striped">
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{$task->name}}</td>
                <td>
                    <form action="{{route('task.destroy', $task->id)}}" id="form" method="POST">
                        @csrf 
                        @method('DELETE')                     
                        <input type='submit' class="btn btn-danger" value="Destroy">
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
        </table>
    </div>
@endsection
