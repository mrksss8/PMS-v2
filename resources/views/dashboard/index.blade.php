@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
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
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon" style="background-color: #033571;">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Patients</h4>
                            </div>
                            <div class="card-body">
                                {{ $patients }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>For Doctors Intervention</h4>
                            </div>
                            <div class="card-body">
                                {{ $for_interventions }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon" style="background-color: #098938;">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="text-center" style="color:#033571; font-weight:700; font-size:16px;">
                                        Medicine Status
                                    </p>

                                    <table class = "table" style=" color:#34395e;  font-size:12px; font-weight:600;">
                                        <thead style="background-color: white;">
                                            <tr>

                                                <th style="color:#033571; ">Type of Medicine</th>
                                                <th style="color:#033571; ">Brand Name</th>
                                                <th style="color:#033571; ">Dosage</th>
                                                <th style="color:#033571; ">Remarks</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($medicines as $medicine)
                                                @if ($medicine->beginning_stock <= $medicine->maintaining_level)
                                                    <tr>
                                                        <td>{{ $medicine->category->category_name }}</td>
                                                        <td>{{ $medicine->brand_name }}</td>
                                                        <td>{{ $medicine->dosage }}</td>
                                                        </td>
                                                        @if ($medicine->beginning_stock <= 0)
                                                            <td class="bg-danger m-5"> Inactive (OS)</td>
                                                        @else
                                                            <td class = "bg-warning">  Active (Critical)</td>
                                                        @endif

                                                    </tr>
                                                @endif
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="text-center" style="color:#033571; font-weight:700; font-size:16px; ">
                                        Supply Status
                                    </p>

                                    <table class="table" style= "color:#34395e;  font-size:12px; font-weight:600;">
                                        <thead style="background-color: white;">
                                        <tr>
                                            <th style="color:#033571; ">Supply</th>

                                            <th style="color:#033571; ">Description</th>
                                            <th style="color:#033571; ">Stock</th>
                                            
                                            <th style="color:#033571; ">Remarks</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($supplies as $supply)

                                        @if ( $supply->beginning_stock <=  $supply->maintaining_level)
                                            <tr>
                                                <td>{{ $supply->supply }}</td>
                                                <td>{{ $supply->description }}</td>
                                                <td>{{ $supply->beginning_stock }}</td>
                                                @if ($supply->beginning_stock <= 0)
                                                <td class="bg-danger"> Inactive (OS)</td>
                                                @else
                                                <td class="bg-warning"> Active (Critical)</td>
                                                @endif
                                            </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">

                        <div class="card-body">
                            <p class = "text-center" style = "color:#033571; font-weight:600; font-size:16px;">Past Consultation Patients</p>

                            @foreach ($past_consultations as $past_consultation)
                            <p class = "text-center" style = "color:#34395e; font-weight:600;"">{{ $past_consultation->patient->full_name }}</p>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </section>
@endsection

@section('scripts')
@endsection
