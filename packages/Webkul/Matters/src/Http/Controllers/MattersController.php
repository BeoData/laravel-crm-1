<?php

namespace Webkul\Matters\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Webkul\Matters\DataGrids\MattersDataGrid;
use Webkul\Matters\Models\Matters;

class MattersController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(MattersDataGrid::class)->toJson();
        }

        return view('matters::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('matters::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'number' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:open,pending,closed',
            'person_id' => 'nullable|exists:persons,id',
            'organisation_id' => 'nullable|exists:organizations,id',
            'assigned_to' => 'nullable|exists:users,id',
            'start_date' => 'nullable|date',
            'close_date' => 'nullable|date',
        ]);
        $matter = Matters::create($validatedData);

        return redirect()->route('admin.matters.index')->with('success', 'Matter created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Implementacija
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // Implementacija
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Logika za brisanje
        $matter = Matters::findOrFail($id);
        $matter->delete();
    
        return redirect()->route('admin.matters.index')->with('success', 'Matter deleted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        // Implementacija
    }

    public function massDelete(Request $request)
    {
        $ids = $request->input('ids'); // Dohvati selektovane ID-ove
    
        if ($ids) {
            // Validiraj da su svi ID-ovi brojevi
            if (is_array($ids) && count($ids) > 0 && collect($ids)->every(fn($id) => is_numeric($id))) {
                // Masovno brisanje stavki
                Matter::destroy($ids);
                return redirect()->route('admin.matters.index')->with('success', 'Matters deleted successfully');
            }
            return redirect()->route('admin.matters.index')->with('error', 'Invalid data provided');
        }
    
        return redirect()->route('admin.matters.index')->with('error', 'No matters selected for deletion');
    }
    
}
