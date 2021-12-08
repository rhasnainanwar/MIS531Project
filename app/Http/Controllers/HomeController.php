<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $mapping = [
            'H' => 'House',
            'A' => 'Apartment',
            'C' => 'Condo',
            'T' => 'Townhouse',
        ];

        
        $all_listings = DB::table('listings_sales_rentals_view');

        if($request->get('saletype') != ''){
            $saletype = $request->get('saletype');
            $all_listings = $all_listings->where('type', $saletype);
        }

        if($request->get('proptype') != ''){
            $proptype = $request->get('proptype');
            $all_listings = $all_listings->where('propertytype', $proptype);
        }

        if($request->get('zipcode') != ''){
            $zipcode = $request->get('zipcode');
            $all_listings = $all_listings->where('zipcode', $zipcode);
        }

        // if($request->get('minprice') != ''){
        //     $minprice = $request->get('minprice');
        //     $all_listings = $all_listings->where('price', '>=', $minprice);
        // }

        // if($request->get('maxprice') != ''){
        //     $maxprice = $request->get('maxprice');
        //     $all_listings = $all_listings->where('price', '<=', $maxprice);
        // }

        $all_listings = $all_listings->get();
            
        return view('listings', ['listings'=>$all_listings, 'mapping' => $mapping]);
    }
}
