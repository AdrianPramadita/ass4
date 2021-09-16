<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class DateRangeController extends Controller
{
    function index()
    {
     return view('income.date_range');
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = DB::table('incomes')
         ->whereBetween('date_income', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('incomes')->orderBy('date_income')->get();
      }
      echo json_encode($data);
     }
    }

}

?>



