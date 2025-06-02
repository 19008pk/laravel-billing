<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the per‑page value from the query string, or default to 10
        $perPage = (int) $request->input('perpage', 10);

        $units = Unit::paginate($perPage)
            ->withQueryString();

        return view('units.index', compact('units', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
        Unit::create($request->validated());
        return redirect()->route('units.index')
            ->with('success', 'Unit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return view('units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->validated());

        return redirect()->route('units.index')
            ->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        // if ($unit->products()->exists()) {
        //     return redirect()->route('units.index')
        //         ->with('error', 'Unit cannot be deleted because it has associated products.');
        // }

        if ($unit->is_system) {
            return redirect()->route('units.index')
                ->with('error', 'System units cannot be deleted.');
        }

        $unit->delete();

        return redirect()->route('units.index')
            ->with('success', 'Unit deleted successfully.');
    }
}
