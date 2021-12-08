@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <form class="row g-3" method="GET">
            <div class="col-auto">
                <label for="exampleFormControlSelect1">Property For:</label>
                    <select class="form-control" id="propertyType" name="saletype">
                        <option value="">All</option>
                        <option value="rent">Rent</option>
                        <option value="sale">Sale</option>
                    </select>
            </div>
            <div class="col-auto">
                <label for="exampleFormControlSelect1">Property Type</label>
                    <select class="form-control" id="propertyType" name="proptype">
                        <option value="">All</option>
                        @foreach($mapping as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="col-auto">
                <label for="inlineFormInput">Price Range</label>
                <input type="number" class="form-control mb-2" id="inlineFormInput" name="minprice" placeholder="Min.">
                <input type="number" class="form-control" id="inlineFormInputGroup" name="maxprice" placeholder="Max.">
            </div>
            <div class="col-auto">
                <label for="inlineFormInput">Zipcode</label>
                <input type="text" class="form-control mb-2" id="inlineFormInput" name="zipcode" placeholder="85719">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Filter</button>
            </div>
        </form>
    </header>

    <div class="row justify-content-center">
        @foreach($listings as $listing)
            <div class="col-md-4" style="margin-top: 20px;">
            <div class="height d-flex justify-content-center align-items-center">
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="mt-2">
                            <h4 class="text-uppercase">Available for: {{ $listing->type }}</h4>
                            <div class="mt-5">
                                <h1 class="main-heading mt-0">{{ $mapping[$listing->propertytype] }}</h1>
                                <h5 class="text-uppercase mb-0">{{$listing->street}} {{$listing->city}} {{$listing->state}} {{$listing->zipcode}}</h5>
                                <div class="d-flex flex-row user-ratings">
                                    <h6 class="text-muted ml-1">{{ ($listing->type == "rent" ? "Rent" : "Price") }}: ${{$listing->price}}</h6>
                                </div>
                            </div>
                        </div>
                       <div class="image"> <a href="http://maps.google.com/maps?q={{ $listing->lat }},{{ $listing->lng }}" target="_blank"> <img src="{{ asset('img/gmaps.png') }}" height="50"> <p>Directions</p> </a> </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">
                        <span>Built in: {{$listing->yearbuilt}}</span>
                    </div>
                    <p>{{$listing->description}}</p> <button class="btn btn-danger">{{ ($listing->type == "rent" ? "Rent" : "Buy") }}</button>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
