@extends('layouts.home')
@section('content')
    <div id="container" class="quiz">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="jumbotron">
                    <h1>{{$category->name}}</h1>
                    <p>{{$category->description}}.</p>
                </div>
            </div>

            @include('partials.common-sidebar')
        </div><!--/row-->

    </div><!--container-->
@endsection