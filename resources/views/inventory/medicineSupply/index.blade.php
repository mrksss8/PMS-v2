@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inventory</h3>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-lg-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-primary">Medicines</h5>
                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-5" data-toggle="modal"
                                    data-target="#add_medicine">
                                    Add Medicine
                                </button>
                            </div>


                            <div class="d-flex justify-content-center">
                                <table class="table mt-4"
                                    style="width: 95%; color:black; border: 1px solid #033571; font-size:12px;">
                                    <thead style="background-color: #033571;">
                                        <tr>
                                            {{-- <th class  = "p-1" style="color:white; ">Medicine Classification</th> --}}
                                            <th class  = "p-1" style="color:white; ">Type of Medicine</th>
                                            <th style="color:white; ">Brand Name</th>
                                            <th style="color:white; ">Dosage</th>
                                            <th style="color:white; ">Stock</th>
                                            {{-- <th style="color:white; ">Maintaining Level</th>
                                            <th style="color:white; ">Critical Level</th>
                                            <th style="color:white; ">Expiration Date</th>
                                            <th style="color:white; ">Source</th> --}}
                                            <th style="color:white; ">Remarks</th>
                                            <th style="color:white; ">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($medicines as $medicine)
                                            <tr style="border: 1px solid #033571;">
                                                {{-- <td >{{  $medicine->medicine_classification }}</td> --}}
                                            <td>{{  $medicine->category->category_name }}</td>
                                                <td>{{ $medicine->brand_name }}</td>
                                                <td>{{ $medicine->dosage }}</td>
                                                <td>{{ $medicine->beginning_stock }}</td>
                                                {{-- <td>{{  $medicine->maintaining_level }}</td>
                                             <td>{{  $medicine->maintaining_level }}</td>
                                            <td>{{  $medicine->expiration_date }}</td>
                                            <td>{{  $medicine->source }}</td> --}}

                                                @if ($medicine->beginning_stock <= 0)
                                                <td class = "bg-danger"> Inactive (OS)</td>
                                                @else
                                                <td>Active</td>
                                                
                                                @endif
                                                <td style="white-space:nowrap;">
                                                    <button type=" button"
                                                        class="btn btn-icon btn-sm icon-left mr-3 btn-outline-primary med-add-stock"
                                                        data-toggle="modal" 
                                                        data-target=".med_add_stock"
                                                        data-target=".med_add_stock"

                                                        data-uid="{{  $medicine->id }}"
                                                        data-type_of_med="{{  $medicine->category->category_name }}"
                                                        data-med_class="{{  $medicine->medicine_classification }}"
                                                        data-brand_name="{{ $medicine->brand_name }}"
                                                        data-dosage="{{  $medicine->dosage }}"
                                                        >



                                                        <i class="far fa-edit"></i>
                                                        Add Stock
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-icon btn-sm icon-left btn-outline-success medicine-view"
                                                        data-toggle="modal" data-target="#view_medicine"
                                                        data-med_class="{{ $medicine->medicine_classification }}"
                                                        data-brand_name="{{ $medicine->brand_name }}"
                                                        data-dosage="{{ $medicine->dosage }}"
                                                        data-source="{{ $medicine->source }}"
                                                        data-medicine_type="{{ $medicine->category->category_name }}"
                                                        data-beg_stock="{{ $medicine->beginning_stock }}"
                                                        data-m_level="{{ $medicine->maintaining_level }}"
                                                        data-c_level="{{ $medicine->critical_level }}"
                                                        data-c_level="{{ $medicine->critical_level }}"
                                                        data-expi_date="{{ $medicine->expiration_date }}"
                                                        data-remarks="{{ $medicine->remarks }}">



                                                        <i class="far fa-view"></i> View Details
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

            <div class="row">
                <div class="col-lg-12 ">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="text-primary">Supplies</h5>
                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-5" data-toggle="modal"
                                    data-target="#add_supply">
                                    Add Supply
                                </button>
                            </div>


                            <div class="d-flex justify-content-center">
                                <table class="table mt-4"
                                    style="width: 95%; color:black; border: 1px solid #033571; font-weight 600;">
                                    <thead style="background-color: #033571;">
                                        <tr>
                                            <th style="color:white; white-space:nowrap;">Supply</th>

                                            <th style="color:white; ">Description</th>
                                            <th style="color:white; ">Stock</th>
                                            {{-- <th style="color:white; ">Maintaining Level</th> --}}
                                            <th style="color:white; ">Expiration Date</th>
                                            <th style="color:white; ">Remarks</th>
                                            <th style="color:white; ">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($supplies as $supply)
                                            <tr style="border: 1px solid #033571;">
                                                <td>{{ $supply->supply }}</td>
                                                <td>{{ $supply->description }}</td>
                                                <td>{{ $supply->beginning_stock }}</td>
                                                {{-- <td>{{ $supply->maintaining_level }}</td> --}}
                                                <td>{{ $supply->expiration_date }}</td>
                                                
                                                @if ($supply->beginning_stock <= 0)
                                                <td class = "bg-danger"> Inactive (OS)</td>
                                                @else
                                                <td>Active</td>
                                                {{-- <td>{{ $supply->remarks }}</td> --}}
                                                
                                                @endif
                                                <td style="white-space:nowrap;">

                                                    <button type="button"
                                                        class="btn btn-icon btn-sm icon-left mr-3 btn-outline-primary supply-add-stock"
                                                        data-toggle="modal" data-target=".supply_add_stock"
                                                        data-uid = "{{ $supply->id }}"
                                                        data-supply="{{  $supply->supply }}"
                                                        data-description="{{ $supply->description }}"
                                                        
                                                        > <i class="far fa-edit"></i> Add Stock
                                                    </button>

                                                    <button type="button"
                                                        class="btn btn-icon btn-sm icon-left btn-outline-success supply-view"
                                                        data-toggle="modal" data-target="#view_supply"
                                                        data-supply="{{ $supply->supply }}"
                                                        data-description="{{ $supply->description }}"
                                                        data-beg_stock="{{ $supply->beginning_stock }}"
                                                        data-m_level="{{ $supply->maintaining_level }}"
                                                        data-expi_date="{{ $supply->expiration_date }}"
                                                        data-remarks="{{  $supply->remarks }}">



                                                        <i class="far fa-view"></i> View Details
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

            <div class="row">
                <span>(Partially place here)</span>
                <div class="col-lg-12 ">
                    <div class="card custom-border">
                        <div class="card-header">
                            <h5 class="text-primary">Settings</h5>
                        </div>
                        <div class="card-body">

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#add_category">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Category Modal-->
    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('medicine_category.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="color: black">Category Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="category" class="form-control">
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

    <!-- Add Medicine Modal-->
    <div class="modal fade" id="add_medicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('medicine.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Medicine Classification</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="med_class" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Brand Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="brand_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Dosage</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="dosage" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Source</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="source" class="form-control" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Type of Medicine</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <select class=" form-control" name="category" id="select2Multiple" required>

                                                @foreach ($medicince_categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Beginning Stock</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="beginning_stock" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Maintaining Level</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="maintaining_level" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Critical Level</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="critical_level" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Expiration Date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="date" name="expiration_date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Remarks</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="remarks" class="form-control" required>
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


    <!-- Add Supply Modal-->
    <div class="modal fade" id="add_supply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Supply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('supply.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Supply Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="sup_name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="description" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Beginning Stock</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="beginning_stock" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Maintaining Level</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="maintaining_level" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Expiration Date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="date" name="expiration_date" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Remarks</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="remarks" class="form-control" required>
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


    <!-- View Medicine Modal-->
    <div class="modal fade med_view" id="view_medicine" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">View Medicine Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Medicine Classification</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="med_class"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Brand Name</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="brand_name"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Dosage</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="dosage"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Source</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="source"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Type of Medicine</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text"
                                                name="type_of_medicine" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Beginning Stock</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="number"
                                                name="beginning_stock" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Maintaining Level</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="number"
                                                name="maintaining_level" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Critical Level</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="number"
                                                name="critical_level" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Expiration Date</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="date"
                                                name="expiration_date" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Remarks</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="remarks"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- View Supply Modal-->
    <div class="modal fade supply_view" id="view_supply" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">View Supply Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('supply.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Supply Name</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="sup_name" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Description</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="description" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Beginning Stock</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="number" name="beginning_stock" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Maintaining Level</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="number" name="maintaining_level" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Expiration Date</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="date" name="expiration_date" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Remarks</label>
                                        <div class="input-group">

                                            <input style="color:#033571; font-weight: 600;" type="text" name="remarks" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- medicine add stock Modal-->
    <div class="modal fade med_add_stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type of Medicine</label>
                                    <input style="color:#033571; font-weight: 600;" class="form-control" name="med_class" tabindex="1" disabled>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Medicine Classification</label>
                                    <input style="color:#033571; font-weight: 600;" class="form-control" name="type_of_medicine" tabindex="1" disabled>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input style="color:#033571; font-weight: 600;" class="form-control"
                                        name="brand_name" tabindex="1" disabled>
                                  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dosage</label>

                                    <input style="color:#033571; font-weight: 600;" class="form-control"
                                    name="dosage" tabindex="1" disabled>
                                 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Add Stock</label>

                                    <input style="color:#033571; font-weight: 600; border-color:#033571;" type = "number" placeholder = "Enter Quatity " class="form-control"
                                    name="stock" tabindex="1">
                                 
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

    <!-- medicine add stock Modal-->
    <div class="modal fade supply_add_stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update-supply" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Supply</label>
                                    <input style="color:#033571; font-weight: 600;" class="form-control" name="supply" tabindex="1" disabled>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input style="color:#033571; font-weight: 600;" class="form-control" name="description" tabindex="1" disabled>
                                    
                                </div>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Add Stock</label>

                                    <input style="color:#033571; font-weight: 600; border-color:#033571;" type = "number" placeholder = "Enter Quatity " class="form-control"
                                    name="stock" tabindex="1">
                                 
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
@endsection

@section('scripts')
    <!-- view medicince script -->
    <script>
        $(document).ready(function() {
            // $('option').val($(this).data('role')).attr('selected', 'selected');

            $('.medicine-view').each(function() {
                $(this).click(function(event) {
                    $('input[name="med_class"]').val($(this).data('med_class'));
                    $('input[name="brand_name"]').val($(this).data('brand_name'));
                    $('input[name="dosage"]').val($(this).data('dosage'));
                    $('input[name="source"]').val($(this).data('source'));
                    $('input[name="type_of_medicine"]').val($(this).data('medicine_type'));
                    $('input[name="beginning_stock"]').val($(this).data('beg_stock'));
                    $('input[name="maintaining_level"]').val($(this).data('m_level'));
                    $('input[name="critical_level"]').val($(this).data('c_level'));
                    $('input[name="expiration_date"]').val($(this).data('expi_date'));
                    $('input[name="remarks"]').val($(this).data('remarks'));


                });
            });
        });
    </script>

    <!-- view medicinescript -->
    <script>
        $(document).ready(function() {
            // $('option').val($(this).data('role')).attr('selected', 'selected');

            $('.supply-view').each(function() {
                $(this).click(function(event) {
                    $('input[name="sup_name"]').val($(this).data('supply'));
                    $('input[name="description"]').val($(this).data('description'));
                    $('input[name="beginning_stock"]').val($(this).data('beg_stock'));
                    $('input[name="maintaining_level"]').val($(this).data('m_level'));
                    $('input[name="expiration_date"]').val($(this).data('expi_date'));
                    $('input[name="remarks"]').val($(this).data('remarks'));


                });
            });
        });
    </script>

    <!-- add medicine script -->
    <script>
        $(document).ready(function() {
            // $('option').val($(this).data('role')).attr('selected', 'selected');

            $('.med-add-stock').each(function() {
                $(this).click(function(event) {
                    $('#update').attr("action", "/medicine/update/" + $(this).data('uid') + "");
                    $('input[name="med_class"]').val($(this).data('type_of_med'));
                    $('input[name="type_of_medicine"]').val($(this).data('med_class'));
                    $('input[name="brand_name"]').val($(this).data('brand_name'));
                    $('input[name="dosage"]').val($(this).data('dosage'));

                });
            });
        });
    </script>

     <!-- add supply script -->
     <script>
        $(document).ready(function() {
            // $('option').val($(this).data('role')).attr('selected', 'selected');

            $('.supply-add-stock').each(function() {
                $(this).click(function(event) {

                    $('#update-supply').attr("action", "/supply/update/" + $(this).data('uid') + "");
                    $('input[name="supply"]').val($(this).data('supply'));
                    $('input[name="description"]').val($(this).data('description'));
                });
            });
        });
    </script>
@endsection
