@extends('layouts.main-layout')

@section('content')
    <main>
        <h1>New Car</h1>
        <form method="POST" action="{{ route('store') }}">

            @csrf
            @method('POST')

            <div class="form">
                <label for="name">Name: </label>
                <br>
                <input type="text" id="name" name="name">
            </div>
            <div class="form">
                <label for="model">Model: </label>
                <br>
                <input type="text" id="model" name="model">
            </div>
            <div class="form">
                <label for="kw">kW: </label>
                <br>
                <input type="number" id="kw" name="kw">
            </div>
            <div class="form">
                <label for="brand_id">Brand: </label>
                <select name="brand_id" id="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand -> id }}">
                            {{ $brand -> name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <p>Pilots:</p>
            <div class="form-check checkbox">
                @foreach ($pilots as $pilot)
                    <span class="checkbox">
                        <input type="checkbox" id="pilot_id[]" name="pilot_id[]" value="{{ $pilot -> id }}">
                        <label for="pilot_id[]">{{ $pilot -> firstname }} {{ $pilot -> lastname }}</label>
                    </span>
                <br>
                @endforeach
            </div>

            <button type="submit" class="btn">
                Create
            </button>
        </form>
    </main>
@endsection