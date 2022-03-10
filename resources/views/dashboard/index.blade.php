@extends('layouts.app')

@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
           
        </div>
    </section>

  
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select Permission",
                allowClear: true
            });

        });
    </script>
@endsection
