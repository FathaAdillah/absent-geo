@extends('layouts.main')

@section('content-header')
    <div class="page-pretitle">
        DATA MASTER
    </div>
@endsection

@section('content')
    <h2 class="page-title">Geofencing</h2>
@endsection
@section('content-wrapper')
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="row row-cards">
                        <div class="container-fluid px-4">
                            <div class="row mb-4">
                                <div class="col-lg-10"></div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="">
                                        + Location
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <table id="dataDonatur" class="table-striped table-bordered table"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Alamat</th>
                                                        <th>Coordinate</th>
                                                        <th>Radius</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
