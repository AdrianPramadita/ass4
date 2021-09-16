<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\Income;
use App\Models\Resource;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $incomes = Income::orderBy('date_income', 'desc')->paginate(10);
        $total_incomes = Income::count();

        return view('income.index', compact('incomes', 'total_incomes'));

        // $incomes = Income::with('resources')->paginate(10);
        // return view('income.index', compact('incomes'));
        // $incomes = DB::table('incomes')->get();
        // $incomes = Income::all();
        // return view('income.index', ['incomes' => $incomes]);
    }

    public function searchIncome(Request $request)
    {
        $sort = $request->search;
        $incomes = Income::where('date_income', 'like', "%" . $sort . "%")
                    ->paginate(10);

        $incomes -> withPath('income');
        $incomes -> appends($request->all());
        
        return view('income.index', compact('incomes', 'sort' ))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    
    public function paginateIncome(Request $request)
    {
        $incomes = Income::query();

        if($keyword = $request->input('s')){
            $incomes->whereRaw("name_product LIKE '%" . $keyword . "%'" )
                ->orWhereRaw("total LIKE '%" . $keyword . "%'")
                ->orWhereRaw("date_income LIKE '%" . $keyword . "%'");
        }

        $perPage = 10;
        $page = $request->input('page', 1);
        $total = $incomes->count();

        $result = $incomes->offset(($page - 1) * $perPage)->limit($perPage)->get();

        return[
            'data' => $result,
            'total' => $total,
            'page' => $page,
            'last_page' => ceil($total / $perPage)
        ];

        return view('income.index', compact('incomes', 'keyword'));


        // $keyword = $request->search;
        // $incomes = Income::where('date_income', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('quantity', 'LIKE', '%' . $keyword . '%')
        //             ->orWhere('date_income', 'LIKE', '%' . $keyword . '%')
        //             ->paginate(10);

        // $incomes->withPath('incomes');
        // $incomes->appends($request->all());
        // return view('income.index', compact('incomes', 'keyword'));
        // // return view('income.index', compact('incomes', 'keyword' ))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resources = Resource::all();
        return view('income.add', compact('resources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_income' => 'required',
            'month_income' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'resource_id' => 'required'
        ],
        [
            'date_income.required' => 'Tidak Boleh Kosong',
            'name_product.required' => 'Tidak Boleh Kosong',
            'quantity.required' => 'Tidak Boleh Kosong',
            'total.required' => 'Tidak Boleh Kosong',
            'resource_id.required' => 'Tidak Boleh Kosong'

        ]
        );
        Income::create([
            'date_income' => $request->date_income,
            'name_product' => $request->name_product,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'resource_id' => $request->resource_id,
        ]);

        return redirect('income')->with('status', 'Successfully added Income');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        $income->makeHidden(['resource_id']);
        return view('income.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $resources = Resource::all();
        return view('income.edit', compact('income', 'resources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $request->validate([
            'date_income' => 'required',
            'total' => 'required',
            'resource_id' => 'required'
        ],
        [
            'date_income.required' => 'Tidak Boleh Kosong',
            'total.required' => 'Tidak Boleh Kosong',
            'resource_id.required' => 'Tidak Boleh Kosong'

        ]
        );
                // cara pertama
                $income->date_income = $request->date_income;
                $income->total = $request->total;
                $income->resource_id = $request->resource_id;
                $income->save();
        
                //cara kedua (mass assignment)
                Income::where('id', $income->id)
                ->update([
                    'date_income' => $request->date_income,
                    'total' => $request->total,
                    'resource_id' => $request->resource_id,
                ]);
        
                return redirect('income')->with('status', 'Successfully Update Income');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //cara 1
        // $spending->delete();

        // cara 2
        // Spending::destroy($spending->id);

        // cara 3
        Income::where('id', $income->id)->delete();

        return redirect('income')->with('status', 'Successfully delete data');
    }
}
