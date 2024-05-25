<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\housings_materialtypes;
use Illuminate\Http\Request;
use Exception;

class HousingsMaterialtypesController extends Controller
{

    /**
     * Display a listing of the housings materialtypes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsMaterialtypesObjects = housings_materialtypes::paginate(25);

        return view('housings_materialtypes.index', compact('housingsMaterialtypesObjects'));
    }

    /**
     * Show the form for creating a new housings materialtypes.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('housings_materialtypes.create');
    }

    /**
     * Store a new housings materialtypes in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_materialtypes::create($data);

            return redirect()->route('housings_materialtypes.housings_materialtypes.index')
                ->with('success_message', 'Housings Materialtypes was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings materialtypes.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsMaterialtypes = housings_materialtypes::findOrFail($id);

        return view('housings_materialtypes.show', compact('housingsMaterialtypes'));
    }

    /**
     * Show the form for editing the specified housings materialtypes.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsMaterialtypes = housings_materialtypes::findOrFail($id);
        

        return view('housings_materialtypes.edit', compact('housingsMaterialtypes'));
    }

    /**
     * Update the specified housings materialtypes in the storage.
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
            
            $housingsMaterialtypes = housings_materialtypes::findOrFail($id);
            $housingsMaterialtypes->update($data);

            return redirect()->route('housings_materialtypes.housings_materialtypes.index')
                ->with('success_message', 'Housings Materialtypes was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings materialtypes from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsMaterialtypes = housings_materialtypes::findOrFail($id);
            $housingsMaterialtypes->delete();

            return redirect()->route('housings_materialtypes.housings_materialtypes.index')
                ->with('success_message', 'Housings Materialtypes was successfully deleted.');
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
                'type' => 'required|string|min:1|max:20',
            'information' => 'required|string|min:1|max:30', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
