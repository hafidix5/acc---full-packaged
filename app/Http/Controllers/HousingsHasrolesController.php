<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\housings;
use App\Models\housings_roles;
use App\Models\housings_hasroles;
use Illuminate\Http\Request;
use Exception;

class HousingsHasrolesController extends Controller
{

    /**
     * Display a listing of the housings hasroles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsHasrolesObjects = housings_hasroles::with('housing','housingsrole','fromhousing','tohousing')->paginate(25);

        return view('housings_hasroles.index', compact('housingsHasrolesObjects'));
    }

    /**
     * Show the form for creating a new housings hasroles.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Housings = housings::pluck('name','id')->all();
$HousingsRoles = housings_roles::pluck('id','id')->all();
$fromHousings = housings::pluck('id','id')->all();
$toHousings = housings::pluck('id','id')->all();
        
        return view('housings_hasroles.create', compact('Housings','HousingsRoles','fromHousings','toHousings'));
    }

    /**
     * Store a new housings hasroles in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_hasroles::create($data);

            return redirect()->route('housings_hasroles.housings_hasroles.index')
                ->with('success_message', 'Housings Hasroles was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings hasroles.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsHasroles = housings_hasroles::with('housing','housingsrole','fromhousing','tohousing')->findOrFail($id);

        return view('housings_hasroles.show', compact('housingsHasroles'));
    }

    /**
     * Show the form for editing the specified housings hasroles.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsHasroles = housings_hasroles::findOrFail($id);
        $Housings = housings::pluck('name','id')->all();
$HousingsRoles = housings_roles::pluck('id','id')->all();
$fromHousings = housings::pluck('id','id')->all();
$toHousings = housings::pluck('id','id')->all();

        return view('housings_hasroles.edit', compact('housingsHasroles','Housings','HousingsRoles','fromHousings','toHousings'));
    }

    /**
     * Update the specified housings hasroles in the storage.
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
            
            $housingsHasroles = housings_hasroles::findOrFail($id);
            $housingsHasroles->update($data);

            return redirect()->route('housings_hasroles.housings_hasroles.index')
                ->with('success_message', 'Housings Hasroles was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings hasroles from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsHasroles = housings_hasroles::findOrFail($id);
            $housingsHasroles->delete();

            return redirect()->route('housings_hasroles.housings_hasroles.index')
                ->with('success_message', 'Housings Hasroles was successfully deleted.');
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
                'housing_id' => 'required',
            'roles_id' => 'required',
            'hen' => 'required|numeric|min:-2147483648|max:2147483647',
            'doc' => 'required|date_format:j/n/Y g:i A',
            'check_in' => 'required|date_format:j/n/Y g:i A',
            'doc_age' => 'required|numeric|min:-2147483648|max:2147483647',
            'housing_age' => 'required|numeric|min:-2147483648|max:2147483647',
            'grade' => 'required|string|min:1|max:15',
            'days_age' => 'required|numeric|min:-2147483648|max:2147483647',
            'sell' => 'required|numeric|min:-2147483648|max:2147483647',
            'mortality' => 'required|numeric|min:-2147483648|max:2147483647',
            'sort_out' => 'required|numeric|min:-2147483648|max:2147483647',
            'hen_total_real' => 'required|numeric|min:-2147483648|max:2147483647',
            'hen_total_actual' => 'required|numeric|min:-2147483648|max:2147483647',
            'insert_1' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'from_housing_id' => 'nullable',
            'move' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'to_housing_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
