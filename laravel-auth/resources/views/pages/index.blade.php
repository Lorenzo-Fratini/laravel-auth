@extends('layouts.main-layout')

@section('content')
    <main>
        <h1>Cars</h1>
        <a href="{{ route('create') }}" class="btn">New Car</a>
        @foreach ($cars as $car)
            <div class="car-group">
                <div class="car-title">
                    <h2>{{ $car -> name }}</h2>
                    <div class="icons">
                        <a href="{{ route('edit', $car -> id) }}">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{ route('delete', $car -> id) }}" class="red">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
                <p><i>({{ $car -> brand -> name }})</i></p>
                <ul>
                    @foreach ($car -> pilots as $pilot)
                        <li>
                            <a href="{{ route('show', $pilot -> id) }}">
                                {{ $pilot -> firstname }} {{ $pilot -> lastname }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </main>
@endsection