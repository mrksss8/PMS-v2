@extends('layouts.app')
@section('title')
Complaints Report
@endsection
@section('report_css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Monthly Report</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3" style="color:black;" >Monthly Complaints</h5>
                            <table class="table mt-4"  id="complaints" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Complaints </th>
                                        <th style="color:white; "> Data </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monthly_complaints as $monthly_complaint)
                                        <tr>
                                            <td>{{ $monthly_complaint->complaint }}</td>
                                            <td>{{ $monthly_complaint->cnt }} record</td>
                                        </tr>
                                    @endforeach

                                    @foreach ($monthly_other_complaints as $monthly_other_complaint)
                                        <tr>
                                            <td>{{ $monthly_other_complaint->other }} <span class = "text-warning"> - (other)</span></td>
                                            <td>{{ $monthly_other_complaint->cnt }} record</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3" style="color:black;" >Monthly Illnesses </h5>
                            <table class="table mt-4"  id="illnesses" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Illness </th>
                                        <th style="color:white; "> Data </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($illnesses as $illness)
                                       <tr>
                                           <td>
                                                {{ $illness->ICD_10_diagnosis }}
                                           </td>
                                           <td>
                                            {{ $illness->cnt}} Records
                                           </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3" style="color:black;" >Monthly Intervention </h5>
                            <table class="table mt-4"  id="intervention" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Intervention</th>
                                        <th style="color:white; "> Count </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                       <tr>
                                           <td>
                                                Nurse Intervention
                                           </td>
                                           <td>
                                                {{ $nurse_intervention}}
                                           </td>
                                       </tr>

                                       <tr>
                                        <td>
                                             Doctor Intervention
                                        </td>
                                        <td>
                                             {{ $doctor_intervention}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3" style="color:black;" >Monthly Consultation</h5>
                            <table class="table mt-4"  id="consultation" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Consultation </th>
                                        <th style="color:white; "> Data </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($consultation_cnt_of_patient as $data)
                                       <tr>
                                           <td>
                                               {{ $data->first_name}} {{ $data->middle_name}}  {{ $data->last_name}} 
                                        </td>
                                        <td>
                                            {{ $data->cons_cnt }} Records
                                           </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3" style="color:black;" >Monthly Patient</h5>
                            <table class="table mt-4"  id="patient" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Patient </th>
                                        <th style="color:white; "> Visit/s </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($consultation_cnt_of_patient as $data)
                                       <tr>
                                           <td>
                                               {{ $data->first_name}} {{ $data->middle_name}}  {{ $data->last_name}} 
                                        </td>
                                        <td>
                                            {{ $data->cons_cnt }} Times
                                           </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3" style="color:black;" >Monthly Medicine Consumption By Department</h5>
                            <table class="table mt-4"  id="patient" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Patient </th>
                                        <th style="color:white; "> Count </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($medicine_consume_by_dept as $data)
                                       <tr>
                                           <td>
                                                {{ $data->department}}
                                        </td>
                                        <td>
                                            {{ $data->total_medicine}} pcs
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

    <script>
        jQuery(document).ready(function($) {
            $('#complaints').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'excel',
                    'print'
                ],
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#illnesses').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'excel',
                    'print'
                ],
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#intervention').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'excel',
                    'print'
                ],
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#consultation').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'excel',
                    'print'
                ],
            });
        });
    </script>

    <script>
        jQuery(document).ready(function($) {
            $('#patient').DataTable({
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