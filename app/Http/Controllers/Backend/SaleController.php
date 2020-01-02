<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Item;
use App\Customer;
use App\Sale;
use Validator;
use Auth;

class SaleController extends Controller
{
   public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function index()
    {
        $customers = Customer::get();
        $items = Item::get();
        $sales = Sale::get();
        return view('backend.sale.sale', compact('items','customers','sales'));

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'net_sale_price' => 'required|unique:sales',
            'date' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/sale')
        ->withErrors($validator)
        ->withInput();
        }
        $customer_id = Input::get('customer_id');
        $item_id = Input::get('item_id');
        $net_sale_price = Input::get('net_sale_price');
        $date = Input::get('date');
        $sale = new Sale;
        $sale->customer_id = $customer_id;
        $sale->item_id = $item_id;
        $sale->net_sale_price = $net_sale_price;
        $sale->date = $date;
        $sale->created_by = Auth::user()->id;     
        $sale->save();
        $request->session()->flash('alert-success', 'sale was successful added!');
        //var_dump( $net_sale_price);die();
        return redirect()->route('sale');
        
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
   
    public function getItemPrice(){
        $item_id = Input::get('item_id');
// var_dump($item_id); die();
        $items = Item::where('id', $item_id)->get();
        return Response()->json($items);
    }

    

}
