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
            <h3 class="page__heading">Medical Record</h3>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">{{ $consultation->created_at->format('F d, Y') }}</div>
                                    This is a past medical conslutation.
                                </div>
                            </div>
                        </div>
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
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-1">
                                                                <label>Complaints:</label>

                                                                <div style="display: flex; gap:1rem;">
                                                                    @foreach ($consultation->complaints as $complaint)
                                                                    @if ($complaint->complaint != null)
                                                                    <span class="btn btn-outline-primary">{{ $complaint->complaint }}</span>
                                                                        
                                                                    @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- signs and symptoms -->
                                        <div class="card-header px-0">
                                            <div class="col-12">
                                                <div class="card-header px-0">
                                                    <span style="color:white; background-color: #033571; width: 100%;"
                                                        class="px-3">
                                                        Signs and Symptoms
                                                    </span>
                                                </div>
                                                <div class="card-body py-0">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Onset:</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->onset }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>location</label>
                                                                <!-- provoke -->
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->provoke }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>duration</label>
                                                                <!-- quality -->
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->quality }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label for="">Character Aggravating Factors</label>
                                                                {{-- <label>Severity</label> --}}
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->severity }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label for="">Radiation</label>
                                                                {{-- <label>Last Meal</label> --}}
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->last_meal }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Time Severity</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->time }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Allergies</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->allergies }}" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Past Medication</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->past_medication }}"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                       

                                                        <div class="col-md-4">
                                                            <div class="form-group mb-1">
                                                                <label>Events leading up to emergency</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $consultation->leading_up_to_emergency }}"
                                                                    disabled>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                 <!-- labtest --> 
                                 <div class="col-md-12">
                                    <div class="card shadow px-0">
                                        <div class="col-12">
                                            <div class="card-header px-0">
                                                <span style="color:white; background-color: #033571; width: 100%;"
                                                    class="px-3">
                                                    Lab Test
                                                </span>
                                            </div>
                                            <div class="card-body py-0">
                                                <div class="row">
                                                    @foreach ($consultation->lab_tests as $lab_test)
                                                        
                                                    <div class="col-md-4 mb-3">
                                                        <div class="form-group mb-1 mt-3">
                                                            <span style=" font-weight: 700;">{{ $lab_test->labtest }}</span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-8">
                                                        <div class="form-group mb-1 mt-3">
                                                            @if ($lab_test->filename != null)
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <span style=" font-weight: 700;">{{ $lab_test->filename }}</span>
                                                                    {{-- <img src="{{ '/storage/'.$lab_test->path }}"> --}}
                                                                </div>
                                                                <div class="col-6">
                                                                    <button type="button" class="btn btn-primary btn-sm labtest_img" data-toggle="modal"
                                                                    data-target="#labtest_img" 
                                                                    data-labtest_path="{{ $lab_test->path }}">
                                                                    View</button>
                                                                    <button class = "btn btn-success btn-sm">Download</button>
                                                                </div>
                                                            </div>
                                                            
                                                            @else
                                                                
                                                            No Uploaded Labtest
                                                            @endif
                                                        </div>
                                                    </div>
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


                <!-- Diagnosis -->
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="col-12">
                            <div class="card-header px-0">
                                <span style="color:white; background-color: #033571; width: 100%; font-size:16px;"
                                    class="px-3 text-center">
                                    Diagnosis
                                </span>
                            </div>
                        </div>

                        <div class="card-body py-0">
                            @forelse ($consultation->patient_diagnosis as $patient_diagnosis)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Level of consciousness</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input value="{{ $patient_diagnosis->level_of_consciousness }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Breathing Description</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" value="{{ $patient_diagnosis->breathing }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Skin Description</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" value="{{ $patient_diagnosis->skin }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black">Time</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" value="{{ $patient_diagnosis->created_at }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label style="color: black">Diagnostic Test</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" value="{{ $patient_diagnosis->diagnostic_test }}"
                                                    class="form-control {{ $patient_diagnosis->diagnostic_test == 'Normal' ? 'bg-success' : 'bg-danger' }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black">ICD-10 Diagnosis</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <textarea class="form-control" style="height: auto" disabled>{{ $patient_diagnosis->ICD_10_diagnosis }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black">Assessment</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <textarea class="form-control" style="height: auto" disabled>{{ $patient_diagnosis->assessment }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @empty
                                <p>
                                    No Diagnosis Found
                                </p>
                            @endforelse

                        </div>

                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>

     <!-- Labtest Modal -->
     <div class="modal fade" id="labtest_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Lab Test Image</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
                 <div class="modal-body">
                     <div class="card-body">
                         <div style="display: flex; justify-content: center;">
                             <img style="border:1px solid #033571;" id= "img">
                     </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     </div>
                 </div>
         </div>
     </div>
 </div>
@endsection


@section('scripts')

<script>  
    $(document).ready(function() {

        $('.labtest_img').click(function() {
               $("#img").attr("src","/storage/"+$(this).data('labtest_path'));
        });

    });
</script>

@endsection

