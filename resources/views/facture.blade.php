@extends('Layouts.master')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    *,
    *::after,
    *::before {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    :root {
        --blue-color: #0c2f54;
        --dark-color: #535b61;
        --white-color: #fff;
    }

    ul {
        list-style-type: none;
    }

    ul li {
        margin: 2px 0;
    }

    /* text colors */
    .text-dark {
        color: var(--dark-color);
    }

    .text-blue {
        color: var(--blue-color);
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-start {
        text-align: left;
    }

    .text-bold {
        font-weight: 700;
    }

    /* hr line */
    .hr {
        height: 1px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    /* border-bottom */
    .border-bottom {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--dark-color);
        font-size: 14px;
    }

    .invoice-wrapper {
        min-height: 100vh;
        background-color: rgba(0, 0, 0, 0.1);
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .invoice {
        max-width: 850px;
        margin-right: auto;
        margin-left: auto;
        background-color: var(--white-color);
        padding: 70px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        min-height: 920px;
    }

    .invoice-head-top-left img {
        width: 130px;
    }

    .invoice-head-top-right h3 {
        font-weight: 500;
        font-size: 27px;
        color: var(--blue-color);
    }

    .invoice-head-middle,
    .invoice-head-bottom {
        padding: 16px 0;
    }

    .invoice-body {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        overflow: hidden;
    }

    .invoice-body table {
        border-collapse: collapse;
        border-radius: 4px;
        width: 100%;
    }

    .invoice-body table td,
    .invoice-body table th {
        padding: 12px;
    }

    .invoice-body table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .invoice-body table thead {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-body-info-item {
        display: grid;
        grid-template-columns: 80% 20%;
    }

    .invoice-body-info-item .info-item-td {
        padding: 12px;
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-foot {
        padding: 30px 0;
    }

    .invoice-foot p {
        font-size: 12px;
    }

    .invoice-btns {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .invoice-btn {
        padding: 3px 9px;
        color: var(--dark-color);
        font-family: inherit;
        border: 1px solid rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .invoice-head-top,
    .invoice-head-middle,
    .invoice-head-bottom {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding-bottom: 10px;
    }

    @media screen and (max-width: 992px) {
        .invoice {
            padding: 40px;
        }
    }

    @media screen and (max-width: 576px) {

        .invoice-head-top,
        .invoice-head-middle,
        .invoice-head-bottom {
            grid-template-columns: repeat(1, 1fr);
        }

        .invoice-head-bottom-right {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .invoice * {
            text-align: left;
        }

        .invoice {
            padding: 28px;
        }
    }

    .overflow-view {
        overflow-x: scroll;
    }

    .invoice-body {
        min-width: 600px;
    }

    @media print {
        .print-area .invoice-foot {
        display: none;
    }
        .overflow-view {
            overflow-x: hidden;
        }

        .invoice-btns {
            display: none;
        }
    }
</style>
<style>
    .invoice-btns {
                    padding: 15px 55px;
                    border: unset;
                    border-radius: 15px;

                    color: #212121;
                    z-index: 1;
                    background: #e8e8e8;
                    position: relative;
                    font-weight: 1000;
                    font-size: 17px;
                    -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    transition: all 250ms;
                    overflow: hidden;
                    width: 100px;
                    margin-left: 290px;
                   }

                   .invoice-btns::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 0;
                    border-radius: 15px;
                    background-color: #212121;
                    z-index: -1;
                    -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
                    transition: all 250ms
                   }

                   .invoice-btns:hover {
                    color: #e8e8e8;
                   }

                   .invoice-btns:hover::before {
                    width: 100%;
                   }
    </style>


    <div class="container pt-5 pb-3">
        <section id="advertisers" class="advertisers-service-sec pt-5 pb-5">
            <div class="container">
              <div class="row">
                <div class="section-header text-center">
                  <h2 class="fw-bold fs-1">
                    Get your<span class="b-class-secondary"> Bill </span>
                  </h2>
      <div class="invoice-wrapper" id="print-area">
        <div class="invoice">
            <div class="invoice-container">
                <div class="invoice-head">
                    <div class="invoice-head-top">
                        <div class="invoice-head-top-left text-start">
                            <a href="" class="navbar-brand">
                                <h1 class="m-0 text-primary"><span class="text-dark">Voyage</span>Vers</h1>
                            </a>
                        </div>
                        <div class="invoice-head-top-right text-end">

                        </div>
                        <br>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-middle">
                        <div class="invoice-head-middle-left text-start">
                            <p><span class="text-bold">Date</span>: {{ date('d/m/Y', strtotime($reservation->created_at)) }}</p>
                        </div>
                        <div class="invoice-head-middle-right text-end">
                            <p>
                                <spanf class="text-bold">Invoice No:</span>{{ $reservation->id }}
                            </p>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-bottom">
                        <div class="invoice-head-bottom-left">
                            <ul>
                                <li class='text-bold'>Invoiced To:</li>
                                <li>{{ $reservation->first_name }} {{ $reservation->last_name }}</li>
                                <li>{{ $reservation->departure_city }}</li>
                                <li>{{ $reservation->email  }}</li>
                                <li>{{ $reservation->contact_number }}</li>
                            </ul>
                        </div>
                        <div class="invoice-head-bottom-right">
                            <ul class="text-end">
                                <li class='text-bold'>Pay To:</li>
                                <li>VoyageVers</li>
                                <li>2705 N. Enterprise</li>
                                <li>+212 6671086</li>
                                <li>VoyageVers@gmail</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="overflow-view">
                    <div class="invoice-body">
                        <table>
                            <thead>
                                <tr>
                                    <td class="text-bold">Destination</td>
                                    <td class="text-bold">Description</td>
                                    <td class="text-bold">Rate</td>
                                    <td class="text-bold">Ticket(s)</td>
                                    <td class="text-bold">Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $package->destination }}</td>
                                    <td>{{ $package->description }}</td>
                                    <td>{{ $package->prix_unit }}</td>
                                    <td>{{ $reservation->quantity }}</td>
                                    <td class="text-end">${{ $reservation->total_price }}</td>
                                </tr>



                            </tbody>
                        </table>
                        <div class="invoice-body-bottom">
                            <div class="invoice-body-info-item border-bottom">
                                <div class="info-item-td text-end text-bold">Sub Total:</div>
                                <div class="info-item-td text-end">${{ $reservation->total_price }}</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="invoice-foot text-center">
                    <p><span class="text-bold text-center">NOTE:&nbsp;</span>For more informations contact us.</p>


                </div>
            </div>
        </div>
    </div>

    <div class="invoice-btns">
        <button type="button" class="invoice-btn" onclick="printInvoice()">
            <span>
                <i class="fa-solid fa-print"></i>
            </span>
            <span>Print</span>
        </button>

    </div>
</div>
</div>
</div>
</div>
    <script>
       function printInvoice() {

        document.querySelector('.invoice-btns').style.display = 'none';
        // Imprimer la facture
        window.print();

        document.querySelector('.invoice-btns').style.display = 'block';
    }


    </script>




@endsection
