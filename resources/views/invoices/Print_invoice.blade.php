@extends('layouts.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection
@section('title')
    Print Invoices
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Print Invoices</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title text-primary"> <u>Invoice</u> </h1>
                            <div class="billed-from">
                                <h6> .Eagle@7, Inc </h6>
                                <p>2021 XXXXXX St., YTYY Town, YT 242, Country 6546<br>
                                    Tel No: +(212)611223344<br>
                                    Email: eagle7scms@gmail.com</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">

                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600 font-weight-bold"> <i>Invoice Informations</i> </label>
                                <p class="invoice-info-row"><span> <u>Invoice Number</u> </span>
                                    <span class="font-weight-bold">{{ $invoices->invoice_number }}</span></p>
                                <p class="invoice-info-row"><span> <u>Invoice Date</u> </span>
                                    <span class="font-weight-bold">{{ $invoices->invoice_Date }}</span></p>
                                <p class="invoice-info-row"><span> <u>Due Date</u> </span>
                                    <span class="font-weight-bold">{{ $invoices->Due_date }}</span></p>
                                <p class="invoice-info-row"><span> <u>Departement</u> </span>
                                    <span class="font-weight-bold">{{ $invoices->section->section_name }}</span></p>
                                
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                        <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        
                                        <th class="wd-20p"> Company </th>
                                        <th class="wd-20p"> Departement </th>
                                        <th class="tx-center"> Collection Amount </th>
                                        <th class="tx-right"> Commission Amount </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <td class="tx-12">{{ $invoices->product }}</td>
                                        <td class="wd-20p">{{ $invoices->Section->section_name }}</td>
                                        <td class="tx-center">{{ number_format($invoices->Amount_collection, 2) }}</td>
                                        <td class="tx-right">{{ number_format($invoices->Amount_Commission, 2) }}</td>
                                        @php
                                        $total = $invoices->Amount_collection + $invoices->Amount_Commission ;
                                        @endphp
                                    </tr>

                                    <tr>
                                        <td class="valign-middle" colspan="2" rowspan="4">
                                            <div class="invoice-notes">
                                                <label class="main-content-label tx-13"></label>

                                            </div><!-- invoice-notes -->
                                        </td>
                                        <td class="tx-right font-weight-bold">Total (A.Col + A.Com)</td>
                                        <td class="tx-right" colspan="2"> {{ number_format($total, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right font-weight-bold"> (%) Rate Vat</td>
                                        <td class="tx-right" colspan="2">{{ $invoices->Rate_VAT }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right font-weight-bold"> Discount </td>
                                        <td class="tx-right" colspan="2"> {{ number_format($invoices->Discount, 2) }}</td>

                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse font-weight-bold"> Total (Tax included)</td>
                                        <td class="tx-right" colspan="2">
                                            <h4 class="tx-primary tx-bold">{{ number_format($invoices->Total, 2) }} MAD </h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">



                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i> Print </button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection
