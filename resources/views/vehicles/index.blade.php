<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>

{{-- ALERTAS PARA MOSTRAR MENSAJES DE EXITO O ERROR --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



{{-- BOTON PARA AñADIR VEHICULOS --}}
<div>
                                <button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog"
                                    data-bs-target="#addvDialog">
                                    Add Vehicle
                                </button>


                                <dialog class="dialog dialog-scrollable" id="addvDialog">
                                    <div class="dialog-header">
                                        <h1 class="dialog-title">Add Vehicle</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="dialog-body">

                            <form action="{{ route('vehicles.store') }}" method="POST" id="addvDialog"
                                            style="display: inline;">
                                            @csrf
                                            {{-- LOS INPUTS EN DIALOGO de ADD VEHICLE --}}
                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Plate Number</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Unique plate number" value="{{ old('plate_number') }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Brand</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Vehicle brand" value="{{ old('brand') }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Model</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Vehicle model" value="{{ old('model') }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Vehicle Type</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Vehicle type" value="{{ old('vehicle_type') }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Color</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Vehicle color" value="{{ old('color') }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Capacity</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Vehicle capacity" value="{{ old('capacity') }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Daily Rate</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Daily rental rate" value="{{ old('daily_rate') }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Status</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Disponible" value="{{ old('status') }}">
                                            </div>

                                    </div>
                                    <div class="dialog-footer">
                                        <button type="button" class="btn-solid theme-secondary"
                                            data-bs-dismiss="dialog">Close</button>
                                        <button type="submit" class="btn-solid theme-primary">Save changes</button>
                      {{-- AQUI MI PROBLEMA, PQ NO SE GUARDA YO SE QUE LE HACE FALTA ALGO MAS AL BTN PERO NO ME ACUERDO --}}
                                    </div>
                                    </form>
                                </dialog>
                            </div>


{{-- TABLA CON BOTON PARA ACTUALIZAR Y ELIMINAR VEHICULOS --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Plate Number</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Vehicle Type</th>
                <th scope="col">Color</th>
                <th scope="col">Capacity</th>
                <th scope="col">Daily Rate</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehicles as $vehicle)
                <tr>
                    <th scope="row">{{ $vehicle->id }}</th>
                    <td>{{ $vehicle->plate_number }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->vehicle_type }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ $vehicle->capacity }}</td>
                    <td>${{ number_format($vehicle->daily_rate, 2) }}</td>
                    <td>{{ $vehicle->status }}</td>
                    <td>
                        <div class="btn-group btn-group-divider" role="group" aria-label="Basic example">
                            <div>
                                <button type="button" class="btn-solid theme-primary" data-bs-toggle="dialog"
                                    data-bs-target="#updatevehicle">
                                    Update
                                </button>

                                <dialog class="dialog dialog-scrollable" id="updatevehicle">
                                    <div class="dialog-header">
                                        <h1 class="dialog-title">Update Vehicle</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="dialog"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="dialog-body">

                                        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" id='updatevehicle'
                                            style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            {{-- LOS INPUTS EN DIALOGO --}}
                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Plate Number</label>
                                                <input type="text" class="form-control" id="fieldText"
                                                    placeholder="Unique plate number" value="{{ $vehicle->plate_number }}">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Brand</label>
                                                <input type="text" class="form-control" id="fieldText" value="{{ $vehicle->brand }}"
                                                    placeholder="Vehicle brand">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Model</label>
                                                <input type="text" class="form-control" id="fieldText" value="{{ $vehicle->model }}"
                                                    placeholder="Vehicle model">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Vehicle Type</label>
                                                <input type="text" class="form-control" id="fieldText" value="{{ $vehicle->vehicle_type }}"
                                                    placeholder="Vehicle type">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Color</label>
                                                <input type="text" class="form-control" id="fieldText" value="{{ $vehicle->color }}"
                                                    placeholder="Vehicle color">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Capacity</label>
                                                <input type="text" class="form-control" id="fieldText" value="{{ $vehicle->capacity }}"
                                                    placeholder="Vehicle capacity">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Daily Rate</label>
                                                <input type="text" class="form-control" id="fieldText" value="{{ $vehicle->daily_rate }}"
                                                    placeholder="Daily rental rate">
                                            </div>

                                            <div class="form-field">
                                                <label for="fieldText" class="form-label">Status</label>
                                                <input type="text" class="form-control" id="fieldText" value="{{ $vehicle->status }}"
                                                    placeholder="Disponible">
                                            </div>

                                    </div>
                                    <div class="dialog-footer">
                                        <button type="button" class="btn-solid theme-secondary"
                                            data-bs-dismiss="dialog">Close</button>
                                        <button type="submit" class="btn-solid theme-primary">Save changes</button>
                                                          {{-- AQUI MI PROBLEMA, PQ NO SE GUARDA YO SE QUE LE HACE FALTA ALGO MAS AL BTN PERO NO ME ACUERDO --}}
                                    </div>
                                    
                                    </form>
                                </dialog>
                            </div>
                                <div>
                                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-solid theme-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                        </div>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No vehicles found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
