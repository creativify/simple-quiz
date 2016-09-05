<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
    <div class="sidebar-nav">
        <h4>Recent Quizzes</h4>
        <div class="list-group">
            @foreach ($quizzes as $quiz)
                <a href="/quizzes/{{$quiz->id}}" class="list-group-item">
                    <h4 class="list-group-item-heading">{{$quiz->name}}</h4>
                    <p class="list-group-item-text">{{$quiz->description}}</p>
                </a>
            @endforeach
        </div>
    </div><!--/.sidebar-nav -->
</div>