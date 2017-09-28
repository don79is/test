@extends('layouts.app')

@section('content')

    <div class="blog">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h2>Blog</h2>
            </div>
        </div>
        @foreach( $list as $value)
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-8 text-left">
                            <h3> {{$value['title']}}</h3>
                            <h3 class="panel-title">Post by: {{ Auth::user()->name }} </h3>

                        </div>
                        <div class="col-md-4 text-right">
                            <h6> Date:{{$value['created_at']}}</h6>
                        </div>
                    </div>

                    </div>
                </div>
                <div class="panel-body">
                    <img style="width: 500px" src="/images/{{$value['path']}}">
                    <p>{{$value['text']}}</p>
                </div>
            <a href="{{route($edit, $value['id'])}}"  class="btn btn-sm btn-info">
               Edit
            </a>
            <a class="btn btn-sm btn-danger" onClick="return confirm('Really ?')" href="{{route($delete, $value['id'])}}" >
               Delete
            </a>

            </div>
        </div>
    </div>
    @endforeach
@endsection
