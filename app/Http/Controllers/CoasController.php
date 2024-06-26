<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\coas;
use Illuminate\Http\Request;
use Exception;

class CoasController extends Controller
{

    /**
     * Display a listing of the coas.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        //$coasObjects = coas::paginate(25);
        $coasObjects = coas::orderBy('id','DESC')->paginate(5);
        return view('coas.index',compact('coasObjects'))
            ->with('i', ($request->input('page', 1) - 1) * 5);

       // return view('coas.index', compact('coasObjects'));
    }

    /**
     * Show the form for creating a new coas.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('coas.create');
    }

    /**
     * Store a new coas in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            coas::create($data);

            return redirect()->route('coas.coas.index')
                ->with('success_message', 'Coas was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified coas.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $coas = coas::findOrFail($id);

        return view('coas.show', compact('coas'));
    }

    /**
     * Show the form for editing the specified coas.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $coas = coas::findOrFail($id);
        

        return view('coas.edit', compact('coas'));
    }

    /**
     * Update the specified coas in the storage.
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
            
            $coas = coas::findOrFail($id);
            $coas->update($data);

            return redirect()->route('coas.coas.index')
                ->with('success_message', 'Coas was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified coas from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $coas = coas::findOrFail($id);
            $coas->delete();

            return redirect()->route('coas.coas.index')
                ->with('success_message', 'Coas was successfully deleted.');
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
                'id' => 'required|string',
                'cs_code' => 'required|string',
            'account' => 'required|string|min:1|max:40',
            'description' => 'required|string|min:1|max:40',
            'beginning_balance' => 'required|numeric',
            'hpp' => 'required|string|min:1|max:1',
            'add_information' => 'nullable|string|min:0|max:60', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
