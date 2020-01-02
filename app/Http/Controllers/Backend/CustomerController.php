<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Category;
use App\Item;
use App\Customer;
use App\Sale;
use Validator;
use Auth;
use DB;

class CustomerController extends Controller
{
     public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function index()
    {
        $customers = Customer::get();
        return view ('backend.customer.customer', compact('customers'));

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
        $name = Input::get('name');
        $business_name = Input::get('business_name');
        $address = Input::get('address');
        $phone = Input::get('phone');
        $customer = new Customer;
        $customer->name = $name;
        $customer->business_name = $business_name;
        $customer->address = $address;
        $customer->phone = $phone;
        $customer->created_by = Auth::user()->id;     
        $customer->save();
        $request->session()->flash('alert-success', 'customer was successful added!');
        return redirect()->route('customer');
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
    public function viewcat($id){

        $catedetail = Sale::where('customer_id', $id)->get();
        

       
        
       


        return view('backend.customer.customer_detail', compact('catedetail'));
    }
}
