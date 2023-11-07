<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movement\StoreRequest;
use App\Http\Requests\Movement\UpdateRequest;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Movement;
class MovementController extends Controller
{
    public function index()
    {
    
        $movements = Movement::orderBy('id', 'desc')->get();
        return view('movements.index',compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Invoice $invoice = null)
    {
        $categories = Category::get();
        $accounts = Account::get();
        return view('movements.create',compact('categories','accounts','invoice'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        if($request->invoice_code){
            $invoice = Invoice::where('invoice_code', $request->invoice_code)->first();

            if($invoice->status == "Por cobrar"){
                $invoice->status = "Cobrada";        
                $invoice->update();   
            }
        }
       

        Movement::create($request->all());

        return redirect()->route('movements.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movement $movement)
    {
        return view('movements.show',compact('movement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movement $movement)
    {
        $invoice = null;
        $categories = Category::get();
        $accounts = Account::get();
        return view('movements.edit',compact('movement','categories','accounts','invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Movement $movement)
    {
                  
        $movement->update($request->all());

        return redirect()->route('movements.index')->with('updated','Movimiento actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        if($movement->invoice != null){
           

            if($movement->invoice->status == "Cobrada"){
                $movement->invoice->status = "Por cobrar";        
                $movement->invoice->update();   
            }
        }
        $movement->delete();
        return redirect()->route('movements.index')->with('success','ok');
    }
}
