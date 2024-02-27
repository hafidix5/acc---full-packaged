<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\vendors;
use App\Models\invoices;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;

class InvoicesController extends Controller
{

    /**
     * Display a listing of the invoices.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $invoicesObjects = invoices::with('vendor')->paginate(25);

        return view('invoices.index', compact('invoicesObjects'));
    }

    /**
     * Show the form for creating a new invoices.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $Vendors = vendors::pluck('company_name','id')->all();
        
        return view('invoices.create', compact('Vendors'));
    }

    /**
     * Store a new invoices in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
      //  dd($request);
       try {
            
            $data = $this->getData($request);
            if ($request->file('file_invoice')) {
                $name = $request->file('file_invoice')->getClientOriginalName();
                $path = $request->file('file_invoice')->store('public/files');
                $data['file_invoice'] = $request->file('file_invoice')->store('storage/files');
            }
            invoices::create($data);

            return redirect()->route('invoices.invoices.index')
                ->with('success_message', 'Invoices was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);

        //        return $exception->getMessage();
        }
    }

    /**
     * Display the specified invoices.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $invoices = invoices::with('vendor')->findOrFail($id);

        return view('invoices.show', compact('invoices'));
    }

    /**
     * Show the form for editing the specified invoices.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $invoices = invoices::findOrFail($id);
        $Vendors = vendors::pluck('company_name','id')->all();

        return view('invoices.edit', compact('invoices','Vendors'));
    }

    /**
     * Update the specified invoices in the storage.
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
            
            $invoices = invoices::findOrFail($id);
            $invoices->update($data);

            return redirect()->route('invoices.invoices.index')
                ->with('success_message', 'Invoices was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified invoices from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $invoices = invoices::findOrFail($id);
            $invoices->delete();

            return redirect()->route('invoices.invoices.index')
                ->with('success_message', 'Invoices was successfully deleted.');
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
            'id'=>'required|string',
            'date' => 'required',
            'file_invoice' => 'required|file|mimes:pdf,jpeg,jpg|max:2048',
            'vendors_id' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
