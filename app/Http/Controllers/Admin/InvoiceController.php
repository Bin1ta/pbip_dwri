<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\InvoiceDoc;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Http\Request;

class InvoiceController extends BaseController
{
    public function index()
    {
        abort_if(
            Gate::denies('invoice_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $invoices = Invoice::latest()->get();
        return view('admin.invoice.index', compact('invoices'));
    }

    public function create()
    {
        abort_if(
            Gate::denies('invoice_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.invoice.create');
    }

    public function store(StoreInvoiceRequest $request)
    {

        abort_if(
            Gate::denies('invoice_create'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );

        $data = $request->validated();
        $data['user_id'] = auth()->id();

        // Create the invoice with the authenticated user's ID
        $invoice = Invoice::create($data);

        if ($request->has('docs')) {
            foreach ($request->file('docs') as $file) {
                // Store file
                $filePath = $file->store('docs', 'public');

                // Log and handle errors
                if (!$filePath) {
                    Log::error('Failed to store file: ' . $file->getClientOriginalName());
                    continue; // Skip this file if storage fails
                }

                // Save file information to the database
                $invoice->docs()->create([
                    'doc' => $filePath,
                ]);
            }
        }
        toast('Invoice Created Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }

    public function show(Invoice $invoice)
    {
        abort_if(
            Gate::denies('invoice_access'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        $invoice->load('docs');
        return view('admin.invoice.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        abort_if(
            Gate::denies('invoice_edit'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        return view('admin.invoice.create', compact('invoice'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        abort_if(
            Gate::denies('invoice_edit'),
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
            Gate::denies('invoice_delete'),
            ResponseAlias::HTTP_FORBIDDEN,
            '403 Forbidden | you are not allowed to access this resource'
        );
        foreach ($invoice->docs as $doc) {
            if (Storage::disk('public')->exists($doc->doc)) {
                Storage::disk('public')->delete($doc->doc);
            }
            $doc->delete();
        }

        $invoice->delete();
        toast('Invoice Deleted Successfully', 'success');
        return redirect(route('admin.invoice.index'));
    }

    public function deletePhoto(InvoiceDoc $invoiceDoc)
    {
            if (Storage::disk('public')->exists($invoiceDoc->doc)) {
                Storage::disk('public')->delete($invoiceDoc->doc);
            }
        $invoiceDoc->delete();

        toast('Invoice Document Deleted Successfully', 'success');
        return redirect()->back();
    }



}
