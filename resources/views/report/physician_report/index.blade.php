@extends('layouts.app')
@section('title')
    Complaints Report
@endsection
@section('report_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/datatables.min.css" />
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Physician Report</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class="text-center mb-3" style="color:black;">Physician Report</h5>
                            <table class="table mt-4" id="physician_report"
                                style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white;"> No. </th>
                                        <th style="color:white;"> Date: </th>
                                        <th style="color:white;"> Time In: </th>
                                        <th style="color:white;"> Time Out: </th>
                                        <th style="color:white;"> Patient's Name: </th>
                                        <th style="color:white;"> Sex: </th>
                                        <th style="color:white;"> Age: </th>
                                        <th style="color:white;"> Department: </th>

                                        <th style="color:white;"> Chief Complaint: </th>
                                        <th style="color:white;"> Other Chief Complaint: </th>

                                        <th style="color:white;"> Diagnosis: </th>
                                        <th style="color:white;"> Assestment Remarks: </th>
                                        <th style="color:white;"> Subject: </th>
                                        <th style="color:white;"> Ojectives: </th>
                                        <th style="color:white;"> Plan: </th>
                                        <th style="color:white;"> Implementation: </th>
                                        <th style="color:white;"> Evaluation: </th>

                                        <th style="color:white;"> Medicine Given: </th>
                                        <th style="color:white;"> Quantiy of Medicine: </th>
                                        <th style="color:white;"> Supply Given: </th>
                                        <th style="color:white;"> Quantiy of Supply: </th>
                                        <th style="color:white;"> Remarks: </th>
                                        <th style="color:white;"> Intervention: </th>
                                        <th style="color:white;"> Other Intervention: </th>

                                        <th style="color:white;"> Intervention Action: </th>
                                        <th style="color:white;"> No. of Mins: </th>
                                        <th style="color:white;"> Aprrove By: </th>

                                        <th style="color:white;"> Sent to home Approve by: </th>

                                        <th style="color:white;"> Sent to emergency Refusal: </th>
                                        <th style="color:white;"> Sent to emergency Refuse witness (if refused): </th>

                                        <th style="color:white;"> Other Info Action: </th>
                                        
                                        <th style="color:white;"> Medical Certificate Status: </th>
                                        <th style="color:white;"> Fit to Work: </th>
                                        <th style="color:white;"> FTW Date: </th>
                                        <th style="color:white;"> Nurse On Duty: </th>





                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($c as $i)
                                        @if ($i->doctor_intervention != null)
                                            <tr>
                                                <td></td>
                                                <td>{{ \Carbon\Carbon::parse($i->created_at)->format('F d, Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($i->created_at)->format('H:i - (F d)') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($i->doctor_intervention->created_at)->format('H:i - (F d)') }}
                                                </td>
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
                                                <td>
                                                    @foreach ($i->patient_diagnosis as $a)
                                                        {{ $a->ICD_10_diagnosis }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($i->patient_diagnosis as $a)
                                                        {{ $a->assessment }}
                                                    @endforeach
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>


                                                <td>{{ $i->doctor_intervention->medicine }}</td>
                                                <td>{{ $i->doctor_intervention->med_qty }}</td>
                                                <td>{{ $i->doctor_intervention->supply }}</td>
                                                <td>{{ $i->doctor_intervention->supply_qty }}</td>
                                                <td></td>

                                                <td></td>
                                                <td></td>

                                                <td>{{ $i->doctor_intervention->action }}</td>
                                                <td>{{ $i->doctor_intervention->clinic_rest_num_of_mins }}</td>
                                                <td>{{ $i->doctor_intervention->clinic_rest_approve_by }}</td>

                                                <td>{{ $i->doctor_intervention->sent_to_home_approve_by }}</td>

                                                <td>{{ $i->doctor_intervention->sent_to_emer_refuse_witness }}</td>
                                                <td></td>
                                                <td>{{ $i->doctor_intervention->other_intervention_info }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                {{-- <td></td>
                                                <td></td>
                                                <td></td> --}}
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
    </section>
@endsection



@section('report_JS_Script')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/r-2.2.9/datatables.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#physician_report').DataTable({
                responsive: true,
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
