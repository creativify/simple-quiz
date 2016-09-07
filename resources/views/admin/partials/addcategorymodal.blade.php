<!-- Add Quiz Modal -->
<div class="modal fade" id="category-add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add A New Category:</h4>
            </div>
            <form id="categoryadd" method="post" action="{{ url('admin/category/') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p><label for="categoryname">Category Name:</label>
                        <input name="categoryname" id="categoryname" type="text" placeholder="Category Name"
                               class="form-control" />
                        <span class="helper help-block">Please provide a name for the category</span>
                    </p>
                    <p><label for="description">Category Description:</label>
                        <input name="description" id="description" type="text" placeholder="Category Description" class="form-control" />
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Create Category</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->