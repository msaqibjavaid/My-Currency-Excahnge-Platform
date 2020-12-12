@extends('admin')

@section('body')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-exchange"></i> {{$page_title}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url()->current()}}">{{$page_title}}</a></li>
        </ul>
    </div>




    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-title d-print-none"><i class="fa fa-exchange"></i>
                    {{$page_title}}
                    @if($exchange->status == 2)
                        <a href="javascript::void();" class="btn btn-info btn-md pull-right ">
                            Success
                        </a>
                    @elseif($exchange->status == -2)
                        <a href="javascript::void();" class="btn btn-danger btn-md pull-right ">
                            Rejected
                        </a>
                    @else
                        <button class="btn btn-info btn-md pull-right " data-toggle="modal"
                                data-target=".bd-example-modal-lg">
                            <i class="fa fa-plus"></i> Action
                        </button>
                    @endif


                    <br>
                </div>
                <div class="tile-body">

                    <section class="invoice">

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Send Currency</th>
                                        <th>Get Amount</th>
                                        <th> Seller Name</th>
                                        <th> Seller Email</th>
                                        <th style="width: 5%">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-label="Date">
                                            <strong>{{date('d M Y',strtotime($exchange->created_at))}}</strong>
                                        </td>
                                        <td data-label="Send Amount ">
                                            <strong>
                                                {{$exchange->enter_amount}} {{$exchange->currency->symbol}}</strong>
                                        </td>
                                        <td data-label="Get Currency">
                                            <strong>{{number_format($exchange->get_amount, $basic->decimal)}} {{$basic->currency}}</strong>

                                        </td>

                                        <td data-label="Seller   Name">
                                            <a href="{{route('user.single',$exchange->user_id)}}">{{$exchange->user->username}}</a>
                                        </td>
                                        <td data-label="Seller Email">{{$exchange->user->email}}</td>

                                        <td data-label="Status">
                                            @if( $exchange->status ==2 )
                                                <span class="badge badge-success">Success</span>
                                            @elseif( $exchange->status == -2 )
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br><br>
                        <div class="row invoice-info">
                            <div class="col-md-5 offset-md-1">
                                @if($exchange->type == 0)
                                    <h3 class="error">Payment will be added user wallet </h3>
                                    <h5>Message : </h5>
                                    <p>{{$exchange->info}} </p>
                                @else
                                    <h4>Payment Sent This Account : </h4>
                                    <strong>{{$exchange->info}} </strong>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <h5>Transaction No : <span class="error">{{$exchange->account}}  </span></h5>
                                <br>
                                <h5>Transaction screenshot : </h5>
                                <img src="{{asset('assets/images/exchange/'.$exchange->image)}}" alt="..."
                                     class="img-thumbnail">

                            </div>
                        </div>

                    </section>

                </div>
                <div class="tile-footer">
                    <div class="row d-print-none mt-2">
                        <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();"
                                                          target="_blank"><i class="fa fa-print"></i> Print</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade bd-example-modal-lg" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class='fa fa-info-circle'></i> Sell Currency
                        Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <strong>Please choose an action for this </strong>
                </div>
                <form action="{{route('sell-action')}}" method="post">
                    @csrf
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="{{$exchange->id}}">
                        <button type="submit" name="button" class="btn btn-success" value="approve">Approve</button>
                        <button type="submit" name="button" class="btn btn-danger" value="reject">Reject</button>
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
@endsection
