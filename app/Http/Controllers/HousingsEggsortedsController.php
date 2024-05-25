<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Housing;
use App\Models\HousingsRole;
use App\Models\HousingsStorage;
use App\Models\Sortir;
use App\Models\housings_eggsorteds;
use Illuminate\Http\Request;
use Exception;

class HousingsEggsortedsController extends Controller
{

    /**
     * Display a listing of the housings eggsorteds.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsEggsortedsObjects = housings_eggsorteds::with('housingsrole','housing','housingsstorage','sortir')->paginate(25);

        return view('housings_eggsorteds.index', compact('housingsEggsortedsObjects'));
    }

    /**
     * Show the form for creating a new housings eggsorteds.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $HousingsRoles = HousingsRole::pluck('id','id')->all();
$Housings = Housing::pluck('name','id')->all();
$HousingsStorages = HousingsStorage::pluck('id','id')->all();
$sortirs = Sortir::pluck('id','id')->all();
        
        return view('housings_eggsorteds.create', compact('HousingsRoles','Housings','HousingsStorages','sortirs'));
    }

    /**
     * Store a new housings eggsorteds in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_eggsorteds::create($data);

            return redirect()->route('housings_eggsorteds.housings_eggsorteds.index')
                ->with('success_message', 'Housings Eggsorteds was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings eggsorteds.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsEggsorteds = housings_eggsorteds::with('housingsrole','housing','housingsstorage','sortir')->findOrFail($id);

        return view('housings_eggsorteds.show', compact('housingsEggsorteds'));
    }

    /**
     * Show the form for editing the specified housings eggsorteds.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsEggsorteds = housings_eggsorteds::findOrFail($id);
        $HousingsRoles = HousingsRole::pluck('id','id')->all();
$Housings = Housing::pluck('name','id')->all();
$HousingsStorages = HousingsStorage::pluck('id','id')->all();
$sortirs = Sortir::pluck('id','id')->all();

        return view('housings_eggsorteds.edit', compact('housingsEggsorteds','HousingsRoles','Housings','HousingsStorages','sortirs'));
    }

    /**
     * Update the specified housings eggsorteds in the storage.
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
            
            $housingsEggsorteds = housings_eggsorteds::findOrFail($id);
            $housingsEggsorteds->update($data);

            return redirect()->route('housings_eggsorteds.housings_eggsorteds.index')
                ->with('success_message', 'Housings Eggsorteds was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings eggsorteds from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsEggsorteds = housings_eggsorteds::findOrFail($id);
            $housingsEggsorteds->delete();

            return redirect()->route('housings_eggsorteds.housings_eggsorteds.index')
                ->with('success_message', 'Housings Eggsorteds was successfully deleted.');
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
                'roles_id' => 'required',
            'housings_id' => 'required',
            'storages_id' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:-2147483648|max:2147483647',
            'ruined' => 'required|numeric|min:-2147483648|max:2147483647',
            'egg' => 'required|numeric|min:-2147483648|max:2147483647',
            'big' => 'required|numeric|min:-2147483648|max:2147483647',
            'medium' => 'required|numeric|min:-2147483648|max:2147483647',
            'small' => 'required|numeric|min:-2147483648|max:2147483647',
            'sortir_id' => 'nullable',
            'percent_real' => 'required|numeric|min:-9|max:9',
            'percent_actual' => 'required|numeric|min:-9|max:9', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
