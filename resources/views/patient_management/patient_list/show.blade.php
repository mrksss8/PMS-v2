@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Patient Information</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class=" card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-primary shadow">
                                    <div class="card-header pb-0">
                                        <div class="c-header d-flex flex-wrap p-3 w-100">
                                            <div class="c-img-part flex-grow-1">
                                                <div class="img-part d-flex justify-content-center">
                                                    <img src="{{ asset('img/avatar-mark.jpg') }}" class="rounded-circle"
                                                        alt="Avatar" width="150px">
                                                </div>
                                            </div>
                                            <div class="c-name-part py-3 px-4">
                                                <h5 class="text-primary pt-3">{{ $patient->first_name }}
                                                    {{ $patient->middle_name }} {{ $patient->last_name }}s</h5>
                                                <p class="m-0">{{ $patient->department->department }}</p>
                                            </div>
                                            {{-- <div class="c-work-part flex-grow-1 d-flex justify-content-end">
                                                <div class="d-none d-sm-none d-md-none d-xl-block">
                                                    <button class="btn btn-primary"> General Nurse</button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="card ">
                                            <div class="card-header">
                                                <span class="p-2 pl-4"
                                                    style="background-color: #033571; width: 100%;">
                                                    <h4 style="color:white; font-weight:400;">Personal Information</h4>
                                                </span>
                                            </div>
                                            <div class="card-body pb-0">
                                                <div class="row">
                                                    <div class="form-group col-md-8 col-12">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $patient->first_name }} {{ $patient->middle_name }} {{ $patient->last_name }}"
                                                            disabled>
                                                    </div>
                                                    <div class="form-group col-md-4 col-12">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $patient->age() }}" disabled>
                                                    </div>

                                                    <div class="form-group col-md-6 col-12">
                                                        <label>Birthday</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $patient->birthday }}" disabled>
                                                    </div>
                                                    <div class="form-group col-md-6 col-12">
                                                        <label>Gender</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $patient->gender }}" disabled>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-header">
                                                <span class="p-2 pl-4"
                                                    style="background-color: #033571; width: 100%;">
                                                    <h4 style="color:white; font-weight:400;">Medical History</h4>
                                                </span>
                                            </div>
                                            <div class="card-body">

                                                <div class="row ml-4">

                                                    @forelse ($patient->medical_records as $medical_record)
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" checked
                                                                    disabled>
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

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-primary shadow">
                                            <div class="card-header">
                                                <h4 class="text-primary">Action</h4>
                                            </div>
                                            <div class="card-body text-center">
                                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                                    data-target="#store">
                                                    Add Consultation
                                                </button>
                                                {{-- <a href="#" class="btn btn-outline-primary">Add Consultation</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card card-primary shadow">
                                            <div class="card-header">
                                                <h4 class="text-primary">Medical Records</h4>
                                            </div>

                                            <div class="card-body pt-0">
                                                @forelse ($patient->consultations as $consultation)
                                                    <div class="complaint my-3 border border-primary rounded p-2 shadow">
                                                        <h5 class = "text-center text-dark" style="font-size: 18px;">{{ date('M d, Y', strtotime($consultation->created_at)) }}
                                                        </h5>
                                                        <span class = "text-dark" style="font-weight: 700"> Complaints:</span>
                                                        @foreach (App\Models\Consultation::getComplaints($consultation->id) as $complaint)
                                                            <span class="text-primary" style="font-weight: 700">
                                                                {{ $complaint->complaint }},
                                                            </span>
                                                        @endforeach
                                                        <div class="d-flex justify-content-center mt-3">
                                                            <a href="{{ route('medical_records.show',$consultation->id) }}" class="btn btn-sm btn-primary px-4">View</a>
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
                    </div>
                </div>
            </div>
    </section>


    <!-- Consultaion Modal store-->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Consultation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('consultation.store') }}">
                    <input type="text" value="{{ $patient->id }}" hidden name="patient_id">
                    @csrf
                    <div class="modal-body">

                        <!--  Vital Signs -->
                        <div class="card card-primary">
                            <div class="row">
                                <div class="col-lg-8 col-sm-12">
                                    <div class="card-header px-0">
                                        <span style="color:white; background-color: #033571; width: 100%;"
                                            class="px-3">
                                            Vital Signs
                                        </span>
                                    </div>

                                    <div class="card-body py-0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Blood Pressure:</label>
                                                    <input type="text" class="form-control" name="blood_pressure"
                                                        tabindex="1" autofocus required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Temparature:</label>
                                                    <input type="text" class="form-control" name="temperature"
                                                        tabindex="2" autofocus required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        Respiratory Rate:</label>
                                                    <input type="text" class="form-control" name="respiratory_rate"
                                                        tabindex="3" autofocus required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Capillary Refill:</label>
                                                    <input type="text" class="form-control" name="capillary_refill"
                                                        tabindex="4" autofocus required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Weight</label>
                                                    <input type="text" class="form-control" name="weight" tabindex="5"
                                                        autofocus required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pulse Rate</label>
                                                    <input type="text" class="form-control" name="pulse_rate" tabindex="6"
                                                        autofocus required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="card-header px-0">
                                        <span style="color:white; background-color: #033571; width: 100%;"
                                            class="px-3">
                                            Complaints
                                        </span>
                                    </div>

                                    <div class="card-body p-0">
                                        <div class="row px-3">
                                            <div class="col-6 pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="complaints[]"
                                                        value="Diabetes">
                                                    <label class="form-check-label">
                                                        Tooth Ache
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="complaints[]"
                                                        value="low_grade_fever">
                                                    <label class="form-check-label">
                                                        Low Grade Fever
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-6 pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="complaints[]"
                                                        value="body_pain">
                                                    <label class="form-check-label">
                                                        Body Pain
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="complaints[]"
                                                        value="LBM">
                                                    <label class="form-check-label">
                                                        LBM
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-6 pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="complaints[]"
                                                        value="cut">
                                                    <label class="form-check-label">
                                                        Cut
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="complaints[]"
                                                        value="wounds">
                                                    <label class="form-check-label">
                                                        Wound
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 pt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="severe" name = "severe" value = "severe">
                                                    <label class="form-check-label">
                                                        Severe
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                         <div id="severe-form">
                            <!-- Sign and Symptoms -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <span style="color:white; background-color: #033571; width: 100%;"
                                        class="px-3">
                                        Sign and Symptoms
                                    </span>
                                </div>

                                <div class="card-body py-0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Onset</label>
                                                <input type="text" class="form-control" name="onset"
                                                    tabindex="7" autofocus >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Provoke</label>
                                                <input type="text" class="form-control" name="provoke"
                                                    tabindex="8" autofocus >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Quality</label>
                                                <input type="text" class="form-control" name="quality"
                                                    tabindex="9" autofocus >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Severity</label>
                                                <input type="text" class="form-control" name="severity"
                                                    tabindex="10" autofocus >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Time</label>
                                                <input type="text" class="form-control" name="time"
                                                    tabindex="11" autofocus >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Allergies</label>
                                                <input type="text" class="form-control" name="allergies"
                                                    tabindex="12" autofocus >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Past Medications</label>
                                                <input type="text" class="form-control" name="past_medications"
                                                    tabindex="13" autofocus >
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Last Meal</label>
                                                <input type="text" class="form-control" name="last_meal"
                                                    tabindex="14" autofocus >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Events leading up to emergency</label>
                                                <input type="text" class="form-control" name="leading_up_to_emergency"
                                                    tabindex="15" autofocus >
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Request Form for LabTest -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <span style="color:white; background-color: #033571; width: 100%;"
                                        class="px-3">
                                        Requested LabTest
                                    </span>
                                </div>

                                <div class="card-body py-0">
                                    <div class="row px-3">
                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="CBC">
                                                <label class="form-check-label">
                                                    CBC
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="Xray">
                                                <label class="form-check-label">
                                                    Xray
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="DrugTest">
                                                <label class="form-check-label">
                                                    Drug Test
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="Fecalysist">
                                                <label class="form-check-label">
                                                    Fecalysis
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="Urinalysis">
                                                <label class="form-check-label">
                                                    Urinalysis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="RT-PCRTest">
                                                <label class="form-check-label">
                                                    RT-PCR Test
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="AntigenTest">
                                                <label class="form-check-label">
                                                    Antigen Test
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 pt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="req_LabTest[]"
                                                    value="CT-scan">
                                                <label class="form-check-label">
                                                    CT-scan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Other/s, pls specify </label>
                                                <input type="text" class="form-control" name="req_LabTest[]"
                                                    tabindex="15" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pt-2">
                                            <div class="form-group">
                                                <label>Requested By </label>
                                                <input type="text" class="form-control" name="requested_by"
                                                    tabindex="15" autofocus>
                                            </div>
                                        </div>

                                        <div class="col-6 pt-2">
                                            <div class="form-group">
                                                <label>License Number</label>
                                                <input type="text" class="form-control" name="license_number"
                                                    tabindex="15" autofocus>
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

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $("#severe-form").hide();
        });
    </script>

    <script>
        $(function() {
            $("#severe").click(function() {
                if ($(this).is(":checked")) {
                    $("#severe-form").show();
                } else {
                    $("#severe-form").hide();

                }
            });
        });
    </script>
@endsection
