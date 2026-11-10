<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'plate_number' => 'required|string|max:15|unique:vehicles',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:80',
            'vehicle_type' => 'required|string|max:50',
            'color' => 'required|string|max:30',
            'capacity' => 'required|integer',
            'daily_rate' => 'required|numeric',
        ],
        [
            'plate_number.required' => 'El campo de número de placa es obligatorio.',
            'plate_number.unique' => 'El número de placa ya está en uso.',
            'plate_number.max' => 'El número de placa no puede tener más de 15 caracteres.',
            'brand.required' => 'El campo de marca es obligatorio.',
            'brand.max' => 'El campo de marca no puede tener más de 50 caracteres.',
            'model.required' => 'El campo de modelo es obligatorio.',
            'model.max' => 'El campo de modelo no puede tener más de 80 caracteres.',
            'vehicle_type.required' => 'El campo de tipo de vehículo es obligatorio.',
            'vehicle_type.max' => 'El campo de tipo de vehículo no puede tener más de 50 caracteres.',
            'color.required' => 'El campo de color es obligatorio.',
            'color.max' => 'El campo de color no puede tener más de 30 caracteres.',
            'capacity.required' => 'El campo de capacidad es obligatorio.',
            'capacity.integer' => 'El campo de capacidad debe ser un número entero.',
            'daily_rate.required' => 'El campo de tarifa diaria es obligatorio.',
            'daily_rate.numeric' => 'El campo de tarifa diaria debe ser un número.',
        ]);

        $vehicle = Vehicle::create($validate);
        return redirect()->route('vehicles.index')->with('status', 'Vehicle creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
                $validate = $request->validate([
            'plate_number' => 'required|string|max:15|unique:vehicles',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:80',
            'vehicle_type' => 'required|string|max:50',
            'color' => 'required|string|max:30',
            'capacity' => 'required|integer',
            'daily_rate' => 'required|numeric',
        ],
        [
            'plate_number.required' => 'El campo de número de placa es obligatorio.',
            'plate_number.unique' => 'El número de placa ya está en uso.',
            'plate_number.max' => 'El número de placa no puede tener más de 15 caracteres.',
            'brand.required' => 'El campo de marca es obligatorio.',
            'brand.max' => 'El campo de marca no puede tener más de 50 caracteres.',
            'model.required' => 'El campo de modelo es obligatorio.',
            'model.max' => 'El campo de modelo no puede tener más de 80 caracteres.',
            'vehicle_type.required' => 'El campo de tipo de vehículo es obligatorio.',
            'vehicle_type.max' => 'El campo de tipo de vehículo no puede tener más de 50 caracteres.',
            'color.required' => 'El campo de color es obligatorio.',
            'color.max' => 'El campo de color no puede tener más de 30 caracteres.',
            'capacity.required' => 'El campo de capacidad es obligatorio.',
            'capacity.integer' => 'El campo de capacidad debe ser un número entero.',
            'daily_rate.required' => 'El campo de tarifa diaria es obligatorio.',
            'daily_rate.numeric' => 'El campo de tarifa diaria debe ser un número.',
        ]);

        $vehicle->update($validate);
        return redirect()->route('vehicles.index')->with('status', 'Vehicle actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('status', 'Vehicle eliminado exitosamente!');
    }
}
