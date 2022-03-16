@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Patient For Interventions</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                {{-- <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#store">
                                    Add Patient
                                </button> --}}

                            </div>

                            <div class="mt-4">
                                <table class="table" width="100%"
                                    style="color:black; border: 1px solid #033571; font-weight:700;" id="myTable">
                                    <thead style="background-color: #033571;">
                                        <tr>
                                            <th style="color:white;">Full Name</th>
                                            <th style="color:white;">Department</th>
                                            <th style="color:white;">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($for_interventions as $for_intervention)
                                            @if ($for_intervention->doctor_intervention == null)
                                                <tr style="border: 1px solid #033571;">

                                                    <td>
                                                        {{ $for_intervention->patient->last_name }},
                                                        {{ $for_intervention->patient->first_name }}
                                                        {{ $for_intervention->patient->middle_name }}
                                                    </td>
                                                    <td>
                                                        {{ $for_intervention->patient->department->department }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('doctor_intervention.show', $for_intervention->id) }}"
                                                            class="btn btn-outline-primary">View</a>
                                                    </td>
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
        </div>
    </section>

    {{-- <!-- Patient Modal store-->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="color: #033571;">Add Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('patients.store') }}">
                    @csrf
                    <div class="modal-body">

                        <!--  patient information -->
                        <div class="card card-primary">

                            <div class="card-header">
                                <span style="color:white; background-color: #033571; width: 50%;" class="px-3">
                                    Patient Information
                                </span>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" class="form-control" name="last_name" tabindex="1"
                                                placeholder="Enter Last Name" autofocus required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" name="first_name" tabindex="2"
                                                placeholder="Enter First Name" autofocus required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middle_name" tabindex="3"
                                                placeholder="Enter Last Name" autofocus required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birthday:</label>
                                            <input type="date" class="form-control" name="birthday" tabindex="3"
                                                placeholder="Enter Birthday" autofocus required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select class="form-control" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department:</label>
                                            <select class="form-control" name="department_id" required>

                                                @php
                                                    $departments = DB::table('departments')->get();
                                                @endphp

                                                
                                                <option disabled selected hidden>Select Department</option>
                                                @forelse ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->department }}
                                                    </option>
                                                @empty
                                                    <option disabled>No Departments</option>
                                                @endforelse

                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <!-- medical record -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <span style="color:white; background-color: #033571; width: 50%;" class="px-3">
                                    Medical Record
                                </span>
                            </div>

                            <div class="card-body">
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Diabetes" id="flexCheckDiabetes">
                                            <label class="form-check-label" for="flexCheckDiabetes">
                                                Diabetes
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Heart Disease" id="flexCheckHD">
                                            <label class="form-check-label" for="flexCheckHD">
                                                Heart Disease
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Allergy" id="flexCheckAllergy">
                                            <label class="form-check-label" for="flexCheckAllergy">
                                                Allergy
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Measles" id="flexCheckMeasles">
                                            <label class="form-check-label" for="flexCheckMeasles">
                                                Measles
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Asthma" id="flexCheckAsthma">
                                            <label class="form-check-label" for="flexCheckAsthma">
                                                Asthma
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Hepatitis" id="flexCheckHepatitis">
                                            <label class="form-check-label" for="flexCheckHepatitis">
                                                Hepatitis
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Seizures" id="flexCheckSeizures">
                                            <label class="form-check-label" for="flexCheckSeizures">
                                                Seizures
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Scoliosis" id="flexCheckScoliosis">
                                            <label class="form-check-label" for="flexCheckScoliosis">
                                                Scoliosis
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Primary Pulmonary Infection" id="flexCheckPPI">
                                            <label class="form-check-label" for="flexCheckPPI">
                                                Primary Pulmonary Infection
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Otitis External/Media" id="flexCheckOE">
                                            <label class="form-check-label" for="flexCheckOE">
                                                Otitis External/Media
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Urinary Track Infection" id="flexCheckUTI">
                                            <label class="form-check-label" for="flexCheckUTI">
                                                Urinary Track Infection
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Mumps" id="flexCheckMumps">
                                            <label class="form-check-label" for="flexCheckMumps">
                                                Mumps
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Chicken Pox" id="flexCheckChicken">
                                            <label class="form-check-label" for="flexCheckChicken">
                                                Chicken Pox
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Thypoid" id="flexCheckThypoid">
                                            <label class="form-check-label" for="flexCheckThypoid">
                                                Thypoid
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="Nose Bleeding" id="flexCheckNose">
                                            <label class="form-check-label" for="flexCheckNose">
                                                Nose Bleeding
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="medical_record[]"
                                                value="None" id="flexCheckNone" onClick="ckChange(this)">
                                            <label class="form-check-label" for="flexCheckNone">
                                                None
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    Others
                                    <textarea id=otherstext name="history_others" class="form-control" type="text"
                                        placeholder="Leave blank if none"></textarea>
                                    <small id="othershelp" class="form-text text-muted">If multiple, please seperate by
                                        comma.</small>
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
    </div> --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                fixedColumns: true
            });

        });
    </script>
@endsection
