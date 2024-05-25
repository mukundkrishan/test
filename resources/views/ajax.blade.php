@dd($show_details)
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="post" enctype="multipart/form-data" action="{{ route('edit') }}">
    @csrf
    <div class="modal-body">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="editname" id="exampleFormControlInput1"
                placeholder="Enter naem here">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="editdesc" id="exampleFormControlTextarea2" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Upload Image</label>
            <input type="file" class="form-control" name="editfile" id="exampleFormControlInput3">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="update" class="btn btn-primary" value="Update">
    </div>
</form>
