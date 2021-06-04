<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\Pilot;

class GuestController extends Controller
{
    public function index() {

        $cars = Car::where('deleted', false) -> get();

        return view('pages.index', compact('cars'));
    }

    public function show($id) {

        $pilot = Pilot::findOrFail($id);

        return view('pages.show', compact('pilot'));
    }
}
