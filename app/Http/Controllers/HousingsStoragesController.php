<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\housings_storages;
use Illuminate\Http\Request;
use Exception;

class HousingsStoragesController extends Controller
{

    /**
     * Display a listing of the housings storages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsStoragesObjects = housings_storages::paginate(25);

        return view('housings_storages.index', compact('housingsStoragesObjects'));
    }

    /**
     * Show the form for creating a new housings storages.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('housings_storages.create');
    }

    /**
     * Store a new housings storages in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_storages::create($data);

            return redirect()->route('housings_storages.housings_storages.index')
                ->with('success_message', 'Housings Storages was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings storages.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsStorages = housings_storages::findOrFail($id);

        return view('housings_storages.show', compact('housingsStorages'));
    }

    /**
     * Show the form for editing the specified housings storages.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsStorages = housings_storages::findOrFail($id);
        

        return view('housings_storages.edit', compact('housingsStorages'));
    }

    /**
     * Update the specified housings storages in the storage.
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
            
            $housingsStorages = housings_storages::findOrFail($id);
            $housingsStorages->update($data);

            return redirect()->route('housings_storages.housings_storages.index')
                ->with('success_message', 'Housings Storages was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings storages from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsStorages = housings_storages::findOrFail($id);
            $housingsStorages->delete();

            return redirect()->route('housings_storages.housings_storages.index')
                ->with('success_message', 'Housings Storages was successfully deleted.');
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
                'name' => 'required|string|min:1|max:20',
            'location' => 'required|string|min:1|max:20',
            'category' => 'required|string|min:1|max:20', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
