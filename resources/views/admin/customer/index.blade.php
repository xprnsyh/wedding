@extends('layouts.admin')
@section('css-add')
<!-- JQuery DataTable Css -->
<link href="{{asset('admin-bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- Bootstrap Select Css -->
<link href="{{asset('admin-bsb/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

@endsection
@section('content')
<div class="container-fluid">

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h3 style="font-weight:500;">Customer Management</h3>
    </div>
    <!-- END PAGE TITLE -->

    <div class="row clearfix">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h4 style="font-weight:500; font-size:20px;">Data Customers</h4>
                        </div>
                        <div class="col-xs-12 col-sm-6 align-right">
                            <a href="{{route('admin.create.customer')}}" class="btn btn-info waves-effect" style="padding: 8px 16px;">
                                <i class="material-icons">add</i> <span>New Customer</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="body">
                @include('layouts.alert')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>District</th>
                                    <th width="130">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $key => $customer)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <a href="{{route('admin.show.customer',['id' => $customer->id])}}">
                                            {{$customer->name}}
                                        </a>
                                    </td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->phone_number}}</td>
                                    <td>
                                        {{$customer->address}}
                                    </td>
                                    <td>
                                        {{$customer->district->name ?? ''}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.edit.customer', [ 'id' => $customer->id ])}}" class="btn btn-pink btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="{{route('admin.delete.customer', [ 'id' => $customer->id ])}}" class="btn btn-pink btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">delete</i>
                                        </a>
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
</div>
@endsection