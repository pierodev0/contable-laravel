<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use Illuminate\Support\Facades\File;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $items = Item::all();
        $clients = Client::all();

        if ($request->ajax()) {
            return response()->json([
                'items' => $items
            ]);
        }

        return view('invoices.create', compact('items', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {

        $invoice = Invoice::create($request->all());


        foreach ($request->item_id as $key => $item) {
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
        $subtotal = 0;
        $invoiceDetails = $invoice->invoiceDetails;
        foreach ($invoiceDetails as $invoiceDetail) {
            $subtotal += $invoiceDetail->quantity * $invoiceDetail->price;
        }
        return view('invoices.show', compact('invoice', 'invoiceDetails', 'subtotal'));
    }


    public function pdf(Invoice $invoice)
    {
        $subtotal = 0;
        $invoiceDetails = $invoice->invoiceDetails;
        foreach ($invoiceDetails as $invoiceDetail) {
            $subtotal += $invoiceDetail->quantity * $invoiceDetail->price;
        }

        $view =  view('invoices.pdf', compact('invoice', 'invoiceDetails', 'subtotal'))->render();
        $path = public_path("pdf_temp/");
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        Browsershot::html($view)
            ->margins(10, 10, 10, 10)
            ->format('A4')
            ->landscape()
            ->savePdf("$path{$invoice->invoice_code}.pdf");
        return response()->download("$path{$invoice->invoice_code}.pdf", "Factura-{$invoice->invoice_code}.pdf");
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

        if ($invoice->status == 'Por cobrar') {
            $invoice->update(['status' => 'Anulada']);
            return redirect()->back()->with('success', 'Factura anulada');
        }

        return redirect()->back();
    }
}
