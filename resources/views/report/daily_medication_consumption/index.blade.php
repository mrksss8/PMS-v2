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
            <h3 class="page__heading">Daily Medication Report</h3>
        </div>
        <div class="section-body">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class="text-center mb-3" style="color:black;">Daily Medication Report (By Patient)</h5>

                            <table class="table mt-4" id="medication_by_patient"
                                style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>

                                        <th style="color:white;"> No. </th>
                                        <th style="color:white;"> Patient Name: </th>
                                        <th style="color:white;"> Medicine: </th>
                                        <th style="color:white;"> Quantity: </th>                         
                                        <th style="color:white;"> Date: </th>                         

                                    </tr>
                                </thead>
                                <tbody>

                                 @foreach ($consume_meds as $consume_med)
                                     <tr>
                                         <td></td>
                                         <td>{{ $consume_med->consultation->patient->full_name }}</td>
                                         <td>{{ $consume_med->medicine }}</td>
                                         <td>{{ $consume_med->med_qty }}</td>
                                         <td>{{ \Carbon\Carbon::parse($consume_med->created_at)->format('F d, Y') }}</td>
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
                            <h5 class="text-center mb-3" style="color:black;">Daily Medication Report (By Department)</h5>

                            <table class="table mt-4" id="medication_by_dept"
                                style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>

                                        <th style="color:white;"> No. </th>
                                        <th style="color:white;"> Department: </th>
                                        <th style="color:white;"> Quantity: </th>                                             

                                    </tr>
                                </thead>
                                <tbody>

                                 @foreach ($medicine_consume_by_dept as $consume_med_by_dept)
                                     <tr>
                                         <td></td>
                                         <td>{{ $consume_med_by_dept->department }}</td>
                                         <td>{{ $consume_med_by_dept->Total_medicine }}</td>
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
            $('#medication_by_patient').DataTable({
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
    <script>
        jQuery(document).ready(function($) {
            $('#medication_by_dept').DataTable({
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
