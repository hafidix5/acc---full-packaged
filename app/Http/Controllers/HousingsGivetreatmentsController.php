<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Housing;
use App\Models\HousingsMaterial;
use App\Models\HousingsRole;
use App\Models\housings_givetreatments;
use Illuminate\Http\Request;
use Exception;

class HousingsGivetreatmentsController extends Controller
{

    /**
     * Display a listing of the housings givetreatments.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsGivetreatmentsObjects = housings_givetreatments::with('housingsmaterial','housingsrole','housing')->paginate(25);

        return view('housings_givetreatments.index', compact('housingsGivetreatmentsObjects'));
    }

    /**
     * Show the form for creating a new housings givetreatments.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $HousingsMaterials = HousingsMaterial::pluck('id','id')->all();
$HousingsRoles = HousingsRole::pluck('id','id')->all();
$Housings = Housing::pluck('name','id')->all();
        
        return view('housings_givetreatments.create', compact('HousingsMaterials','HousingsRoles','Housings'));
    }

    /**
     * Store a new housings givetreatments in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_givetreatments::create($data);

            return redirect()->route('housings_givetreatments.housings_givetreatments.index')
                ->with('success_message', 'Housings Givetreatments was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings givetreatments.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsGivetreatments = housings_givetreatments::with('housingsmaterial','housingsrole','housing')->findOrFail($id);

        return view('housings_givetreatments.show', compact('housingsGivetreatments'));
    }

    /**
     * Show the form for editing the specified housings givetreatments.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsGivetreatments = housings_givetreatments::findOrFail($id);
        $HousingsMaterials = HousingsMaterial::pluck('id','id')->all();
$HousingsRoles = HousingsRole::pluck('id','id')->all();
$Housings = Housing::pluck('name','id')->all();

        return view('housings_givetreatments.edit', compact('housingsGivetreatments','HousingsMaterials','HousingsRoles','Housings'));
    }

    /**
     * Update the specified housings givetreatments in the storage.
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
            
            $housingsGivetreatments = housings_givetreatments::findOrFail($id);
            $housingsGivetreatments->update($data);

            return redirect()->route('housings_givetreatments.housings_givetreatments.index')
                ->with('success_message', 'Housings Givetreatments was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings givetreatments from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsGivetreatments = housings_givetreatments::findOrFail($id);
            $housingsGivetreatments->delete();

            return redirect()->route('housings_givetreatments.housings_givetreatments.index')
                ->with('success_message', 'Housings Givetreatments was successfully deleted.');
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
            'treatment' => 'required|string|min:1|max:30',
            'dosage' => 'required|numeric|min:-9|max:9',
            'application_method' => 'required|string|min:1|max:30',
            'roles_id_1' => 'required|string|min:1|max:5',
            'category' => 'required|string|min:1|max:20', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
