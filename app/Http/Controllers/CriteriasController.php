<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\criterias;
use Illuminate\Http\Request;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CriteriasController extends Controller
{

    /**
     * Display a listing of the criterias.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $criteriasObjects = criterias::paginate(25);

        return view('criterias.index', compact('criteriasObjects'));
    }

    /**
     * Show the form for creating a new criterias.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('criterias.create');
    }

    /**
     * Store a new criterias in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'criterias', 'length' => 3, 'prefix' =>'C']);
            $data['id']=$id;
            
            
            criterias::create($data);

            return redirect()->route('criterias.criterias.index')
                ->with('success_message', 'Criterias was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified criterias.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $criterias = criterias::findOrFail($id);

        return view('criterias.show', compact('criterias'));
    }

    /**
     * Show the form for editing the specified criterias.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $criterias = criterias::findOrFail($id);
        

        return view('criterias.edit', compact('criterias'));
    }

    /**
     * Update the specified criterias in the storage.
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
            
            $criterias = criterias::findOrFail($id);
            $criterias->update($data);

            return redirect()->route('criterias.criterias.index')
                ->with('success_message', 'Criterias was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified criterias from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $criterias = criterias::findOrFail($id);
            $criterias->delete();

            return redirect()->route('criterias.criterias.index')
                ->with('success_message', 'Criterias was successfully deleted.');
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
                'name' => 'required|string|min:1|max:30', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
