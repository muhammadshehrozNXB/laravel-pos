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
                                            <a href="{{route("create-suppliers")}}" class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span>Add Suppliers</span>
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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suppliers as $key => $items)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$items->name}}</td>
                                    <td>{{$items->address}}</td>
                                    <td>{{$items->email}}</td>
                                    <td>{{$items->phone}}</td>
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
                                                        <a href="{{url('accounts-pos/suppliers/edit/'.$items->id)}}"
                                                           class="nav-link">
                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                            <span>Edit Supplier</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{url('accounts-pos/suppliers/delete/'.$items->id)}}"
                                                           class="nav-link">
                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                            <span>Delete Supplier</span>

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
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
@endsection
