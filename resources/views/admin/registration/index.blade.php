@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>दर्ता</h2>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.registration.create') }}" class="btn btn-primary float-end">Add Committee</a>
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
                            <th rowspan="2">दर्ता नं.</th>
                            <th rowspan="2">मिति</th>
                            <th colspan="2">प्राप्त पत्रको</th>
                            <th rowspan="2">पठाउने व्यक्ति वा कार्यालय</th>
                            <th rowspan="2">ठेगाना</th>
                            <th rowspan="2">विषय</th>
                            <th rowspan="2">बुझाउने शाखा</th>
                            <th rowspan="2">#</th>
                        </tr>
                        <tr>
                            <th>पत्र संख्या</th>
                            <th>मिति</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($registrations as $registration)
                            <tr class="text-center">
                                <td>{{ $registration->reg_no }}</td>
                                <td>{{ $registration->date }}</td>
                                <td>{{ $registration->letter_count }}</td>
                                <td>{{ $registration->rec_date }}</td>
                                <td>{{ $registration->sender_name }}</td>
                                <td>{{ $registration->address }}</td>
                                <td>{{ $registration->subject }}</td>
                                <td>{{ $registration->department }}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{route('admin.registration.edit', $registration)}}" class="text-info mx-2">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <form action="{{route('admin.registration.destroy',$registration)}}" method="POST">
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
