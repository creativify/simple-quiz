@extends('layouts.admin')
@section('content')
    <div id="intro" class="col-md-8 col-md-offset-2">
        @if (session('statuserror'))
            <div id="updater" class="alert alert-success">
                {{ session('statuserror') }}
            </div>
        @endif
        @if (session('statussuccess'))
            <div id="updater" class="alert alert-success">
                {{ session('statussuccess') }}
            </div>
        @endif
        <div id="ajaxupdater" class="alert"></div>
        <div><a class="btn btn-primary" href="{{ url('/admin/quizzes') }}"><span class="glyphicon
        glyphicon-arrow-left"></span> Back to all quizzes</a>
        </div>
        <br />
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h3>Quiz Details:</h3></div>
            <div class="panel-body">
                <ul style="width:50%;" class="list-group">
                    <li class="list-group-item"><strong>Name</strong>: {{$quiz->name}}</li>
                    <li class="list-group-item"><strong>Description</strong>: {{$quiz->description}}</li>
                    <li class="list-group-item"><strong>Category</strong>: {{$quiz->category->name}}</li>
                    <li class="list-group-item"><strong>Active? </strong>
                        @if ($quiz->isActive())
                            <span class="glyphicon glyphicon-ok">
                        @else
                            <span class="glyphicon glyphicon-remove-circle">
                        @endif
                    </li>
                    <li class="list-group-item"><strong>Number Of Questions</strong>: <span
                                class="badge">{{$quiz->questions->count()}}</span></li>
                    <li class="list-group-item"><strong>Times Taken</strong>: <span
                                class="badge">{{$quiz->users->count()}}
                    </span></li>
                </ul>
                <button id="editquiz" title="Edit Quiz Details" type="button" class="btn btn-primary">Edit Quiz Details <span class="glyphicon glyphicon-pencil"></span></button>
            </div>
        </div>
    </div>
    @include('admin.partials.editquizmodal')
@endsection