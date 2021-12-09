@extends('layouts.app')

@section('content')
<div style="text-align: center;">
    <h1>User Payments</h1>
</div>
<div class="container">
    <h2>Payment History</h2>
    @if(count($paid) > 0)
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">PaymentID</th>
                <th scope="col">InvoiceID</th>
                <th scope="col">Amount</th>
                <th scope="col">Method</th>
                <th scope="col">Date</th>
                <th scope="col">Receiver</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paid as $payment)
                    <tr>
                    <td scope="row">{{ $payment->paymentid }}</td>
                    <td scope="row">{{ $payment->invoiceid }}</td>
                    <td scope="row">{{ $payment->amount }}</td>
                    <td scope="row">{{ $mapping[$payment->paymentmethod] }}</td>
                    <td scope="row">{{ $payment->paymentdate }}</td>
                    <td scope="row">{{ $payment->receiver }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    @else
        <p>No payments found.</p>
    @endif
</div>
<div class="container">
    <h2>Payments Received</h2>
    @if(count($received) > 0)
    <div class="row justify-content-center">
        <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">PaymentID</th>
                <th scope="col">InvoiceID</th>
                <th scope="col">Amount</th>
                <th scope="col">Method</th>
                <th scope="col">Date</th>
                <th scope="col">Payee</th>
                </tr>
            </thead>
            <tbody>
                @foreach($received as $payment)
                    <tr>
                    <td scope="row">{{ $payment->paymentid }}</td>
                    <td scope="row">{{ $payment->invoiceid }}</td>
                    <td scope="row">{{ $payment->amount }}</td>
                    <td scope="row">{{ $mapping[$payment->paymentmethod] }}</td>
                    <td scope="row">{{ $payment->paymentdate }}</td>
                    <td scope="row">{{ $payment->payer }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    @else
        <p>No payments found.</p>
    @endif
</div>
@endsection
