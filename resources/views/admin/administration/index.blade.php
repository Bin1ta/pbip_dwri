@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ $title?->label() }}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.administration.create', $title?->value) }}"
                   class="btn btn-primary float-end"> {{ $title?->label() }} थप्नुहोस</a>
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
                            <th>शिर्षक</th>
                            <th>मिति</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($administrations as $administration)
                            <tr class="text-center">
                                <td>{{ $administration->title }}</td>
                                <td>{{ $administration->date }}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.administration.edit', [$title?->value,$administration]) }}"
                                           class="text-info mx-2">
                                            <i class="lni lni-pencil"></i>
                                        </a>

                                        <a href="{{ route('admin.administration.show', [$title?->value,$administration]) }}"
                                           class="text-success mx-2">
                                            <i class="lni lni-eye"></i>
                                        </a>
                                        <form
                                            action="{{ route('admin.administration.destroy', [$title?->value,$administration]) }}"
                                            method="POST" class="d-inline">
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
