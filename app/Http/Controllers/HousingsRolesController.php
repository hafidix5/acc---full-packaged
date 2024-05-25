<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\housings_roles;
use Illuminate\Http\Request;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class HousingsRolesController extends Controller
{

    /**
     * Display a listing of the housings roles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsRolesObjects = housings_roles::paginate(25);

        return view('housings_roles.index', compact('housingsRolesObjects'));
    }

    /**
     * Show the form for creating a new housings roles.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('housings_roles.create');
    }

    /**
     * Store a new housings roles in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'housings_roles', 'length' => 5, 'prefix' =>'R-']);
            $data['id']=$id;
            housings_roles::create($data);

            return redirect()->route('housings_roles.housings_roles.index')
                ->with('success_message', 'Housings Roles was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings roles.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsRoles = housings_roles::findOrFail($id);

        return view('housings_roles.show', compact('housingsRoles'));
    }

    /**
     * Show the form for editing the specified housings roles.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsRoles = housings_roles::findOrFail($id);
        

        return view('housings_roles.edit', compact('housingsRoles'));
    }

    /**
     * Update the specified housings roles in the storage.
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
            
            $housingsRoles = housings_roles::findOrFail($id);
            $housingsRoles->update($data);

            return redirect()->route('housings_roles.housings_roles.index')
                ->with('success_message', 'Housings Roles was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings roles from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsRoles = housings_roles::findOrFail($id);
            $housingsRoles->delete();

            return redirect()->route('housings_roles.housings_roles.index')
                ->with('success_message', 'Housings Roles was successfully deleted.');
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
            'name' => 'required|string|min:1|max:30', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
