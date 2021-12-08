@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($listings as $listing)
            <div class="col-md-4">
            <div class="height d-flex justify-content-center align-items-center">
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="mt-2">
                            <h4 class="text-uppercase">Available for: Rental</h4>
                            <div class="mt-5">
                                <h1 class="main-heading mt-0">{{$listing->propertytype}}</h1>
                                <h5 class="text-uppercase mb-0">{{$listing->street}} {{$listing->city}} {{$listing->state}} {{$listing->zipcode}}</h5>
                                <div class="d-flex flex-row user-ratings">
                                    <h6 class="text-muted ml-1">Rent: ${{$listing->rent}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="image"> <a href="http://maps.google.com/maps?q=24.197611,120.780512"> <img src="{{ asset('img/New-Google-Maps-Logo.png') }}" width="100"> <p>Get Directions</p> </a> </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2"> <span>Built in: {{$listing->yearbuilt}}</span>
                        <div class="colors"> <span></span> <span></span> <span></span> <span></span> </div>
                    </div>
                    <p>{{$listing->description}}</p> <button class="btn btn-danger">Rent</button>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
