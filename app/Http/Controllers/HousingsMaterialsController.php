<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HousingsMaterialtype;
use App\Models\HousingsUnit;
use App\Models\housings_materials;
use Illuminate\Http\Request;
use Exception;

class HousingsMaterialsController extends Controller
{

    /**
     * Display a listing of the housings materials.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsMaterialsObjects = housings_materials::with('housingsunit','housingsmaterialtype')->paginate(25);

        return view('housings_materials.index', compact('housingsMaterialsObjects'));
    }

    /**
     * Show the form for creating a new housings materials.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $HousingsUnits = HousingsUnit::pluck('id','id')->all();
$HousingsMaterialtypes = HousingsMaterialtype::pluck('id','id')->all();
        
        return view('housings_materials.create', compact('HousingsUnits','HousingsMaterialtypes'));
    }

    /**
     * Store a new housings materials in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_materials::create($data);

            return redirect()->route('housings_materials.housings_materials.index')
                ->with('success_message', 'Housings Materials was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings materials.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsMaterials = housings_materials::with('housingsunit','housingsmaterialtype')->findOrFail($id);

        return view('housings_materials.show', compact('housingsMaterials'));
    }

    /**
     * Show the form for editing the specified housings materials.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsMaterials = housings_materials::findOrFail($id);
        $HousingsUnits = HousingsUnit::pluck('id','id')->all();
$HousingsMaterialtypes = HousingsMaterialtype::pluck('id','id')->all();

        return view('housings_materials.edit', compact('housingsMaterials','HousingsUnits','HousingsMaterialtypes'));
    }

    /**
     * Update the specified housings materials in the storage.
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
            
            $housingsMaterials = housings_materials::findOrFail($id);
            $housingsMaterials->update($data);

            return redirect()->route('housings_materials.housings_materials.index')
                ->with('success_message', 'Housings Materials was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings materials from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsMaterials = housings_materials::findOrFail($id);
            $housingsMaterials->delete();

            return redirect()->route('housings_materials.housings_materials.index')
                ->with('success_message', 'Housings Materials was successfully deleted.');
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
                'category' => 'required|string|min:1|max:15',
            'units_id' => 'required',
            'grade' => 'required|string|min:1|max:15',
            'age_group' => 'required|numeric|string|min:1|max:15',
            'materia_types_id' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
