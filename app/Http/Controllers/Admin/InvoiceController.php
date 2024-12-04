<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends BaseController
{
    public function index()
    {
        $invoices = Invoice::latest()->get();
        return view('admin.invoice.index',compact('invoices'));
    }

    public function create()
    {
        return view('admin.invoice.create');
    }

    public function store(StoreInvoiceRequest $request)
    {
        Invoice::create($request->validated());
        toast('Invoice Created Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }

    public function show(Invoice $invoice)
    {
        return view('admin.invoice.show',compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('admin.invoice.create',compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());
        toast('Invoice Updated Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        toast('Invoice Deleted Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }
}
