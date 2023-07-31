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
                                            <a href="{{route("create-purchase-order")}}" class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span>Add Product Type</span>
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
                                <th>Product Name</th>
                                <th>Supplier Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchaseOrder as $key => $items)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$items->product_name}}</td>
                                    <td>{{$items->supplier_name}}</td>
                                    <td>{{number_format((float)$items->price, 2, '.', '')}}</td>
                                    <td>{{$items->quantity}}</td>
                                    <td>{{$items->quantity * $items->price}}</td>
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
                                                        <a href="{{url('accounts-pos/purchase-order/edit/'.$items->id)}}"
                                                           class="nav-link">
                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                            <span>Edit Product</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{url('accounts-pos/purchase-order/delete/'.$items->id)}}"
                                                           class="nav-link">
                                                            <i class="nav-link-icon lnr-inbox"></i>
                                                            <span>Delete Product</span>
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
                                <th>Product Name</th>
                                <th>Supplier Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
@endsection
