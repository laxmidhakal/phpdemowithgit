<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;


class LiveSearch extends Controller
{
     function index()
    {
     return view('live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data =  Item::where('name', 'like', '%'.$query.'%')
         ->orWhere('sale_price', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
        
         
      }
      else
      {
       $data = Item::get();
        

      }

      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->sale_price.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
