<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\units;
use Illuminate\Http\Request;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UnitsController extends Controller
{

    /**
     * Display a listing of the units.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $unitsObjects = units::paginate(25);

        return view('units.index', compact('unitsObjects'));
    }

    /**
     * Show the form for creating a new units.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('units.create');
    }

    /**
     * Store a new units in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'units', 'length' => 3, 'prefix' =>'U']);
            $data['id']=$id;
            
            units::create($data);

            return redirect()->route('units.units.index')
                ->with('success_message', 'Units was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified units.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $units = units::findOrFail($id);

        return view('units.show', compact('units'));
    }

    /**
     * Show the form for editing the specified units.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $units = units::findOrFail($id);
        

        return view('units.edit', compact('units'));
    }

    /**
     * Update the specified units in the storage.
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
            
            $units = units::findOrFail($id);
            $units->update($data);

            return redirect()->route('units.units.index')
                ->with('success_message', 'Units was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified units from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $units = units::findOrFail($id);
            $units->delete();

            return redirect()->route('units.units.index')
                ->with('success_message', 'Units was successfully deleted.');
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
                'name' => 'required|string|min:1|max:15', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
