<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Invoice</title>
    <link rel="shortcut icon" type="image/png" href="https://image.flaticon.com/icons/png/512/64/64431.png" />
    <!-- Bootstrap -->
    <link href="{{ asset('reports/css/bootstrap3.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="row" style="padding:80px">


    <div class="row" > 
        <div class="col-xs-6 text-center">
<center>
            <br>
            <img src="/images/farahBanner.png" width="30%"><img src="/images/farahBanner.png" width="30%">
        </div>
        <div class="col-xs-6 text-right">
            @php
                $myvalue = $order->created_at;
                
                $datetime = new DateTime($myvalue);
                $Dine_Datetime = $datetime->format('d-m-Y');
                // $time = $datetime->format('H:i');
                
            @endphp
            <center>
            <h1>INVOICE</h1>
            <h5>Order: {{ $order->Tracking_No }}</h5>
            <h5>Date: {{ $Dine_Datetime }}</h5>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center>
                    <h4>From: Farah Classic Sdn. Bhd.</h4>
                </div>
                <center>
                <div class="panel-body">
                    <p>
                        Batu 11, Jalan Kluang, <br>
                        86400 Parit Raja <br>
                        Batu Pahat, Johor <br>
                        Tel   : 07-4532572 <br>
                        Faks : 07-4531701 <br>
                    </p>
                </div>
            </div>
        </div>
        <center>
        <div class="col-xs-5 col-xs-offset-2 text-right">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>To: {{ $order->O_Name }}</h4>

                </div>
                <div class="panel-body">

                    <p>
                        {{ $order->O_Street_1 }}<br>
                        {{ $order->O_Postcode }}, {{ $order->O_City}} <br>
                        {{ $order->O_State }} <br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @php
        $total = 0;
        $count = 0;
    @endphp
<center>
    <table class="table table-striped table-bordered">

        <tr>
            <th>No</th>
            <th>Product</th>
            <th class="text-right">Quantity</th>
            <th class="text-right">Price(RM)/Unit</th>
            <th class="text-right">Total(RM)</th>
        </tr>

        @foreach ($order->orderitems as $item)
            <tr>
                <td>{{ $count = $count + 1 }}</td>
                <td>{{$item->products->P_Name}}</td>
                <td class="text-right">{{ $item->Order_Quantity }}</td>
                <td class="text-right">RM {{ number_format($item->products->P_Price, 2) }}</td>
                <td class="text-right">RM {{ number_format($item->products->P_Price * $item->Order_Quantity, 2) }}</td>

            </tr>
        @endforeach

        <tr>
            <td colspan="4" class="text-right">Grand Total</td>
            <td class="text-right">RM
                {{ number_format($order->O_Total_Price, 2) }}</td>
        </tr>

    </table>


    <div class="panel-body">
        <center>
            <p>If you have any questions about this invoice, please contact</p>
        </center>
        <center>
            <p>Puan Farah, +60104031221 </p>
        </center>
        <p><br></p>
        <center>
            <p>Computer-generated invoice. No signature is required.</p>
        </center>
    </div>

</div>


</body>

</html>
