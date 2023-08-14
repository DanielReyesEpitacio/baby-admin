<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CashClosure;
use App\Http\Requests\CashClosure\StoreRequest;

class CashClosureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cash_closures = CashClosure::with('user')->get();
        $totales = [
            "cash"=>CashClosure::sum('cash'),
            "rappi"=>CashClosure::sum('rappi'),
            "terminal"=>CashClosure::sum('terminal'),
            "expenses"=>CashClosure::sum('expenses'),
            "tips"=>CashClosure::sum('tips'),
        ];
        return view('index',compact('cash_closures','totales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        CashClosure::create($request->all());
        return redirect()->route('caja.create')->with('success','Registro guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function chartSales(){

        return view('chart');
    }

    public function filterView(){
        $users = User::all();
        return view('filter',compact('users'));
    }

    public function filter(Request $request){
        $cash_closures = CashClosure::getFilterSale($request);
        $totales = [
            "cash"=>$cash_closures->sum('cash'),
            "rappi"=>$cash_closures->sum('rappi'),
            "terminal"=>$cash_closures->sum('terminal'),
            "expenses"=>$cash_closures->sum('expenses'),
            "tips"=>$cash_closures->sum('tips'),
        ];
        return redirect()->route('filter-view')
        ->withInput($request->input())
        ->with('cash_closures', $cash_closures)
        ->with('totales', $totales);
        //return redirect()->route('filter-view')->with('cash_closures',$cash_closures);
    }

    public function saleDataset(){
        return response()->json(CashClosure::getSalesDataset());
    }
}
