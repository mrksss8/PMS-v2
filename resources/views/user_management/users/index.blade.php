@extends('layouts.app')


@section('content')
    <section class="section">
        <div class="section-header">
            <h5 class="page__heading">User Management / Users</h5>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#store">
                                    Add User
                                </button>
                            </div>

                            <div class="d-flex justify-content-center">
                                <table class="table mt-4"
                                    style="width: 95%; color:black; border: 1px solid #033571; font-weight:700;">
                                    <thead style="background-color: #033571;">
                                        <tr>
                                            <th style="color:white;">User</th>
                                            <th style="color:white;">Email</th>
                                            <th style="color:white;">Role</th>
                                            <th style="color:white;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr style="border: 1px solid #033571;">
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @forelse ($user->roles->take(1) as $role)
                                                        {{ $role->name }}
                                                    @empty
                                                        Not assigned
                                                    @endforelse
                                                </td>
                                                @if ($user->email == 'admin@aventus.com')
                                                <td style="white-space:nowrap; width: 20px;">
                                                    <span class="btn btn-icon icon-left mr-3 btn-outline-primary">Cannot
                                                        Take Action</span>
                                                </td>
                                                @else
                                                    <td style="white-space:nowrap; width: 20px;">
                                                        <!-- I add 20px and it fix the extra space, don't know why -->
                                                        {{-- <a href="#" class="btn btn-icon icon-left mr-3 btn-outline-primary">
                                                        <i class="far fa-edit"></i>
                                                        Edit</a> --}}

                                                        <button type="button"
                                                            class="btn btn-icon icon-left mr-3 btn-outline-primary user-edit"
                                                            data-toggle="modal" data-target=".edit"
                                                            data-uid="{{ $user->id }}" data-name="{{ $user->name }}"
                                                            data-email="{{ $user->email }}"
                                                            @forelse ($user->roles->take(1) as $role) data-role=" {{ $role->id }}"> 
                                                        @empty
                                                        Not assigned @endforelse
                                                            <i class="far fa-edit"></i>
                                                            Edit
                                                        </button>


                                                        <button type="button"
                                                            class="btn btn-icon icon-left mr-3 btn-outline-danger user-delete"
                                                            data-toggle="modal" data-target=".delete"
                                                            data-uid="{{ $user->id }}">
                                                            <i class="fas fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                @endif
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

    <!-- User Modal store-->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="first_name">Full Name:</label><span class="text-danger">*</span>
                                    <input id="firstName" type="text"
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        tabindex="1" placeholder="Enter Full Name" value="{{ old('name') }}" autofocus
                                        required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email:</label><span class="text-danger">*</span>
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        placeholder="Enter Email address" name="email" tabindex="1"
                                        value="{{ old('email') }}" required autofocus>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Role:</label><span class="text-danger">*</span>

                                    <select id="select1"
                                        class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
                                        placeholder="Enter Role" name="role" required autofocus>

                                        <?php $roles = DB::table('roles')->get(); ?>
                                        <option selected disabled>Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->id }}-{{ $role->name }}
                                            </option>
                                        @endforeach

                                    </select>


                                    <div class="invalid-feedback">
                                        {{ $errors->first('role') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="control-label">Password
                                        :</label><span class="text-danger">*</span>
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        placeholder="Set account password" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password_confirmation" class="control-label">Confirm Password:</label><span
                                        class="text-danger">*</span>
                                    <input id="password_confirmation" type="password" placeholder="Confirm account password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation" tabindex="2">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
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
                <form id="update" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="first_name">Full Name:</label><span class="text-danger">*</span>
                                    <input id="firstName" type="text" class="form-control" name="name" tabindex="1"
                                        placeholder="Enter Full Name" autofocus required>
                                    {{-- <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email:</label><span class="text-danger">*</span>
                                    <input id="email" type="email" class="form-control" placeholder="Enter Email address"
                                        name="email" tabindex="1" required autofocus>
                                    {{-- <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div> --}}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Role:</label><span class="text-danger">*</span>

                                    <div class="select">

                                        <select id="select1" class="form-control" placeholder="Enter Role" name="role"
                                            required autofocus>

                                            <?php $roles = DB::table('roles')->get(); ?>
                                            <option selected disabled>Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">
                                                    {{ $role->id }}-{{ $role->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    {{-- <div class="invalid-feedback">
                                        {{ $errors->first('role') }}
                                    </div> --}}
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

    <!-- User Modal delete-->
    <div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black;">
                    Are you sure want to delete User?
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
            $('.user-delete').each(function() {
                $(this).click(function(event) {
                    $('#delete').attr("action", "/users/destroy/" + $(this).data('uid') + "");
                });
            });
        });
    </script>

    <!-- edit script -->
    <script>
        $(document).ready(function() {
            // $('option').val($(this).data('role')).attr('selected', 'selected');

            $('.user-edit').each(function() {
                $(this).click(function(event) {
                    $('#update').attr("action", "/users/update/" + $(this).data('uid') + "");
                    $('input[name="name"]').val($(this).data('name'));
                    $('input[name="email"]').val($(this).data('email'));
                    $('select option').filter(":selected").val();

                });
            });
        });
    </script>

    <!-- show modal when has error script -->
    @if (count($errors) > 0)
        <script>
            $(document).ready(function() {
                $('#store').modal('show');
            });
        </script>
    @endif
@endsection
