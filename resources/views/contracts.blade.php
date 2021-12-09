@extends('layouts.app')

@section('content')
<div style="text-align: center;">
    <h1>User Contracts</h1>
</div>
<div class="container">
    <h2>Sales Contracts</h2>
    @if($sale_contracts || count($sale_contracts) > 0)
        <div class="row justify-content-center">
            <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ContractID</th>
                    <th scope="col">OwnerID</th>
                    <th scope="col">AgentID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Sign Date</th>
                    <th scope="col">ListingID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sale_contracts as $contract)
                        <tr>
                        <td scope="row">{{ $contract->contractid }}</td>
                        <td scope="row">{{ $contract->ownerid }}</td>
                        <td scope="row">{{ $contract->agentid }}</td>
                        <td scope="row">{{ $contract->amount }}</td>
                        <td scope="row">{{ $contract->signdate }}</td>
                        <td scope="row">{{ $contract->listid }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        @else
            <p>No sale contracts found.</p>
        @endif
    </div>
</div>
<div class="container">
    <h2>Rental Contracts</h2>
    @if($rent_contracts)
        <div class="row justify-content-center">
            <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ContractID</th>
                    <th scope="col">OwnerID</th>
                    <th scope="col">AgentID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Sign Date</th>
                    <th scope="col">ListingID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rent_contracts as $contract)
                        <tr>
                        <td scope="row">{{ $contract->contractid }}</td>
                        <td scope="row">{{ $contract->ownerid }}</td>
                        <td scope="row">{{ $contract->agentid }}</td>
                        <td scope="row">{{ $contract->amount }}</td>
                        <td scope="row">{{ $contract->signdate }}</td>
                        <td scope="row">{{ $contract->listid }}</td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    @else
        <p>No rental contracts found.</p>
    @endif
</div>
@endsection
