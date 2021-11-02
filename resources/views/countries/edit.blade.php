@extends('layouts.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Country</h1>
    </div>

    {{-- table --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ 'Update Country' }}
                        <a href="{{ route('countries.index') }}" class="float-right">Back</a>
                    </div>

                    {{-- update --}}
                    <div class="card-body">
                        <form method="POST" action="{{ route('countries.update', $country->id) }}">
                            @csrf
                            @method('PUT')
                            {{-- country code --}}
                            <div class="form-group row">
                                <label for="country_code"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Country code') }}</label>

                                <div class="col-md-6">
                                    <input id="country_code" type="text"
                                        class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                                        value="{{ old('country_code', $country->country_code) }}"
                                        autocomplete="country_code" autofocus>

                                    @error('country_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- name --}}
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $country->name) }}" autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Country') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- delete user --}}
                <div>
                    <div class="mt-1 float-right">
                        <form method="POST" action="{{ route('countries.destroy', $country->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete {{ $country->name }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
