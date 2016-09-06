@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
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
            @include('admin.partials.sidenav')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Quizzes</div>
                    <table id="quizzes" class="table table-striped">
                        <thead>
                        <tr><th>Name</th><th>Description</th><th>Category</th><th>Active</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                        @if (count($quizzes) > 0)
                            @foreach($quizzes as $quiz)
                                <tr class="quiz">
                                    <td>
                                        <strong>
                                            <a href="{{ url('/admin/quiz/' . $quiz->id) }}">{{$quiz->name}}</a>
                                        </strong>
                                    </td>
                                    <td>{{$quiz->description}}</td>
                                    <td>{{$quiz->category->name}}</td>
                                    <td><span class="glyphicon {{$quiz->active ? 'glyphicon-ok-circle' : 'glyphicon-remove-circle'}}"></span></td>
                                    <td><a href="{{ url('/admin/quiz/' . $quiz->id) }}" data-quiz-id="{{$quiz->id}}"
                                           title="Edit Quiz" class="edit btn btn-default btn-primary"><span
                                                    class="glyphicon glyphicon-pencil"></span></a>
                                        <button data-quiz-id="{{$quiz->id}}" title="Delete Quiz" class="remove btn
                                                btn-default btn-danger" type="button">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>There aren't any quizzes at the moment. Why not create one now?</p>
                            <p>Just click the 'Create New Quiz' button below...</p>
                        @endif
                        </tbody>
                    </table>
                </div>
                <p>
                    <button id="addquiz" title="Add New Quiz" type="button" class="btn btn-primary pull-right">Create New
                        Quiz <span class="glyphicon glyphicon-plus-sign"></span></button>
                </p>
            </div>
        </div>
    </div>
    @include('admin.partials.addquizmodal')
@endsection
