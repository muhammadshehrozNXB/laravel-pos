@extends('layouts.app')
@section('content')
    <div class="app-main">
        @include('admin.partials.sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-medal icon-gradient bg-tempting-azure"></i>
                            </div>
                            <div>{{$pageTitle}}
                                <div class="page-title-subheading">Choose between regular React Bootstrap tables or
                                    advanced dynamic ones.
                                </div>
                            </div>
                        </div>
                        <div class="page-title-actions">
                            <div class="d-inline-block dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-business-time fa-w-20"></i>
                                        </span>Action
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="dropdown-menu dropdown-menu-right">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="{{route("create-customers")}}" class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span>Add Customers</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>avatar</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $key => $items)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$items->first_name}}</td>
                                    <td>{{$items->last_name}}</td>
                                    <td>{{$items->email}}</td>
                                    <td>{{$items->phone}}</td>
                                    <td>{{$items->address}}</td>
                                    <td><img src="{{asset('proj_code/public/avatar/'.$items->avatar)}}" width="70"></td>
                                    <td>
                                        <div class="d-inline-block dropdown">
                                            <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"
                                                    class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-business-time fa-w-20"></i>
                                        </span>Action
                                            </button>
                                            <div tabindex="-1" role="menu" aria-hidden="true"
                                                 class="dropdown-menu dropdown-menu-right" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{url('accounts-pos/customers/edit/'.$items->id)}}"
                                                           class="nav-link">
                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                            <span>Edit Customer</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{url('accounts-pos/customers/delete/'.$items->id)}}"
                                                           class="nav-link">
                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                            <span>Delete Customer</span>

                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>avatar</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
@endsection
