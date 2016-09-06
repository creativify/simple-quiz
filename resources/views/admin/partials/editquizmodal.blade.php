<!-- Update Quiz Modal -->
<div class="modal fade" id="quiz-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Quiz:</h4>
            </div>
            <form id="quizedit" method="post" action="{{ url('/admin/quiz/' . $quiz->id) }}">
                {{csrf_field()}}
                <div class="modal-body">
                    <p><label for="quizname">Quiz Name:</label>
                        <input name="quizname" id="quizname" type="text" placeholder="Quiz Name" class="form-control"
                               value="{{$quiz->name}}" />
                        <span class="helper help-block">Please provide a name for the quiz</span>
                    </p>
                    <p><label for="description">Quiz Description:</label>
                        <input name="description" id="description" type="text" placeholder="Quiz Description"
                               value="{{ $quiz->description }}" class="form-control" />
                    </p>
                    <p><label for="category">Quiz Category:</label>
                        <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <?php $selected = ($category->name == $quiz->category->name) ? 'selected' : ''; ?>
                            <option value="{{$category->id}}" {{ $selected }}>{{$category->name}}</option>
                        @endforeach
                        </select>
                    </p>
                    <h4>Active?</h4>
                    <p><label for="quizactiveyes" class="inline"> Yes: </label>
                        <input name="active" id="quizactiveyes" value="1" @if ($quiz->isActive()) {{'checked'}} @endif
                        type="radio" class="" /><br />
                        <label for="quizactiveno"> No: </label>
                        <input name="active" id="quizactiveno" value="0" @if (! $quiz->isActive()) {{'checked'}} @endif
                         type="radio" class="radio-inline" />
                        <input type="hidden" name="_method" value="PUT" />
                        <input type="hidden" name="quizid" value="{{$quiz->id}}" />
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->