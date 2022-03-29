@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="card custom-border">
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
                                        {{-- @foreach ($roles as $role)
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
                                                        <span class="btn btn-icon icon-left mr-3 btn-outline-primary"> Cannot Take Action</span>
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
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  
@endsection

@section('scripts')

@endsection
