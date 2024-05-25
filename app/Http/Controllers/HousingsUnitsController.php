<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\housings_units;
use Illuminate\Http\Request;
use Exception;

class HousingsUnitsController extends Controller
{

    /**
     * Display a listing of the housings units.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsUnitsObjects = housings_units::paginate(25);

        return view('housings_units.index', compact('housingsUnitsObjects'));
    }

    /**
     * Show the form for creating a new housings units.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('housings_units.create');
    }

    /**
     * Store a new housings units in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_units::create($data);

            return redirect()->route('housings_units.housings_units.index')
                ->with('success_message', 'Housings Units was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings units.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsUnits = housings_units::findOrFail($id);

        return view('housings_units.show', compact('housingsUnits'));
    }

    /**
     * Show the form for editing the specified housings units.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsUnits = housings_units::findOrFail($id);
        

        return view('housings_units.edit', compact('housingsUnits'));
    }

    /**
     * Update the specified housings units in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $housingsUnits = housings_units::findOrFail($id);
            $housingsUnits->update($data);

            return redirect()->route('housings_units.housings_units.index')
                ->with('success_message', 'Housings Units was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings units from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsUnits = housings_units::findOrFail($id);
            $housingsUnits->delete();

            return redirect()->route('housings_units.housings_units.index')
                ->with('success_message', 'Housings Units was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'required|string|min:1|max:6',
            'information' => 'required|string|min:1|max:30', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
