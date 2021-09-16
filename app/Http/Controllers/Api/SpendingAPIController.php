<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpendingResource;
use App\Http\Resources\SpendingCollection;
use Illuminate\Http\Request;

use App\Models\Spending;

class SpendingAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spendings = Spending::all();

        // return IncomeResource::collection($incomes);
        return new SpendingCollection($spendings);
    }

    public function paginate(Request $request)
    {
        $query = Spending::query();

        if($keyword = $request->input('keyword')){
            $query->whereRaw("name_product LIKE '%" . $keyword . "%'" )
                ->orWhereRaw("quantity LIKE '%" . $keyword . "%'")
                ->orWhereRaw("date_income LIKE '%" . $keyword . "%'");
        }

        if ($query->fails())

        {
            return response()->json(['status_code'=>400, 'message'=>'Bad Reqest']);
        
        }


        $perPage = 10;
        $page = $request->input('page', 1);
        $total = $query->count();

        $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

        return[
            'data' => $result,
            'total' => $total,
            'page' => $page,
            'last_page' => ceil($total / $perPage)
        ];
        
        return response()->json([
            'status_code'=>200,
            'message'=> 'Show Data successfully'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spending = Spending::find($id);

        return new SpendingResource($spending);
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
}
