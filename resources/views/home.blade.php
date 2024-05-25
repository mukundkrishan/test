@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create
        </button>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('fail'))
            <div class="alert alert-fail" role="alert">
                {{ session('fail') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($show_details as $shows)
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $shows->name }}</td>
                            <td>{{ $shows->description }}</td>
                            <td><img src="{{ asset('storage/app/public/' . $shows->image) }}" /></td>
                            <td>

                                <span class="material-symbols-outlined" onclick="edit('{{ $shows->id }}')"
                                    style="cursor: pointer;">
                                    edit
                                </span>
                                <span class="material-symbols-outlined" onclick="remove('{{ $shows->id }}')"
                                    style="cursor: pointer;">
                                    delete
                                </span>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data" action="{{ route('add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                                placeholder="Enter naem here">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="desc" id="exampleFormControlTextarea2" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" name="file" id="exampleFormControlInput3">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div id="view_data_result"></div>
            </div>
        </div>
    </div>

    
    <script>
        function remove(id) {
            var confirmation = confirm('Are you sure you want to delete this item?');
            if (confirmation) {
                $.ajax({
                    type: 'POST',
                    url: '{{ url('/delete') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        // last_updated_by: '{{ 1 }}',
                        id: id
                    },
                    success: function(response) {

                        if (response.success) {
                            // Reload the page or update the view as needed
                            alert(response.message);
                            location.reload();
                        } else {
                            alert('Failed to delete.');
                        }
                    }
                });
            }
        }
    </script>
    
    <script>
        function edit(id){
            $.ajax({
                type: 'POST',
                url: '{{url("edit")}}' +'/'+ id,
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function (response) {
                    $('#view_data_result').html(response);
                    $('#exampleModal2').modal('show');
                }
            });
        }
    </script>
@endsection
