@extends('layouts.main-layout')

@section('content')
    <main>
        <h1>{{ $pilot -> firstname }} {{ $pilot -> lastname }}</h1>
        <ul>
            <h2>Cars:</h2>
            @foreach ($pilot -> cars as $car)
                <li>
                    - {{ $car -> name}}
                </li>
            @endforeach
        </ul>
    </main>
@endsection