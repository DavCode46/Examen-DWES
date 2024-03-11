<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Category;

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
        $categories = Category::all();
        return view('vehicles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'make'=>'required|max:50',
            'model'=>'required|max:50',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,avif,webp|max:2048|nullable',
            'price'=>'nullable|numeric',
            'category_id'=>'required|exists:categories,id'
        ]);
        // dd($validated);
    
        // Agrega el user_id del usuario autenticado al arreglo validado
        $validated['user_id'] = auth()->id();

    
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public/images');
        }

    
        Vehicle::create($validated);
    
        return redirect()->route('vehicles.index')->with('success', 'Vehicle has been added');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $categories = Category::all();
        return view('vehicles.edit', compact('vehicle', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $validated = $request->validate([
            'make'=>'required|max:50',
            'model'=>'required|max:50',
            'photo'=>'nullable|image|mimes:jpeg,png,jpg,avif,webp|max:2048',
            'price'=>'nullable|numeric',
            'category_id'=>'required|exists:categories,id'
        ]);

        // dd($validated);

        if($request->hasFile('photo')) {
            Storage::delete($vehicle->photo);
            $validated['photo'] = $request->file('photo')->store('public/images');
        }

        $vehicle->update($validated);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle has been updated');
    }
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        Storage::delete($vehicle->photo);
        $vehicle->delete();

        return redirect('vehicles')->with('success', 'Vehicle has been deleted');
    }

    public function myVehicles()  {
        $vehicles = Vehicle::where('user_id', auth()->id())->get();
        return view('vehicles.myVehicles', compact('vehicles'));
    }
}
