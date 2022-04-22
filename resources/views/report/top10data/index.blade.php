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
            <h3 class="page__heading">Top 10 Data Report</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3" style="color:black;" >Top 10 Complaints</h5>
                            <table class="table mt-4"  id="complaints" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Complaints </th>
                                        <th style="color:white; "> Data </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($complaints as $complaint)
                                        <tr>
                                            <td>{{ $complaint->complaint }}</td>
                                            <td>{{ $complaint->cnt }} Records</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


                <!-- top10 other complaints -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3"  style="color:black;">Top 10 Other Complaints</h5>
                            <table class="table mt-4" id = "other_complaints"style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Other Complaints </th>
                                        <th style="color:white; "> Data </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ( $other_complaints as $complaint)
                                        <tr>
                                            <td>{{ $complaint->other }}</td>
                                            <td>{{ $complaint->cnt }} Records</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- top10 consume medicine -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3"  style="color:black;">Top 10 Consume Medicine</h5>
                            <table class="table mt-4" id = "medicine" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Medicine </th>
                                        <th style="color:white; "> Consumed </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ( $medicine_consumptions as $medicine_consumption)
                                        <tr>
                                            <td>{{ $medicine_consumption->medicine->brand_name}} - {{ $medicine_consumption->medicine->dosage}}</td>
                                            <td>{{ $medicine_consumption->total_consume  }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- top10 illnesses-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow">
                            <h5 class = "text-center mb-3"  style="color:black;">Top 10 Illnesses</h5>
                            <table class="table mt-4" id = "illenesses" style="color:black; border: 1px solid #033571; font-weight 600;">
                                <thead style="background-color: #033571;">
                                    <tr>
                                        <th style="color:white; "> Illnesses</th>
                                        <th style="color:white; "> Count </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ( $illnesses as $illness)
                                        <tr>
                                            <td>{{ $illness->ICD_10_diagnosis}}</td>
                                            <td>{{ $illness->cnt}}</td>
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
        $('#other_complaints').DataTable({
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
        $('#medicine').DataTable({
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
        $('#illenesses').DataTable({
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