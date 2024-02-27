<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\vendors;
use Illuminate\Http\Request;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class VendorsController extends Controller
{

    /**
     * Display a listing of the vendors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vendorsObjects = vendors::paginate(25);

        return view('vendors.index', compact('vendorsObjects'));
    }

    /**
     * Show the form for creating a new vendors.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('vendors.create');
    }

    /**
     * Store a new vendors in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'vendors', 'length' => 3, 'prefix' =>'V']);
            $data['id']=$id;
            vendors::create($data);

            return redirect()->route('vendors.vendors.index')
                ->with('success_message', 'Vendors was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified vendors.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vendors = vendors::findOrFail($id);

        return view('vendors.show', compact('vendors'));
    }

    /**
     * Show the form for editing the specified vendors.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $vendors = vendors::findOrFail($id);
        

        return view('vendors.edit', compact('vendors'));
    }

    /**
     * Update the specified vendors in the storage.
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
            
            $vendors = vendors::findOrFail($id);
            $vendors->update($data);

            return redirect()->route('vendors.vendors.index')
                ->with('success_message', 'Vendors was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified vendors from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $vendors = vendors::findOrFail($id);
            $vendors->delete();

            return redirect()->route('vendors.vendors.index')
                ->with('success_message', 'Vendors was successfully deleted.');
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
                'company_name' => 'required|string|min:1|max:40',
            'company_address' => 'required|string|min:1|max:100',
            'npwp' => 'required|string|min:1|max:20',
            'sales_name' => 'required|string|min:1|max:30',
            'contact' => 'required|string|min:1|max:12',
            'bank_name' => 'nullable|string|min:0|max:15',
            'account_number' => 'nullable|numeric|string|min:0|max:20',
            'payment_method' => 'required|string|min:1|max:10', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
