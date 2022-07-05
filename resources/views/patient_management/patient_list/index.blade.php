@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Patients List</h3>
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
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#store">
                                    Add Patient
                                </button>

                            </div>

                            <div class="mt-4">
                                <table class="table" width="100%"
                                    style="color:black; border: 1px solid #033571; font-weight:700;" id="myTable">
                                    <thead style="background-color: #033571;">
                                        <tr>
                                            <th style="color:white;">Full Name</th>
                                            <th style="color:white;">Department</th>
                                            <th style="color:white;">Gender</th>
                                            <th style="color:white;">Birthday</th>
                                            <th style="color:white;">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($patients as $patient)
                                            <tr style="border: 1px solid #033571;">
                                                <td>{{ $patient->full_name }}
                                                    {{ $patient->middle_name }}</td>
                                                <td>{{ $patient->department->department }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>{{ $patient->birthday }}</td>
                                                <td>
                                                    <a href="{{ route('patients.show', $patient) }}"
                                                        class="btn btn-outline-primary">View</a>
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

    <!-- Patient Modal store-->
    <div class="modal fade" id="store" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
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
                                    <div class="col-md-6 ">
                                        <div class = "d-flex flex-column align-items-center ">
                                        <div id="my_camera"></div>
                                            <div>
                                                <input type=button class="btn btn-sm btn-primary" value="Capture"
                                                onClick="take_snapshot()">
                                            </div>
                                        </div>
                                            <input type="hidden" name="image" class="image-tag">
                                        </div>
            
                                    <div class="col-md-6">
                                        <div id="results">
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                name="last_name" tabindex="1" placeholder="Enter Last Name" autofocus>
                                            @error('last_name')
                                                <p style="color:red"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                name="first_name" tabindex="2" placeholder="Enter First Name" autofocus>
                                            @error('first_name')
                                                <p style="color:red"><small>{{ $message }}</small></p>
                                            @enderror


                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('middle_name') ? ' is-invalid' : '' }}"
                                                name="middle_name" tabindex="3" placeholder="Enter Middle Name" autofocus>
                                            @error('middle_name')
                                                <p style="color:red"><small>{{ $message }}</small></p>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birthday:</label>
                                            <input type="date"
                                                class="form-control {{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                                                name="birthday" tabindex="3" placeholder="Enter Birthday" autofocus>
                                            @error('birthday')
                                                <p style="color:red"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                                <option selected disabled hidden>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <p style="color:red"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department:</label>
                                            <select class="form-control  {{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" required>

                                                @php
                                                    $departments = DB::table('departments')->get();
                                                @endphp


                                                <option disabled selected hidden>Select Department</option>
                                                @forelse ($departments as $department)
                                                    <option value="{{ $department->id }}">
                                                        {{ $department->department }}
                                                    </option>
                                                @empty
                                                    <option disabled>No Departments</option>
                                                @endforelse

                                            </select>
                                            @error('department_id')
                                            <p style="color:red"><small>{{ $message }}</small></p>
                                        @enderror
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
    </div>
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

    <script type="text/javascript">
        @if ($errors->any())
            $('#store').modal('show');
        @endif
    </script>

<!-- webcam setup -->

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#category-img-tag').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cat_image").change(function() {
        readURL(this);
    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img style = "width:480px; height:auto; padding:20px;" src="' + data_uri + '"/>';
        });
    }
</script>
@endsection

