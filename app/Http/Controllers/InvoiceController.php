<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        return view('invoices.index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $items = Item::all();
        $clients = Client::all();

        if($request->ajax()){
             return response()->json([
                'items' => $items
            ]);
        }
        
        return view('invoices.create',compact('items','clients'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {

        $invoice = Invoice::create($request->all()+[            
            'invoice_date'=>Carbon::now('America/Lima'),
        ]);

       
        foreach ($request->item_id as $key => $product) {
            $results[] = [
                "item_id" => $request->item_id[$key],
                "quantity" => $request->quantity[$key],
                "price" => $request->price[$key],
            ];
        }
        $invoice->invoiceDetails()->createMany($results);

        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
