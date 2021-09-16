<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\Spending;
use App\Models\Resource;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $spendings = DB::table('spendings')->get();
        // $spendings = Spending::paginate(10);
        // return view('spending.index', ['spendings' => $spendings]);
        // $spendings = Spending::with('resources')->paginate(10);    
        // return view('spending.index', compact('spendings'));
        $spendings = Spending::orderBy('date_spending', 'desc')->paginate(10);
        $total_spendings = Spending::count();

        return view('spending.index', compact('spendings', 'total_spendings'));


    }
    public function searchSpending(Request $request)
    {
        $keyword = $request->search;
        $spendings = Spending::where('date_spending', 'like', "%" . $keyword . "%")
                    ->paginate(10);

        $spendings -> withPath('spending');
        $spendings -> appends($request->all());

        return view('spending.index', compact('spendings'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resources = Resource::all();
        return view('spending.add', compact('resources'));
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
            'date_spending' => 'required',
            'total' => 'required',
            'resource_id' => 'required'
        ],
        [
            'date_spending.required' => 'Tidak Boleh Kosong',
            'total.required' => 'Tidak Boleh Kosong',
            'resource_id.required' => 'Tidak Boleh Kosong'

        ]
        );
        // return $request;

        //cara pertama
        // $spendings = new Spending;
        // $spendings->date_spending = $request->date_spending;
        // $spendings->total = $request->total;
        // $spendings->resource_id = $request->resource_id;
        // $spendings->save();

        //cara kedua (mass assignment)
        Spending::create([
            'date_spending' => $request->date_spending,
            'total' => $request->total,
            'resource_id' => $request->resource_id,
        ]);

        return redirect('spending')->with('status', 'Successfully added spending/cost');
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
    public function edit(Spending $spending)
    {
        $resources = Resource::all();
        return view('spending.edit', compact('spending', 'resources'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spending $spending)
    {
        // return $request;
        $request->validate([
            'date_spending' => 'required',
            'total' => 'required',
            'resource_id' => 'required'
        ],
        [
            'date_spending.required' => 'Tidak Boleh Kosong',
            'total.required' => 'Tidak Boleh Kosong',
            'resource_id.required' => 'Tidak Boleh Kosong'

        ]
        );

        // cara pertama
        $spending->date_spending = $request->date_spending;
        $spending->total = $request->total;
        $spending->resource_id = $request->resource_id;
        $spending->save();

        //cara kedua (mass assignment)
        Spending::where('id', $spending->id)
        ->update([
            'date_spending' => $request->date_spending,
            'total' => $request->total,
            'resource_id' => $request->resource_id,
        ]);

        return redirect('spending')->with('status', 'Successfully Update spending/cost');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spending $spending)
    {
        //cara 1
        // $spending->delete();

        // cara 2
        // Spending::destroy($spending->id);

        // cara 3
        Spending::where('id', $spending->id)->delete();

        return redirect('spending')->with('status', 'Successfully delete data');
    }
}
