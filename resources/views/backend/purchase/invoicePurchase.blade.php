@extends('backend.layout.app')
@section('content')
<div class="container-fluid mt-2">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
            <div class="card">
                <div class="card-header cardB heading_h4">Invoice
                @php
                    $purchase = DB::table('purchases')->select('id')->get();
                    $count = count($purchase)+1;
                    $purchase_no = "#". date('Y')."00".$count;
                @endphp
                    <strong>{{$purchase_no}}</strong>
                    <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="printDiv('printMe')" data-abc="true">
                    <i class="fa fa-print"></i> Print</a>
                </div>
                <div class="card-body" id='printMe'>
                    <div class="row mb-4">
                        <div class="col-sm-4">
                            <h6 class="mb-3">From:</h6>
                            <div>
                                <strong>{{$supplier->sup_name}}</strong>
                            </div>
                            <div>{{$supplier->shopName}}</div>
                            <div>{{$supplier->address}}</div>
                            <div>{{$supplier->email}}</div>
                            <div>{{$supplier->phone}}</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong>E-Shop</strong>
                            </div>
                            <div>Uttara, Sector 6</div>
                            <div>1230 Dhaka, Bangladesh</div>
                            <div>eshop@gmail.com</div>
                            <div>+88018XXXXXXXX</div>
                            <div></div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Details:</h6>
                            <div>Invoice
                                <strong>{{$purchase_no}}</strong>
                            </div>
                            <div>{{date("F j, Y")}}</div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="center">Quantity</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($content as $row)
                                <tr>
                                    <td class="center">{{$i++}}</td>
                                    <td class="left">{{$row->name}}</td>
                                    <td class="left">{{$row->options->description}}</td>
                                    <td class="center">{{$row->qty}}</td>
                                    <td class="right">{{$row->price}}</td>
                                    <td class="right">{{$row->qty*$row->price}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"></div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="text-center">{{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>VAT (10%)</strong>
                                        </td>
                                        <td class="text-center">{{Cart::tax()}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="text-center">
                                            <strong>{{Cart::total()}}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-success " href="#" data-abc="true" data-toggle="modal" data-target="#staticBackdrop" style="
                            float: right;
                            margin-right: 4rem;
                            margin-bottom: 10px;
                        ">
                                Proceed to Payment</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- modal --}}
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header card-header cardB">
            <h5  style="font-weight:bold; color:#fff">Invoice of Purchase</h5>
            <h4 class="float-right" style="font-weight:bold; color:#fff">Total: {{Cart::total()}}</h4>
            <button type="button" class="close heading_h4" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <form action="{{route('store.purchase')}}" method="POST">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="supplier_id" value="{{$supplier->id}}">
                <input type="hidden" name="purchase_no" value="{{$purchase_no}}">
                <input type="hidden" name="purchase_date" value="{{date("d/m/y")}}">
                <input type="hidden" name="total_product" value="{{Cart::count()}}">
                <input type="hidden" name="sub_total" value="{{Cart::subtotal()}}">
                <input type="hidden" name="tax" value="{{Cart::tax()}}">
                <input type="hidden" name="total" value="{{Cart::total()}}">
                <div class="form-group">
                    <label for="">Payment Type</label>
                    <select name="payment_type" id="" class="form-control" required>
                        <option value="">Select Option</option>
                        <option value="Hand Cash">Hand Cash</option>
                        <option value="bkash">bkash</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Pay</label>
                    <input type="text" class="form-control" name="pay" required>
                    <input type="hidden" value="{{Cart::total()}}" >
                </div>
                <div class="form-group">
                    <label for="">Due</label>
                    <input type="text" class="form-control"  name="due" id="txtResult">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Purchase</button>
            </div>
        </form>
        </div>
        </div>
    </div>


    <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>
@endsection