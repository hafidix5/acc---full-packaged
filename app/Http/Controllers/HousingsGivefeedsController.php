<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Housing;
use App\Models\HousingsMaterial;
use App\Models\HousingsRole;
use App\Models\housings_givefeeds;
use Illuminate\Http\Request;
use Exception;

class HousingsGivefeedsController extends Controller
{

    /**
     * Display a listing of the housings givefeeds.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsGivefeedsObjects = housings_givefeeds::with('housingsmaterial','housingsrole','housing')->paginate(25);

        return view('housings_givefeeds.index', compact('housingsGivefeedsObjects'));
    }

    /**
     * Show the form for creating a new housings givefeeds.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $HousingsMaterials = HousingsMaterial::pluck('id','id')->all();
$HousingsRoles = HousingsRole::pluck('id','id')->all();
$Housings = Housing::pluck('name','id')->all();
        
        return view('housings_givefeeds.create', compact('HousingsMaterials','HousingsRoles','Housings'));
    }

    /**
     * Store a new housings givefeeds in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_givefeeds::create($data);

            return redirect()->route('housings_givefeeds.housings_givefeeds.index')
                ->with('success_message', 'Housings Givefeeds was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings givefeeds.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsGivefeeds = housings_givefeeds::with('housingsmaterial','housingsrole','housing')->findOrFail($id);

        return view('housings_givefeeds.show', compact('housingsGivefeeds'));
    }

    /**
     * Show the form for editing the specified housings givefeeds.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsGivefeeds = housings_givefeeds::findOrFail($id);
        $HousingsMaterials = HousingsMaterial::pluck('id','id')->all();
$HousingsRoles = HousingsRole::pluck('id','id')->all();
$Housings = Housing::pluck('name','id')->all();

        return view('housings_givefeeds.edit', compact('housingsGivefeeds','HousingsMaterials','HousingsRoles','Housings'));
    }

    /**
     * Update the specified housings givefeeds in the storage.
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
            
            $housingsGivefeeds = housings_givefeeds::findOrFail($id);
            $housingsGivefeeds->update($data);

            return redirect()->route('housings_givefeeds.housings_givefeeds.index')
                ->with('success_message', 'Housings Givefeeds was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings givefeeds from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsGivefeeds = housings_givefeeds::findOrFail($id);
            $housingsGivefeeds->delete();

            return redirect()->route('housings_givefeeds.housings_givefeeds.index')
                ->with('success_message', 'Housings Givefeeds was successfully deleted.');
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
                'materials_id' => 'required',
            'roles_id' => 'required',
            'housing_id' => 'required',
            'sack' => 'required|numeric|min:-9|max:9',
            'feed' => 'required|numeric|min:-9|max:9',
            'spread_out' => 'required|numeric|min:-9|max:9',
            'remains' => 'required|numeric|min:-9|max:9',
            'remains_timestamps' => 'required|string|min:1',
            'digested' => 'required|numeric|min:-9|max:9', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
