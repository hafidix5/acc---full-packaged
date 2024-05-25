<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HousingsMaterial;
use App\Models\HousingsStorage;
use App\Models\Pic;
use App\Models\housings_stockopnames;
use Illuminate\Http\Request;
use Exception;

class HousingsStockopnamesController extends Controller
{

    /**
     * Display a listing of the housings stockopnames.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsStockopnamesObjects = housings_stockopnames::with('housingsstorage','housingsmaterial','pic')->paginate(25);

        return view('housings_stockopnames.index', compact('housingsStockopnamesObjects'));
    }

    /**
     * Show the form for creating a new housings stockopnames.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $HousingsStorages = HousingsStorage::pluck('id','id')->all();
$HousingsMaterials = HousingsMaterial::pluck('category','id')->all();
$pics = Pic::pluck('id','id')->all();
        
        return view('housings_stockopnames.create', compact('HousingsStorages','HousingsMaterials','pics'));
    }

    /**
     * Store a new housings stockopnames in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            housings_stockopnames::create($data);

            return redirect()->route('housings_stockopnames.housings_stockopnames.index')
                ->with('success_message', 'Housings Stockopnames was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings stockopnames.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housingsStockopnames = housings_stockopnames::with('housingsstorage','housingsmaterial','pic')->findOrFail($id);

        return view('housings_stockopnames.show', compact('housingsStockopnames'));
    }

    /**
     * Show the form for editing the specified housings stockopnames.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housingsStockopnames = housings_stockopnames::findOrFail($id);
        $HousingsStorages = HousingsStorage::pluck('id','id')->all();
$HousingsMaterials = HousingsMaterial::pluck('category','id')->all();
$pics = Pic::pluck('id','id')->all();

        return view('housings_stockopnames.edit', compact('housingsStockopnames','HousingsStorages','HousingsMaterials','pics'));
    }

    /**
     * Update the specified housings stockopnames in the storage.
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
            
            $housingsStockopnames = housings_stockopnames::findOrFail($id);
            $housingsStockopnames->update($data);

            return redirect()->route('housings_stockopnames.housings_stockopnames.index')
                ->with('success_message', 'Housings Stockopnames was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings stockopnames from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housingsStockopnames = housings_stockopnames::findOrFail($id);
            $housingsStockopnames->delete();

            return redirect()->route('housings_stockopnames.housings_stockopnames.index')
                ->with('success_message', 'Housings Stockopnames was successfully deleted.');
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
                'storages_id' => 'required|numeric|min:0',
            'materials_id' => 'required',
            'method' => 'required|string|min:1|max:15',
            'status' => 'required|string|min:1|max:15',
            'bank' => 'required|string|min:1|max:10',
            'pic_id' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
