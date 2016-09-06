<div class="col-md-2">
    <div class="panel panel-default">
        <div class="panel-heading">Administrator Links</div>

        <div class="list-group">
            <a href="{{ url('/admin/quizzes') }}" class="list-group-item @if (Request::is('admin/quizzes') ) active
@endif">
                <span class="badge">{{ count($quizzes) }}</span>
                Quizzes
            </a>
            <a href="{{ url('/admin/categories') }}" class="list-group-item @if (Request::is('admin/categories') )
                    active
@endif">
                <span class="badge">{{ count($categories) }}</span>
                Categories
            </a>
            <a href="{{ url('/admin/users') }}" class="list-group-item @if (Request::is('admin/users') ) active
@endif">
                <span class="badge">{{ count($users) }}</span>
                Users
            </a>
        </div>
    </div>
</div>