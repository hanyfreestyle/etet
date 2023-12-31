@extends('admin.layouts.app')

@section('content')


        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <div class="content">
            <div class="container-fluid">



            </div>
        </div>


@endsection

@push('JsCode')
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{defAdminAssets('plugins/chart.js/Chart.min.js')}}"></script>


    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{defAdminAssets('js/pages/dashboard3.js')}}"></script>
@endpush
