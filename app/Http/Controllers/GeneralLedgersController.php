<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\coas;
use App\Models\expenditures;
use App\Models\general_ledgers;
use Illuminate\Http\Request;
use Exception;

class GeneralLedgersController extends Controller
{

    /**
     * Display a listing of the general ledgers.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $generalLedgersObjects = general_ledgers::with('expenditure','coa')->paginate(25);

        return view('general_ledgers.index', compact('generalLedgersObjects'));
    }

    /**
     * Show the form for creating a new general ledgers.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Expenditures = Expenditure::pluck('date_payment','id')->all();
$Coas = Coa::pluck('cs_code','id')->all();
        
        return view('general_ledgers.create', compact('Expenditures','Coas'));
    }

    /**
     * Store a new general ledgers in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            general_ledgers::create($data);

            return redirect()->route('general_ledgers.general_ledgers.index')
                ->with('success_message', 'General Ledgers was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified general ledgers.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $generalLedgers = general_ledgers::with('expenditure','coa')->findOrFail($id);

        return view('general_ledgers.show', compact('generalLedgers'));
    }

    /**
     * Show the form for editing the specified general ledgers.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $generalLedgers = general_ledgers::findOrFail($id);
        $Expenditures = expenditures::pluck('date_payment','id')->all();
$Coas = coas::pluck('cs_code','id')->all();

        return view('general_ledgers.edit', compact('generalLedgers','Expenditures','Coas'));
    }

    /**
     * Update the specified general ledgers in the storage.
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
            
            $generalLedgers = general_ledgers::findOrFail($id);
            $generalLedgers->update($data);

            return redirect()->route('general_ledgers.general_ledgers.index')
                ->with('success_message', 'General Ledgers was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified general ledgers from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $generalLedgers = general_ledgers::findOrFail($id);
            $generalLedgers->delete();

            return redirect()->route('general_ledgers.general_ledgers.index')
                ->with('success_message', 'General Ledgers was successfully deleted.');
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
                'expenditures_id' => 'required',
            'coas_id' => 'required',
            'information' => 'required|string|min:1|max:50',
            'debet' => 'required|numeric|min:-2147483648|max:2147483647',
            'credit' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
