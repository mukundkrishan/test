<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form method="post" enctype="multipart/form-data" action="{{ route('editSave') }}">
    @csrf
    <input type="hidden" name="id" value="{{$show_details[0]->id}}">
    <div class="modal-body">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="editname" id="exampleFormControlInput1"
                placeholder="Enter naem here" value="{{$show_details[0]->name}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="editdesc" id="exampleFormControlTextarea2" rows="3">{{$show_details[0]->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Upload Image</label>
            <input type="file" class="form-control" value="{{$show_details[0]->image}}" name="editfile" id="exampleFormControlInput3">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="update" class="btn btn-primary" value="Update">
    </div>
</form>
