<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Category;
use App\Item;
use DB;
use Validator;
use Auth;


class CategoryController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }
    public function index()
    {
        
        $categories = Category::orderBy('id','DESC')->get();
        $count=count('$categories');
       
        return view('backend.category', compact(['categories','count']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category');
         
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
            'name' => 'required|unique:categories',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/category')
        ->withErrors($validator)
        ->withInput();
        }
       
        
        $names = Input::get('name');
        $name = Str::ucfirst($names);
        $category = new Category;
        $category->name = $name;
        $category->created_by = Auth::user()->id;
        $category->save();
        //var_dump($name); die();

        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where('id', $id)->get();
        return view('backend.category_show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $categories = Category::where('id', $id)->get();
        return view('backend.category_edit', compact('categories','id'));
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
            'name' => 'required|unique:categories',
            
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
        return redirect('/home/category')
        ->withErrors($validator)
        ->withInput();
        }

        $name = Input::get('name');
        $category = Category::find($id);
        $category->name = $name;
        $category->update();
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category');
    }
    public function viewcat($id){
        $catedetail = Item::where('category_id', $id)->get();
        return view('backend.category_detail', compact('catedetail'));
    }
}
