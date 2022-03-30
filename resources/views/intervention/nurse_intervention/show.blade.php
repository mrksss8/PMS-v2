@extends('layouts.app')

@section('css')
    <style>
        .box {
            display: none;
        }

    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Intervention</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card card-primary shadow">
                                        <div class="card-header pb-0 " style="display: block;">
                                            <div class="img-part text-center">
                                                <img src="{{ asset('img/avatar-mark.jpg') }}" class="rounded-circle"
                                                    alt="Avatar" width="150px">
                                            </div>
                                            <div class="text-primary" style="font-weight:600; font-size:15px;">
                                                <h5 class="text-primary pt-3">
                                                    {{ $consultation->patient->full_name }}</h5>
                                                <p class="mb-0">Age: {{ $consultation->patient->age() }}</p>
                                                <p class="mb-0">Birthday: {{ $consultation->patient->birthday }}
                                                </p>
                                                <p class="mb-0">Gender: {{ $consultation->patient->gender }}</p>
                                                <p class="mb-0">Dept.:
                                                    {{ $consultation->patient->department->department }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="card ">

                                                <div class="card-header px-0">
                                                    <span class="p-2 pl-4"
                                                        style="background-color: #033571; width: 100%;">
                                                        <h4 style="color:white; font-weight:400;">Medical History</h4>
                                                    </span>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row">
                                                        @forelse ($consultation->patient->medical_records as $medical_record)
                                                            <div class="col-md-6 px-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="flexCheckDiabetes" checked disabled>
                                                                    <label>
                                                                        {{ $medical_record->medical_record }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            No Record
                                                        @endforelse


                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card card-primary shadow">
                                        <div class="d-flex justify-content-end m-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#store">
                                                Add Intervention
                                            </button>
                                        </div>

                                        <!-- vital signs -->
                                        <div class="card-header px-0">
                                            <div class="col-12">
                                                <div class="card-header px-0">
                                                    <span style="color:white; background-color: #033571; width: 100%;"
                                                        class="px-3">
                                                        Vital Signs
                                                    </span>
                                                </div>
                                                <div class="card-body py-0">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Blood Pressure:</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->blood_pressure }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Temparature:</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->temperature }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>
                                                                    Respiratory Rate:</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->respiratory_rate }}"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Capillary Refill:</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->capillary_refill }}"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Weight</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->weight }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Pulse Rate</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->pulse_rate }}" disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- complaints -->
                                        <div class="card-header px-0">
                                            <div class="col-12">
                                                <div class="card-header px-0">
                                                    <span style="color:white; background-color: #033571; width: 100%;"
                                                        class="px-3">
                                                        Complaints
                                                    </span>
                                                </div>
                                                <div class="card-body py-0">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Complaints:</label>

                                                                <div style="display: flex; gap:1rem;">
                                                                    @foreach ($consultation->complaints as $complaint)
                                                                        <span
                                                                            class="btn btn-outline-primary">{{ $complaint->complaint }}</span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intervention Modal store-->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Intervention</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('nurse_intervention.store') }}" method="POST">
                    @csrf
                    <input type="number" name = "consultation_id" value="{{$consultation->id }}" hidden>
                    <div class="modal-body">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Medecine</label>
                                        <div class="input-group">
                                            {{-- <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div> --}}
                                            <select style="width:367px;" class="  form-control"
                                                name="medicine">

                                                @foreach ($medicines as $medicine)
                                                    <option value={{ $medicine->id }}>
                                                        {{ $medicine->brand_name}} {{ $medicine->dosage}}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" name="medicine" class="form-control"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Quantity</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="med_qty" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Supply</label>
                                        <div class="input-group">
                                            {{-- <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div> --}}
                                            <select style="width:367px;" class="  form-control"
                                            name="supply">

                                            @foreach ($supplies as $supply)
                                                <option value={{ $supply->id }}>
                                                    {{ $supply->supply}}</option>
                                            @endforeach
                                        </select>
                                            {{-- <input type="text" name="supply" class="form-control" required> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="color: black">Quantity</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="supply_qty" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p style="color:white; background-color: #033571; width:100%;"
                                        class="px-3 text-center">
                                        Action
                                    </p>

                                    <div class="form-group">
                                        <label style="color: black">Action</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="action" value="Clinic-Rest"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">Clinic Rest</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="action" value="Sent-to-Home"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">Sent to Home</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio3" name="action" value="Sent-to-Emergency"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio3">Sent to Emergency</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio4" name="action" value="Other-Intervention"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio4">Other Intervention</label>
                                        </div>
                                    </div>

                                    <div class="Clinic-Rest box">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <span style="color:white; background-color: #033571; width: 100%;"
                                                    class="px-3">
                                                    Clinic Rest
                                                </span>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="color: black">Number of Minutes</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="clinic_rest_num_of_mins"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="color: black">Approve By</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="clinic_rest_approve_by" class="form-control"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Sent-to-Home box">

                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <span style="color:white; background-color: #033571; width: 100%;"
                                                    class="px-3">
                                                    Sent to Home
                                                </span>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="color: black">Approve By</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="sent_to_home_approve_by" class="form-control"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                  
                                    <div class="Sent-to-Emergency box">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <span style="color:white; background-color: #033571; width: 100%;"
                                                    class="px-3">
                                                    Sent to Emergency Room
                                                </span>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="color: black">Approved By</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="sent_to_emer_approve_by" class="form-control"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 w-100">
                                                        <span style="color:white; background-color: #033571; width:100%"
                                                            class="px-3">
                                                            if Refused
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="color: black">Emergency Room Refusal</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="sent_to_emer_refusal" class="form-control"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="color: black">Witnesses If Refused</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="sent_to_emer_refuse_witness" class="form-control"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label style="color: black">Signed Waiver (File Upload)</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="sent_to_emer_refuse_waiver" class="form-control"
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="Other-Intervention box">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <span style="color:white; background-color: #033571; width: 100%;"
                                                    class="px-3">
                                                    Other Intervention
                                                </span>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label style="color: black">Information (Optional)</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="other_intervention_info" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script>
@endsection
