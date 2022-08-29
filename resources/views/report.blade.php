<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>A simple, clean, and responsive HTML invoice template</title>

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />
    <link rel = "stylesheet" href="{{asset('css/template/bootstrap.min.css')}}">
    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
            background:url('{{asset('images/bg-pattern.png')}}');
            background-color: #3051d3!important;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{asset('images/saleblaze-logo.png')}}" alt="Company logo" style="width: 100%; max-width: 300px" />
                        </td>

                        <td>
                            Financial Report for {{ Auth::user()->shop_name }}<br />
                            Created: {{ \Carbon\Carbon::today()->format("M d, Y") }}<br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                          Summary of financial and credit performance for {{ Auth::user()->shop_name }} for the financial period of {{ \Carbon\Carbon::now()->format("Y") }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr class="heading">
            <td>Item</td>

            <td>Price</td>
        </tr>

        <tr class="item">
            <td>Total Cost</td>

            <td>&#8358; {{ number_format(Auth::user()->total_cost) }}</td>
        </tr>

        <tr class="item">
            <td>Total Revenue</td>

            <td>&#8358; {{ number_format(Auth::user()->total_revenue) }} </td>
        </tr>

        <tr class="item last">
            <td>Total Profit</td>

            <td ><span @class([
        "text text-danger"=>Auth::user()->total_profit < 1,
        "text text-success"=>Auth::user()->total_profit  > 1,
])>&#8358; {{ number_format(Auth::user()->total_profit) }} </span></td>
        </tr>

    </table>
        <h3>Loans and credit</h3>
    <table>
        <thead>
            <tr>
                <td>Creditor name</td>
                <td>Amount</td>
                <td>Collection Date</td>
                <td>Maturity Date</td>
                <td>Date Repaid</td>
            </tr>
        @foreach(Auth::user()->loans()->get() as $loan)
            <tr>
                <td>{{$loan->creditor_name}}</td>
                <td>&#8358; {{ number_format($loan->amount)}}</td>
                <td>{{$loan->created_at->format("M D Y")}}</td>
                <td>{{$loan->maturity_date->format("M D Y")}}</td>
                <td>{{$loan->date_repaid == null ? "Not Repaid Yet" : $loan->date_repaid->format("M D Y") }}</td>
            </tr>
        @endforeach
        </thead>
    </table>
</div>
</body>
</html>
