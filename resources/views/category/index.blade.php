@extends('layouts.home')
@section('content')
    <div id="container" class="quiz">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="jumbotron">
                    <h1>Categories</h1>
                    <p>A simple framework for creating and displaying quizzes. Written in PHP.</p>
                </div>
            </div><!--/span-->

            @include('partials.common-sidebar')
        </div><!--/row-->

    </div><!--container-->
@endsection