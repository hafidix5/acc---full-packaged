<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coa;
use App\Models\Criteria;
use App\Models\Department;
use App\Models\Product;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Vendor;
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
        $expendituresObjects = expenditures::with('coa','product','subject','criteria','department','vendor','unit')->paginate(25);

        return view('expenditures.index', compact('expendituresObjects'));
    }

    /**
     * Show the form for creating a new expenditures.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Coas = Coa::pluck('cs_code','id')->all();
$Products = Product::pluck('name','id')->all();
$Subjects = Subject::pluck('name','id')->all();
$Criterias = Criteria::pluck('name','id')->all();
$Departments = Department::pluck('name','id')->all();
$Vendors = Vendor::pluck('company_name','id')->all();
$Units = Unit::pluck('name','id')->all();
        
        return view('expenditures.create', compact('Coas','Products','Subjects','Criterias','Departments','Vendors','Units'));
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
        $expenditures = expenditures::with('coa','product','subject','criteria','department','vendor','unit')->findOrFail($id);

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
        $Coas = Coa::pluck('cs_code','id')->all();
$Products = Product::pluck('name','id')->all();
$Subjects = Subject::pluck('name','id')->all();
$Criterias = Criteria::pluck('name','id')->all();
$Departments = Department::pluck('name','id')->all();
$Vendors = Vendor::pluck('company_name','id')->all();
$Units = Unit::pluck('name','id')->all();

        return view('expenditures.edit', compact('expenditures','Coas','Products','Subjects','Criterias','Departments','Vendors','Units'));
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
                'date' => 'required|date_format:j/n/Y g:i A',
            'coas_id' => 'required',
            'products_id' => 'required',
            'subjects_id' => 'required',
            'criterias_id' => 'required',
            'departments_id' => 'required',
            'vendors_id' => 'required',
            'description' => 'required|string|min:1|max:60',
            'qty' => 'required|numeric|min:-2147483648|max:2147483647',
            'units_id' => 'required',
            'price' => 'required|numeric|min:-2147483648|max:2147483647',
            'svc_charge' => 'required|numeric|min:-2147483648|max:2147483647',
            'bank_charge' => 'required|numeric|min:-2147483648|max:2147483647',
            'signed' => 'required|string|min:1',
            'invoice_number' => 'required|numeric|string|min:1|max:20',
            'add_information' => 'required|numeric|min:-2147483648|max:2147483647', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
