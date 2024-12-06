@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>चलानी</h2>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.invoice.create') }}" class="btn btn-primary float-end">Add Invoice</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="table-wrapper table-responsive table-hover">
                    <table class="table">
                        <thead class="bg-light text-center">
                        <tr>
                            <th>चलानी नं.</th>
                            <th>मिति</th>
                            <th>पत्र संख्या</th>
                            <th>पत्र पाउने व्यक्ति वा कार्यालयको नाम, ठेगाना</th>
                            <th>पठाएको साधन</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invoices as $invoice)
                            <tr class="text-center">
                                <td>{{ $invoice->invoice_no }}</td>
                                <td>{{ $invoice->date }}</td>
                                <td>{{ $invoice->letter_count }}</td>
                                <td>{{ $invoice->rec_name }}</td>
                                <td>{{ $invoice->deliver_type }}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{route('admin.invoice.edit', $invoice)}}" class="text-info mx-2">
                                            <i class="lni lni-pencil"></i>
                                        </a>

                                        <a href="{{ route('admin.invoice.show', $invoice) }}"
                                           class="text-success mx-2">
                                            <i class="lni lni-eye"></i>
                                        </a>
                                        <form action="{{route('admin.invoice.destroy',$invoice)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-danger show_confirm" type="submit">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
