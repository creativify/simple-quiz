<!-- Add Quiz Modal -->
<div class="modal fade" id="category-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Category:</h4>
            </div>
            <form id="categoryedit" method="post" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p><label for="categoryname">Category Name:</label>
                        <input name="categoryname" id="editcategoryname" type="text" placeholder="Category Name"
                               class="form-control" />
                        <span class="helper help-block">Please provide a name for the category</span>
                    </p>
                    <p><label for="description">Category Description:</label>
                        <input name="description" id="editdescription" type="text" placeholder="Category Description"
                               class="form-control" />
                    </p>
                    <input type="hidden" name="_method" value="PUT" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->