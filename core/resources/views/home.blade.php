@extends('user')
@section('content')
@section('css')
@endsection
    <div class="page-title-area">
        <div class="container">
            <div class="page-title">
                <h1>{{$page_title}}</h1>
            </div>
        </div>
    </div>

<br><br>


<div class="container">
            <div class="row">
                <div class="col-xl-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Exchange <br> <br/></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sell  <br><br/></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Buy  <br><br/></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="chart">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Exchanger Name  </th>
                                        <th scope="col"> Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($exchange as $data)
                                    <tr>
                                        <th scope="row"><i class="fas fa-calendar-alt"></i> {{date('d F Y', strtotime($data->created_at))}}</th>
                                        <td> {{$data->toCurrency->name}}</td>
                                        <td>{{$data->user->fname}} {{$data->user->lname}}</td>
                                        <td><i class="icofont-money"></i> {{$data->receive_amount}} <span>{{$data->toCurrency->symbol}}</span></td>

                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="chart">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Seller Name </th>
                                        <th scope="col"> Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sellCurrency as $data)
                                    <tr>
                                        <th scope="row"><i class="fas fa-calendar-alt"></i> {{date('d F Y', strtotime($data->created_at))}}</th>
                                        <td>{{$data->currency->name}}</td>
                                        <td>{{$data->user->fname}} {{$data->user->lname}}</td>
                                        <td><i class="icofont-money"></i> {{$data->enter_amount}} <span>{{$data->currency->symbol}}</span></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="chart">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Buyer Name  </th>
                                        <th scope="col"> Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($buyMoney as $data)
                                    <tr>
                                        <th scope="row"><i class="fas fa-calendar-alt"></i> {{date('d F Y', strtotime($data->created_at))}}</th>
                                        <td>{{$data->currency->name}}</td>
                                        <td>{{$data->user->fname}} {{$data->user->lname}}</td>
                                        <td><i class="icofont-money"></i> {{$data->get_amount}} <span>{{$data->currency->symbol}}</span></td>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br>
    <br>






@endsection
@section('js')

@endsection
