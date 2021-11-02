@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>

    {{-- table --}}
    <div class="d-flex justify-content-center">
        <div class="card w-75">
            @if (session()->has('message'))
                <div class="alert alert-success text-center rounded-0">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message') }}
                </div>
            @endif

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center ">
                    <form method="GET" action="{{ route('countries.index') }}">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control" id="inlineFormInput"
                                    placeholder="Japan">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('countries.create') }}" class="btn btn-primary">Create</a>
                </div>

            </div>
            <div class="table-responsive">
                <table class="card-table table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Country Code</th>
                            <th scope="col">Country Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                            <tr>
                                <th scope="row">{{ $country->id }}</th>
                                <td>{{ $country->country_code }}</td>
                                <td>{{ $country->name }}</td>
                                <td>
                                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-success">Edit</a>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
