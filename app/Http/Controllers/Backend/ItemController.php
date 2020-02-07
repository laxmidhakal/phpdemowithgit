<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Item;
use App\Category;
use Validator;
use Auth;

class ItemController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function index()
    {
        $categories = Category::get();
        $items = Item::get();
        return view('backend.item.item', compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laxmi');
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
            'name' => 'required|unique:items',
            'sale_price' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/item')
        ->withErrors($validator)
        ->withInput();
        }
        $category_id = Input::get('category_id');
        $name = Input::get('name');
        $sale_price = Input::get('sale_price');
        $item = new Item;
        $item->category_id = $category_id;
        $item->sale_price = $sale_price;
        $item->name = $name;
        $item->created_by = Auth::user()->id;     
        $item->save();
        $request->session()->flash('alert-success', 'Item was successful added!');
        return redirect()->route('item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::where('id', $id)->get();
        return view('backend.item.item_show', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
       

        $items = Item::where('id', $id)->get();
         $categories = Category::where('id', $id)->get();
        return view('backend.item.item_edit', compact('items','id','categories','id'));
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
       
        $rules = array(
            'name' => 'required|unique:items',
            'sale_price' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/item')
        ->withErrors($validator)
        ->withInput();
        }
         $category_id = Input::get('category_id');
        

        $name = Input::get('name');
        $sale_price = Input::get('sale_price');
        $item = Item::find($id);
        $item->name = $name;
        $item->sale_price = $sale_price;
         $item->category_id = $category_id;


        $item->update();
        return redirect()->route('item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        $item->delete();
        return redirect()->route('item');
    }
     public function api()
    {
         $items = Item::get();
         
         return response()->json($items);
        
        
    }


    public function search(Request $request)
    {
       
    

    
    

    $search = Input::get ( 'search' );
    if($search != ""){
    $items = Item::where('name','LIKE','%'.$search.'%')->get();
        if (count ( $items ) > 0)
        return view('backend.item.item_search', compact('items','search'));
           
        else
            return view ( 'backend.item.item_search' )->withMessage ( 'No Details found. Try to search again !' );
    }
    return view ( 'backend.item.item_search' )->withMessage ( 'No Details found. Try to search again !' );


}

       
    
}
