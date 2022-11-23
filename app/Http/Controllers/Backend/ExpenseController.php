<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $expenseCategories = ExpenseCategory::orderBy('id','desc')->get();
        $expenses = Expense::orderBy('id','desc')->get();
        return view('backend.expense.index',compact('expenses','expenseCategories'));
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
        $request->validate([
            'name'                  => 'required',
            'expenseCategory_id'    => 'required',
            'amount'                => 'required',
        ]);

       Expense::create([
        'name'                  => $request->name,
        'expense_category_id'   => $request->expenseCategory_id,
        'amount'                => $request->amount,
        'description'           => $request->description
       ]);

       notify()->success('Expense added successfully');
       return redirect()->route('app.expense.index');
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
        $expense = Expense::with('expenseCategory')->findOrfail($id);
        return response()->json($expense);
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
        $request->validate([
            'name'                  => 'required',
            'expenseCategory_id'    => 'required',
            'amount'                => 'required',
        ]);

       Expense::findOrfail($request->expense_id)->update([
        'name'                  => $request->name,
        'expense_category_id'   => $request->expenseCategory_id,
        'amount'                => $request->amount,
        'description'           => $request->description
       ]);

       notify()->success('Expense updated successfully');
       return redirect()->route('app.expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrfail($id);
        $expense->delete();
        return response()->json($expense);
    }
}
