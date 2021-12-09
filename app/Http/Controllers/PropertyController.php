<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Request;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(session('user') == null){
            return redirect('/login');
        }
    }


    public function buyProperty(Request $request)
    {
        if(session('user') == null){
            return redirect('/login');
        }

        $ownerid = DB::table('properties')->where('propid', $request->propid)->value('ownedby');

        $agentid = DB::table('buyers')->where('buyerid', session('user')->userid)->value('agentid');

        if($agentid == null){
            print_r('agentid is null');

            $agentid = DB::table('agents')->first()->agentid;

            DB::table('buyers')->insert(
                ['buyerid' => session('user')->userid, 'agentid' => $agentid]
            );
        }


        DB::table('contracts')->insert(
            ['listid' => $request->listid, 'type' => 'S', 'amount' => $request->price, 'signdate' => date('Y-M-d')]
        );

        $contractid = DB::table('contracts')->where('listid', $request->listid)->where('type', 'S')->where('signdate', date('Y-M-d'))->first()->contractid;

        DB::table('sale_contracts')->insert(
            ['contractid' => $contractid, 'agentid' => $agentid, 'ownerid' => $ownerid, 'buyerid' => session('user')->userid]
        );

        return redirect('/contracts');
    }


    public function rentProperty(Request $request)
    {
        if(session('user') == null){
            return redirect('/login');
        }

        $ownerid = DB::table('properties')->where('propid', $request->propid)->value('ownedby');

        DB::table('contracts')->insert(
            ['listid' => $request->listid, 'type' => 'R', 'amount' => $request->price, 'signdate' => date('Y-M-d')]
        );

        $contractid = DB::table('contracts')->where('listid', $request->listid)->where('type', 'S')->where('signdate', date('Y-M-d'))->first()->contractid;

        DB::table('rental_contracts')->insert(
            ['contractid' => $contractid, 'agentid' => $agentid, 'urmanagerid' => $ownerid, 'lesseeid' => session('user')->userid]
        );

        return redirect('/contracts');
    }


    public function getContracts()
    {
        if(session('user') == null){
            return redirect('/login');
        }

        $sale_contracts = DB::table('sale_contracts_view')->where('buyerid', session('user')->userid)->get();


        return view('contracts', ['sale_contracts' => $sale_contracts, 'rent_contracts' => null]);
    }

}