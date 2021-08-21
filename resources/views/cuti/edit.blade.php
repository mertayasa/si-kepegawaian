@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Cuti</h1>
    </div>
    <p><strong><a href="{{route('dashboard')}}" class='text-decoration-none text-gray-900'>Dashboard</a></strong> / Data cuti / Edit cuti</p>
    @include('layouts.flash')
    
    {!! Form::model($cuti, ['route' => ['cuti.update', $cuti->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        @include('cuti.form')
                        <div class="text-right">
                            <button class="btn btn-danger mr-1" type="submit">Update</button>
                            <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                            <a href="{{ url('cuti')}}" class="btn btn-primary mr-1">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    
@endsection