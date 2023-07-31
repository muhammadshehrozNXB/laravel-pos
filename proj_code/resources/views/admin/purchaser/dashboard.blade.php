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
                    </div>
                </div>
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchaserData as $key => $items)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$items->first_name." ".$items->last_name}}</td>
                                    <td>{{$items->email}}</td>
                                    <td>{{date('M d, Y', strtotime($items->created_at))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registered</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
@endsection
