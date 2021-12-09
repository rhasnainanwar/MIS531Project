@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Payments</h1>
    <h2>History</h2>
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
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                    <td scope="row">{{ $payment->paymentid }}</td>
                    <td scope="row">{{ $payment->invoiceid }}</td>
                    <td scope="row">{{ $payment->amount }}</td>
                    <td scope="row">{{ $mapping[$payment->paymentmethod] }}</td>
                    <td scope="row">{{ $payment->paymentdate }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
