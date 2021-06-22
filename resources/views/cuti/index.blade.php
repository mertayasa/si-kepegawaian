@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Cuti</h1>
    </div>
    <p><strong><a href="{{route('cuti.index')}}" class='text-decoration-none text-gray-900'>Dashboard</a></strong> / Data cuti</p>
    <!-- Area Table -->
    @include('layouts.flash')
    <div class="col-12 p-0">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="col-12 p-0 mb-3">
                    @if (userRole() == 'pegawai')
                        <div class="row">
                            <div class="col-6 align-items-start">
                                <button class="btn btn-primary mb-3 mr-2" onclick="location.href='{{route('cuti.create')}}'">Tambah Data</button>
                            </div>
                            <div class="col-6 d-flex">
                            </div>
                        </div>
                    @endif
                </div>
                @include('cuti.datatable')
            </div>
        </div>
    </div>
@endsection