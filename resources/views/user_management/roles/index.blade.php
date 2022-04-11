@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h5 class="page__heading">User Management / Roles & Permission</h5>
        </div>
        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('updated'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('updated') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('deleted') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-primary">Roles</h5>

                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#store">
                                    Add Role
                                </button>
                            </div>


                            <div class="d-flex justify-content-center">
                                <table class="table mt-4"
                                    style="width: 95%; color:black; border: 1px solid #033571; font-weight:700;">
                                    <thead style="background-color: #033571;">
                                        <tr>
                                            <th style="color:white; white-space:nowrap;">Role Name</th>
                                            <th style="color:white; ">Permissions</th>
                                            <th style="color:white; ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr style="border: 1px solid #033571;">
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <?php $permission = $role->getPermissionNames(); ?>
                                                    @foreach ($permission as $p)
                                                        {{ $p }},
                                                    @endforeach
                                                </td>

                                                <td style="white-space:nowrap">
                                                    @if ($role->name == 'Admin')
                                                        <span class="btn btn-icon icon-left mr-3 btn-outline-primary">
                                                            Cannot Take Action</span>
                                                    @else
                                                        <a href="#" class="btn btn-icon icon-left mr-3 btn-outline-primary">
                                                            <i class="far fa-edit"></i>
                                                            Edit</a>

                                                        <button type="button"
                                                            class="btn btn-icon icon-left mr-3 btn-outline-danger role-delete"
                                                            data-toggle="modal" data-target=".delete"
                                                            data-uid="{{ $role->id }}">
                                                            <i class="fas fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    @endif

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

    <!-- Roles Modal store-->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="color: black">Role</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input id="role" type="text" name="role"
                                                class="form-control" value = "{{ old('role') }}">
                                        </div>
                                        @error('role')
                                            <p style="color:red"><small>{{ $message }}</small></p>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="color: black">Permission</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <select style="width:367px;" class=" select2-multiple form-control  {{ $errors->has('permission') ? ' is-invalid' : '' }}
                                                "
                                                name="permission[]" multiple="multiple" id="select2Multiple">

                                                @foreach ($permissions as $permission)
                                                    <option value={{ $permission->id }}>{{ $permission->id }}.
                                                        {{ $permission->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('permission')
                                        <p style="color:red"><small>{{ $message }}</small></p>
                                    @enderror
                                   
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

    <!-- Roles Modal delete-->
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
                    Are you sure want to delete Role?
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
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select Permission",
                allowClear: true
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.role-delete').each(function() {
                $(this).click(function(event) {
                    $('#delete').attr("action", "/roles/destroy/" + $(this).data('uid') + "");
                });
            });
        });
    </script>

    <script type="text/javascript">
        @if ($errors->any())
            $('#store').modal('show');
        @endif
    </script>
@endsection
