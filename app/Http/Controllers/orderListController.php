<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\listorder;
use App\Models\Resource;

class orderListController extends Controller
{
    public function index()
    {

        $listorders = listorder::orderBy('date_order', 'desc')->paginate(10);
        $total_orders = listorder::count();

        return view('orderlist.index', compact('listorders', 'total_orders'));

        // $incomes = Income::with('resources')->paginate(10);
        // return view('income.index', compact('incomes'));
        // $incomes = DB::table('incomes')->get();
        // $incomes = Income::all();
        // return view('income.index', ['incomes' => $incomes]);
    }

    public function searchOrder(Request $request)
    {
        $sort = $request->search;
        $listorders = listorder::where('date_order', 'like', "%" . $sort . "%")
                    ->paginate(10);

        $listorders -> withPath('orderlist');
        $listorders -> appends($request->all());
        return view('orderlist.index', compact('listorders', 'sort' ))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    
    public function paginateOrder(Request $request)
    {
        $listorders = listorder::query();

        if($keyword = $request->input('s')){
            $listorders->whereRaw("name_product LIKE '%" . $keyword . "%'" )
                ->orWhereRaw("total LIKE '%" . $keyword . "%'")
                ->orWhereRaw("date_income LIKE '%" . $keyword . "%'");
        }

        $perPage = 10;
        $page = $request->input('page', 1);
        $total = $listorders->count();

        $result = $listorders->offset(($page - 1) * $perPage)->limit($perPage)->get();

        return[
            'data' => $result,
            'total' => $total,
            'page' => $page,
            'last_page' => ceil($total / $perPage)
        ];

        return view('orderlist.index', compact('listorders', 'keyword'));


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
        return view('orderlist.add', compact('resources'));
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
            'date_order' => 'required',
            'month_income' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'resource_id' => 'required'
        ],
        [
            'date_order.required' => 'Tidak Boleh Kosong',
            'name_product.required' => 'Tidak Boleh Kosong',
            'quantity.required' => 'Tidak Boleh Kosong',
            'total.required' => 'Tidak Boleh Kosong',
            'resource_id.required' => 'Tidak Boleh Kosong'

        ]
        );
        listorder::create([
            'date_order' => $request->date_order,
            'name_product' => $request->name_product,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'resource_id' => $request->resource_id,
        ]);

        return redirect('orderlist')->with('status', 'Successfully added orderlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(listorder $listorders)
    {
        $listorders->makeHidden(['resource_id']);
        return view('orderlist.show', compact('listorders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(listorder $listorders)
    {
        $resources = Resource::all();
        return view('orderlist.edit', compact('listorders', 'resources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listorder $listorders)
    {
        $request->validate([
            'date_order' => 'required',
            'total' => 'required',
            'resource_id' => 'required'
        ],
        [
            'date_order.required' => 'Tidak Boleh Kosong',
            'total.required' => 'Tidak Boleh Kosong',
            'resource_id.required' => 'Tidak Boleh Kosong'

        ]
        );
                // cara pertama
                $listorders->date_order = $request->date_order;
                $listorders->total = $request->total;
                $listorders->resource_id = $request->resource_id;
                $listorders->save();
        
                //cara kedua (mass assignment)
                listorder::where('id', $listorders->id)
                ->update([
                    'date_order' => $request->date_order,
                    'total' => $request->total,
                    'resource_id' => $request->resource_id,
                ]);
        
                return redirect('orderlist')->with('status', 'Successfully Update orderlist');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(listorder $listorders)
    {
        //cara 1
        // $spending->delete();

        // cara 2
        // Spending::destroy($spending->id);

        // cara 3
        listorder::where('id', $listorders->id)->delete();

        return redirect('orderlist')->with('status', 'Successfully delete data');
    }
}
