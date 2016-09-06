@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.partials.sidenav')
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome Quizmaster!</div>
                    <div class="panel-body">Be careful; with great power comes great responsibility.</div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    @foreach($users as $user)
                        <div class="panel-body">
                            <a href="{{ url('/admin/user/' . $user->id . '/details') }}">{{ $user->name
                        }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
