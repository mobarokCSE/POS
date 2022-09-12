@extends('backend.layout.app')

@section('content')

<div class="page-content fade-in-up" style="padding-top: 20px;">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5" style="font-weight: bold; font-size:45px;" ></h2>
                    <div class="m-b-5" style="font-size:20px;">Daily Purchases</div><i class="fa fa-shopping-basket widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #009432;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" ></h2>
                    <div class="m-b-5" style="font-size:20px;">Daily Sales</div><i class="fa fa-universal-access widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #2fb4f1;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" ></h2>
                    <div class="m-b-5" style="font-size:20px;">Daily Expensive</div><i class="fa fa-money widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #f3ad16;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-primary color-white widget-stat">
                <div class="ibox-body pb-2 pt-4">
                    <h2 class="m-b-5 "style="font-weight: bold; font-size:45px;" ></h2>
                    <div class="m-b-5" style="font-size:20px;">Total Profit</div><i class="fa fa-money widget-stat-icon"></i>
                </div>
                <div class="ibox-footer pl-4 pr-4" style="background-color: #6792e2;">
                    <a href="" class="text-white">
                        <div class="row">
                            <div class="col-6">View</div>
                            <div class="col-6 text-right" > <i class="fa fa-arrow-circle-right"></i></div>
                        </div>
                        </a>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header cardB bg-info">
                    <div style="font-weight: bold" class="heading_h4"><i class="fa fa-minus"></i>Latest Sales</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Sales ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span class="badge badge-pill badge-success"></span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-success cardB">
                    <div style="font-weight: bold" class="heading_h4"><i class="fa fa-plus"></i>Latest Purchase</div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Purchase ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span class="badge badge-pill badge-success"></span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        .visitors-table tbody tr td:last-child {
            display: flex;
            align-items: center;
        }

        .visitors-table .progress {
            flex: 1;
        }

        .visitors-table .progress-parcent {
            text-align: right;
            margin-left: 10px;
        }
    </style>
    
</div>
@endsection