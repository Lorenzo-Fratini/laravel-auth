@extends('layouts.main-layout')

@section('content')
    <main>
        <h1>Edit Car</h1>
        <form method="POST" action="{{ route('update', $car -> id) }}">

            @csrf
            @method('POST')

            <div class="form">
                <label for="name">Name: </label>
                <br>
                <input type="text" id="name" name="name" value="{{ $car -> name }}">
            </div>
            <div class="form">
                <label for="model">Model: </label>
                <br>
                <input type="text" id="model" name="model" value="{{ $car -> model }}">
            </div>
            <div class="form">
                <label for="kw">kW: </label>
                <br>
                <input type="number" id="kw" name="kw" value="{{ $car -> kw }}">
            </div>
            <div class="form">
                <label for="brand_id">Brand: </label>
                <select name="brand_id" id="brand_id">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand -> id }}"
                            @if ($car -> brand_id == $brand -> id)
                                selected
                            @endif
                            >
                            {{ $brand -> name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <p>Pilots:</p>
            <div class="form-check checkbox">
                @foreach ($pilots as $pilot)
                    <span class="checkbox">
                        <input type="checkbox" id="pilot_id[]" name="pilot_id[]" value="{{ $pilot -> id }}"
                        @foreach ($car -> pilots as $carPilot)
                            @if ($carPilot -> id == $pilot -> id)
                                checked
                            @endif
                        @endforeach

                        >
                        <label for="pilot_id[]">{{ $pilot -> firstname }} {{ $pilot -> lastname }}</label>
                    </span>
                <br>
                @endforeach
            </div>

            <button type="submit" class="btn">
                Update
            </button>
        </form>
    </main>
@endsection