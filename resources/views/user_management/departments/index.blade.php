@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h5 class="page__heading">User Management / Department</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-primary">Department</h5>
                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#store">
                                    Add Department
                                </button>
                            </div>


                            <div class="d-flex justify-content-center">
                                <table class="table mt-4"
                                    style="width: 95%; color:black; border: 1px solid #033571; font-weight:700;">
                                    <thead style="background-color: #033571;">
                                        <tr>
                                            <th style="color:white; white-space:nowrap;">Department Name</th>
                                            <th style="color:white; ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                            <tr>
                                                <td>{{ $department->department }}</td>
                                                <td style="white-space:nowrap; width:1px;">

                                                    {{-- <a href="#" class="btn btn-icon icon-left mr-3 btn-outline-primary">
                                                        <i class="far fa-edit"></i>
                                                        Edit</a> --}}

                                                    <button type="button"
                                                        class="btn btn-icon icon-left mr-3 btn-outline-primary department-edit"
                                                        data-toggle="modal" data-target=".edit"
                                                        data-uid="{{ $department->id }}"
                                                        data-dept="{{ $department->department }}">
                                                        <i class="far fa-edit"></i>
                                                        Edit
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-icon icon-left mr-3 btn-outline-danger department-delete"
                                                        data-toggle="modal" data-target=".delete"
                                                        data-uid="{{ $department->id }}">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Department Modal store-->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('departments.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="color: black">Department</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="department" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Department Modal edit-->
    <div class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="color: black">Department</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="department" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Department Modal delete-->
    <div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Delete Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black;">
                    Are you sure want to delete Department?
                </div>
                <form method="POST" id="delete">
                    @csrf
                    @method('delete')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <!-- delete script -->
    <script>
        $(document).ready(function() {
            $('.department-delete').each(function() {
                $(this).click(function(event) {
                    $('#delete').attr("action", "/departments/destroy/" + $(this).data('uid') + "");

                });
            });
        });
    </script>

    <!-- edit script -->
    <script>
        $(document).ready(function() {
            // $('option').val($(this).data('role')).attr('selected', 'selected');

            $('.department-edit').each(function() {
                $(this).click(function(event) {
                    $('#update').attr("action", "/departments/update/" + $(this).data('uid') + "");
                    $('input[name="department"]').val($(this).data('dept'));

                });
            });
        });
    </script>

@endsection
