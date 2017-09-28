@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('app.posts.store') }}" method="post" enctype="multipart/form-data">
            {{Form::token()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="titleHelp"
                       placeholder="Enter title" name="title">

            </div>

            <div class="form-group">
                <label for="text">Post content</label>
                <textarea draggable="" class="form-control" id="text" rows="3" aria-describedby="textHelp"
                          placeholder="Enter text" name="text"></textarea>

            </div>

            <div class="form-group">
                <label for="path">Upload a picture</label>
                <input type="file" class="form-control-file" id="path" name="path" accept="image/*" onchange="loadFile(event)">
                <img id="output"  width="500" height="500" />

            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection



