@extends('layouts.app')
@section('title')
    Complaints Report
@endsection
@section('report_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/datatables.min.css"/>
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nurse Assestment Report</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class="text-center mb-3" style="color:black;">Nurse Assestment</h5>
                            <table class="table mt-4" id="nurse_assestment"
                                style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> No. </th>
                                        <th style="color:white; "> Date </th>
                                        <th style="color:white; "> Time In </th>
                                        <th style="color:white; "> Time Out </th>
                                        <th style="color:white; "> Patient's Name</th>
                                        <th style="color:white; "> Sex</th>
                                        <th style="color:white; "> Age</th>
                                        <th style="color:white; "> Department</th>
                                        <th style="color:white; "> Chief Complaint</th>
                                        <th style="color:white; "> Other Chief Complaint</th>
                                        <th style="color:white; "> Medicine Given</th>
                                        <th style="color:white; "> Quantity of Medicine</th>
                                        <th style="color:white; "> Supply Given</th>
                                        <th style="color:white; "> Quantiy of Supply</th>
                                        <th style="color:white; "> Remarks</th>
                                        <th style="color:white; "> Intervention</th>
                                            
                                        <th style="color:white; "> No. of Mins</th>
                                        <th style="color:white; "> Approve By</th>

                                        <th style="color:white; "> Sent to home Approve by</th>
                                        <th style="color:white; "> Sent to emergency Approve by</th>
                                        <th style="color:white; "> Sent to emergency Refusal by</th>
                                        <th style="color:white; "> Sent to emergency Refuse witness</th>
                                        <th style="color:white; "> Sent to emergency Refusal waiver</th>
                                        <th style="color:white; "> Other Intervention Info</th>





                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($c as $i)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ \Carbon\Carbon::parse($i->created_at)->format('F d, Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($i->created_at)->format('H:i - (F d)')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($i->nurse_intervention->created_at)->format('H:i - (F d)')}}</td>
                                            <td>{{ $i->patient->first_name }} {{ $i->patient->middle_name }}
                                                {{ $i->patient->last_name }}</td>
                                            <td>{{ $i->patient->gender }}</td>
                                            <td>{{ \Carbon\Carbon::parse($i->patient->birthday)->diff(\Carbon\Carbon::now())->format('%y') }}
                                            </td>
                                            <td>{{ $i->patient->department->department }}</td>

                                            <td>
                                                @foreach ($i->complaints as $a)
                                                    {{ $a->complaint }}
                                                @endforeach
                                            </td>
                                            <td></td>

                                            {{-- <td>
                                                @foreach ($i->patient_diagnosis as $a)
                                                    {{ $a->ICD_10_diagnosis }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($i->patient_diagnosis as $a)
                                                    {{ $a->assessment }}
                                                @endforeach
                                            </td> --}}

                                                <td>{{ $i->nurse_intervention->medicine }}</td>
                                                <td>{{ $i->nurse_intervention->med_qty }}</td>
                                                <td>{{ $i->nurse_intervention->supply }}</td>
                                                <td>{{ $i->nurse_intervention->supply_qty }}</td>
                                            <td>

                                            </td>
                                            
                                            {{-- <td>

                                                @foreach ($i->patient_diagnosis as $a)
                                                {{ $a->diagnostic_test }}
                                                @endforeach
                                            </td> --}}

                                            <td>
                                                {{ $i->nurse_intervention->action }}
                                            </td>

                                            <td>{{ $i->nurse_intervention->clinic_rest_num_of_mins }}</td>
                                            <td>{{ $i->nurse_intervention->clinic_rest_approve_by }}</td>

                                            <td>{{ $i->nurse_intervention->sent_to_home_approve_by }}</td>
                                            <td>{{ $i->nurse_intervention->sent_to_emer_approve_by }}</td>
                                            <td>{{ $i->nurse_intervention->sent_to_emer_refusal }}</td>
                                            <td>{{ $i->nurse_intervention->sent_to_emer_refuse_witness }}</td>
                                            <td>{{ $i->nurse_intervention->sent_to_emer_refuse_waiver }}</td>
                                            <td>{{ $i->nurse_intervention->other_intervention_info }}</td>
                                            
                                            {{-- @if ($i->doctor_intervention->clinic_rest_num_of_mins != null)
                                            
                                                <td>{{ $i->doctor_intervention->action }}</td>
                                                <td>{{ $i->doctor_intervention->clinic_rest_num_of_mins }}</td>
                                                <td>{{ $i->doctor_intervention->clinic_rest_approve_by }}</td>
                                            @endif

                                            @if ($i->doctor_intervention->sent_to_home_approve_by != null)
                                                <td>{{ $i->doctor_intervention->sent_to_home_approve_by }}</td>
                                            
                                            @endif --}}
                                          

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection



@section('report_JS_Script')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/r-2.2.9/datatables.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $('#nurse_assestment').DataTable({
            responsive:true,
            dom: 'Bfrtip',
            buttons: [
                'copy',
                'excel',
                'print'
            ],
        });
    });
</script>
@endsection
