<!-- Add Quiz Modal -->
<div class="modal fade" id="quiz-add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add A New Quiz:</h4>
            </div>
            <form id="quizadd" method="post" action="{{ url('admin/quiz/create') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p><label for="quizname">Quiz Name:</label>
                        <input name="quizname" id="quizname" type="text" placeholder="Quiz Name" class="form-control" />
                        <span class="helper help-block">Please provide a name for the quiz</span>
                    </p>
                    <p><label for="description">Quiz Description:</label>
                        <input name="description" id="description" type="text" placeholder="Quiz Description" class="form-control" />
                    </p>
                    <p><label for="category">Quiz Category:</label>
                        <select name="category" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <h4>Active?</h4>
                    <p><label for="quizactiveyes"> Yes: </label>
                        <input name="active" id="quizactiveyes" value="1" type="radio" class="radio-inline" />
                        <label for="quizactiveno"> No: </label>
                        <input name="active" id="quizactiveno" value="0" type="radio" class="radio-inline" />
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create Quiz</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->