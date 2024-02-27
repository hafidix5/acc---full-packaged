<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\coas;
use App\Models\criterias;
use App\Models\departments;
use App\Models\invoices;
use App\Models\products;
use App\Models\units;
use App\Models\expenditures;
use Illuminate\Http\Request;
use Exception;

class ExpendituresController extends Controller
{

    /**
     * Display a listing of the expenditures.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $expendituresObjects = expenditures::with('invoice','coa','criteria','department','product','unit')->paginate(25);

        return view('expenditures.index', compact('expendituresObjects'));
    }

    /**
     * Show the form for creating a new expenditures.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Invoices = invoices::pluck('id','id')->all();
$Coas = coas::pluck('account','id')->all();
$Criterias = criterias::pluck('name','id')->all();
$Departments = departments::pluck('name','id')->all();
$Units = units::pluck('name','id')->all();
        
        return view('expenditures.create', compact('Invoices','Coas','Criterias','Departments','Units'));
    }

    /**
     * Store a new expenditures in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            expenditures::create($data);

            return redirect()->route('expenditures.expenditures.index')
                ->with('success_message', 'Expenditures was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified expenditures.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $expenditures = expenditures::with('invoice','coa','criteria','department','product','unit')->findOrFail($id);

        return view('expenditures.show', compact('expenditures'));
    }

    /**
     * Show the form for editing the specified expenditures.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $expenditures = expenditures::findOrFail($id);
        $Invoices = invoices::pluck('date','id')->all();
$Coas = coas::pluck('cs_code','id')->all();
$Criterias = criterias::pluck('name','id')->all();
$Departments = departments::pluck('name','id')->all();
$Units = units::pluck('name','id')->all();

        return view('expenditures.edit', compact('expenditures','Invoices','Coas','Criterias','Departments','Units'));
    }

    /**
     * Update the specified expenditures in the storage.
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
            
            $expenditures = expenditures::findOrFail($id);
            $expenditures->update($data);

            return redirect()->route('expenditures.expenditures.index')
                ->with('success_message', 'Expenditures was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified expenditures from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $expenditures = expenditures::findOrFail($id);
            $expenditures->delete();

            return redirect()->route('expenditures.expenditures.index')
                ->with('success_message', 'Expenditures was successfully deleted.');
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
                'date_payment' => 'required|date_format:j/n/Y',
            'invoices_id' => 'required',
            'coas_id' => 'required',
            'criterias_id' => 'required',
            'departments_id' => 'required',
            'description' => 'required|string|min:1|max:60',
            'qty' => 'required|numeric|min:-2147483648|max:2147483647',
            'units_id' => 'required',
            'price' => 'required|numeric|min:-2147483648|max:2147483647',
            'svc_charge' => 'required|numeric|min:-2147483648|max:2147483647',
            'bank_charge' => 'required|numeric|min:-2147483648|max:2147483647',
            'discount_percentage' => 'required|numeric|min:-9|max:9',
            'amount' => 'required|numeric|min:-2147483648|max:2147483647',
            'payment' => 'required|numeric|min:-2147483648|max:2147483647',
            'signed' => 'required|string|min:1',
            'iscash' => 'required|string|min:1|max:1',
            'method' => 'required|string|min:1|max:1',
            'add_information' => 'required|string|min:1|max:50', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
