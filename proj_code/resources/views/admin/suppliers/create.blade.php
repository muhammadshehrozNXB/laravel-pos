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
                                <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                            </div>
                            <div>{{$pageTitle}}
                                <div class="page-title-subheading">Wide selection of forms controls, using the Bootstrap
                                    4 code base, but built with React.
                                </div>
                            </div>
                        </div>
                        <div class="page-title-actions">
                            <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                                    class="btn-shadow mr-3 btn btn-dark">
                                <i class="fa fa-star"></i>
                            </button>
                            <div class="d-inline-block dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-business-time fa-w-20"></i>
                                        </span>Buttons
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                     class="dropdown-menu dropdown-menu-right">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span>Inbox</span>
                                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                <i class="nav-link-icon lnr-book"></i>
                                                <span> Book</span>
                                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link">
                                                <i class="nav-link-icon lnr-picture"></i>
                                                <span> Picture</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a disabled class="nav-link disabled">
                                                <i class="nav-link-icon lnr-file-empty"></i>
                                                <span> File Disabled</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger fancytree-helper-hidden error-validation">
                                    <span class="append-error-text"></span>
                                </div>
                                <div class="alert alert-success fancytree-helper-hidden res-success">
                                    <span class="append-success-text"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form id="add-suppliers" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" id="suppliers-route"
                                                   value="{{ route('store-suppliers') }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="suppliersTitle" class>Supplier</label>
                                                        <input name="name" id="suppliersTitle"
                                                               placeholder="Add Supplier"
                                                               type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="phoneTitle" class>Phone</label>
                                                        <input name="phone" id="phoneTitle"
                                                               placeholder="Add Phone"
                                                               type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="emailTitle" class>Email</label>
                                                        <input name="email" id="emailTitle"
                                                               placeholder="Add Email"
                                                               type="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="addressTitle" class>Address</label>
                                                        <input name="address" id="addressTitle"
                                                               placeholder="Add Address"
                                                               type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" data-form-name="add-suppliers"
                                                    data-route="suppliers-route"
                                                    class="mt-1 btn btn-primary submit-form-data">Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
