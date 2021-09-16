<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;


class DateRangeSpendingController extends Controller
{
    function index()
    {
     return view('spending.date_range');
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = DB::table('spendings')
         ->whereBetween('date_spending', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('spendings')->orderBy('date_spending')->get();
      }
      echo json_encode($data);
     }
    }
}
