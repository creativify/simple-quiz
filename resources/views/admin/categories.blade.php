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
                    <div class="panel-heading">Categories</div>
                    <table id="categories" class="table table-striped">
                        <thead>
                        <tr><th>Name</th><th>Description</th><th>Actions</th></tr>
                        </thead>
                        <tbody>
                        @if ($categories->count() > 0)
                            @foreach($categories as $category)
                                <tr class="category">
                                    <td>
                                        <strong class="name">{{$category->name}}</strong>
                                    </td>
                                    <td class="description">{{$category->description}}</td>
                                    <td><a href="{{ url('/admin/category/' . $category->id) }}"
                                           data-category-id="{{$category->id}}"
                                           title="Edit Category" class="edit btn btn-default btn-primary"><span
                                                    class="glyphicon glyphicon-pencil"></span></a>
                                        <button data-category-id="{{$category->id}}" title="Delete Category"
                                                class="remove btn btn-default btn-danger" type="button">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>There aren't any categories at the moment. Why not create one now?</p>
                            <p>Just click the 'Add New Category' button below...</p>
                        @endif
                        </tbody>
                    </table>
                </div>
                <p>
                    <button id="addcategory" title="Add New Category" type="button" class="btn btn-primary
                    pull-right">Add New Category <span class="glyphicon glyphicon-plus-sign"></span></button>
                </p>
            </div>
        </div>
    </div>
    @include('admin.partials.addcategorymodal')
    @include('admin.partials.editcategorymodal')
@endsection
