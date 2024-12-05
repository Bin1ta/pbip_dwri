<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Http\Request;

class InvoiceController extends BaseController
{
    public function index()
    {
        abort_if(
            Gate::denies('registration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $invoices = Invoice::latest()->get();
        return view('admin.invoice.index',compact('invoices'));
    }

    public function create()
    {
         abort_if(
            Gate::denies('registration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.invoice.create');
    }

    public function store(StoreInvoiceRequest $request)
    {
        abort_if(
            Gate::denies('registration_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        Invoice::create($request->validated());
        toast('Invoice Created Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }

    public function show(Invoice $invoice)
    {
         abort_if(
            Gate::denies('registration_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.invoice.show',compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        abort_if(
            Gate::denies('registration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.invoice.create',compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        abort_if(
            Gate::denies('registration_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $invoice->update($request->validated());
        toast('Invoice Updated Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }

    public function destroy(Invoice $invoice)
    {
        abort_if(
            Gate::denies('registration_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $invoice->delete();
        toast('Invoice Deleted Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }
}
