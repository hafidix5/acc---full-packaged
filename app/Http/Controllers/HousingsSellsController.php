<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HousingsEggsorted;
use App\Models\housings_sells;
use Illuminate\Http\Request;
use Exception;

class HousingsSellsController extends Controller
{

    /**
     * Display a listing of the housings sells.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsSellsObjects = housings_sells::with('housingseggsorted','housingseggsorted','housingseggsorted','housingseggsorted')->paginate(25);

        return view('housings_sells.index', compact('housingsSellsObjects'));
    }

    /**
     * Show the form for creating a new housings sells.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $HousingsEggsorteds = HousingsEggsorted::pluck('total','date')->all();
        
        return view('housings_sells.create', compact('HousingsEggsorteds','HousingsEggsorteds','HousingsEggsorteds','HousingsEggsorteds'));
    }

    /**
     * Store a new housings sells in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_sells::create($data);

            return redirect()->route('housings_sells.housings_sells.index')
                ->with('success_message', 'Housings Sells was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings sells.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsSells = housings_sells::with('housingseggsorted','housingseggsorted','housingseggsorted','housingseggsorted')->findOrFail($id);

        return view('housings_sells.show', compact('housingsSells'));
    }

    /**
     * Show the form for editing the specified housings sells.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsSells = housings_sells::findOrFail($id);
        $HousingsEggsorteds = HousingsEggsorted::pluck('total','date')->all();

        return view('housings_sells.edit', compact('housingsSells','HousingsEggsorteds','HousingsEggsorteds','HousingsEggsorteds','HousingsEggsorteds'));
    }

    /**
     * Update the specified housings sells in the storage.
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
            
            $housingsSells = housings_sells::findOrFail($id);
            $housingsSells->update($data);

            return redirect()->route('housings_sells.housings_sells.index')
                ->with('success_message', 'Housings Sells was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings sells from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsSells = housings_sells::findOrFail($id);
            $housingsSells->delete();

            return redirect()->route('housings_sells.housings_sells.index')
                ->with('success_message', 'Housings Sells was successfully deleted.');
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
                'date' => 'required|date_format:j/n/Y g:i A',
            'roles_id' => 'required',
            'housings_id' => 'required',
            'storages_id' => 'required|numeric|min:0',
            'category' => 'required|string|min:1|max:10',
            'price' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
