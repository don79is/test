@extends('layouts.app')

@section('content')
    <div class="blog">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>Blog</h2>
            </div>
        </div>
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-8 text-left">
                            <h3> {{$title}}</h3>
                            <h3 class="panel-title">Post by: {{ Auth::user()->name }} </h3>

                        </div>
                        <div class="col-md-4 text-right">
                            <h6> Date:{{$created_at}}</h6>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <img style="width: 800px" src="/images/{{$path}}">
                    <p>{{$text}}</p>

                    <button href= href="{{route($edit, $value['id'])}}" class="btn btn-sm btn-info">
                        Edit
                    </button>
                    <a class="btn btn-sm btn-danger" onClick="return confirm('Really ?')" href="{{route($delete, $value['id'])}}" >
                        Delete
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection