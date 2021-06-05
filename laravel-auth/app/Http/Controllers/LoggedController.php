<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use App\Car;
use App\Pilot;

class LoggedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {

        $brands = Brand::all();
        $pilots = Pilot::all();

        return view('pages.create', compact('brands', 'pilots'));
    }
    public function store(Request $request) {

        $validate = $request -> validate([
            'name' => 'required|string|min:3',
            'model' => 'required|string|min:3',
            'kw' => 'required|integer|min:10|max:2000',
            'brand_id' => 'required|exists:App\Brand,id|integer',
            'pilot_id.*' => 'required_if:current,1|distinct|exists:App\Pilot,id|integer'
        ]);

        $brand = Brand::findOrFail($request -> get('brand_id'));

        $car = Car::make($validate);
        $car -> brand() -> associate($brand);
        $car -> save();

        $car -> pilots() -> attach($request -> get('pilot_id'));
        $car -> save();

        return redirect() -> route('index');
    }

    public function edit($id) {

        $brands = Brand::all();
        $car = Car::findOrFail($id);
        $pilots = Pilot::all();

        return view('pages.edit', compact('brands', 'car', 'pilots'));
    }
    public function update(Request $request, $id) {

        $validate = $request -> validate([
            'name' => 'required|string|min:3',
            'model' => 'required|string|min:3',
            'kw' => 'required|integer|min:10|max:2000',
            'brand_id' => 'required|exists:App\Brand,id|integer',
            'pilot_id.*' => 'required_if:current,1|distinct|exists:App\Pilot,id|integer'
        ]);

        $car = Car::findOrFail($id);
        $car -> update($validate);

        $car -> brand() -> associate($request -> brand_id);
        $car -> save();

        $car -> pilots() -> sync($request -> pilot_id);

        return redirect() -> route('index');
    }

    public function delete($id) {

        $car = Car::findOrFail($id);

        $car -> deleted = true;
        $car -> save();

        return redirect() -> route('index');
    }
}
