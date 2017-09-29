@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="blog">

            @if (Auth::guest())
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h2>Please log in</h2>
                    </div>
                </div>
            @else
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2>All Posts</h2>
                    </div>
                </div>
            @endif

            @foreach( $lists as $list)

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>{{$list['title']}}</h3>
                            <p>{{$list['text']}}</p>

                        </div>
                        <img style="width: 500px" src="/images/{{$list['path']}}">
                        <a class="btn btn-sm btn-success" href="{{route('app.posts.show', $list['id'])}}">View</a>


                        @if (Auth::guest())
                            {{--<a href="{{route('app.posts.edit', $list['id'])}}" class="btn btn-sm btn-info"--}}
                               {{--hidden>Edit</a>--}}
                            {{--<a  onClick="return confirm('Really ?')"--}}
                               {{--href="{{route('app.posts.delete', $list['id'])}}" class="btn btn-sm btn-danger" hidden>Delete</a>--}}
                        @else
                            <a href="{{route('app.posts.edit', $list['id'])}}" class="btn btn-sm btn-info">Edit</a>
                            <a class="btn btn-sm btn-danger" onClick="return confirm('Really ?')"
                               href="{{route('app.posts.delete', $list['id'])}}">Delete</a>
                        @endif
                    </div>
                </div>

                {{--<div class="panel panel-info">--}}
                {{--<div class="panel-heading">--}}

                {{--<div class="row">--}}
                {{--<div class="col-md-8 text-left">--}}
                {{--<h3> {{$list['title']}}</h3>--}}
                {{--<h3 class="panel-title">Post by: </h3>--}}

                {{--</div>--}}
                {{--<div class="col-md-4 text-right">--}}
                {{--<h6> Date:{{$list['created_at']}}</h6>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

                {{--<div class="panel-body">--}}
                {{--<img style="width: 500px" src="/images/{{$list['path']}}">--}}
                {{--<p>{{$list['text']}}</p>--}}

                {{--<a class="btn btn-sm btn-danger" onClick="return confirm('Really ?')"--}}
                {{--href="{{route('app.posts.show', $list['id'])}}">--}}
                {{--show--}}
                {{--</a>--}}
                {{--<a href="{{route($edit, $list['id'])}}" class="btn btn-sm btn-info">--}}
                {{--Edit--}}
                {{--</a>--}}
                {{--<a class="btn btn-sm btn-danger" onClick="return confirm('Really ?')"--}}
                {{--href="{{route($delete, $list['id'])}}">--}}
                {{--Delete--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}
            @endforeach
        </div>
    </div>


@endsection
