<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Housings;
use Illuminate\Http\Request;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class HousingsController extends Controller
{

    /**
     * Display a listing of the housings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $housingsObjects = Housings::paginate(25);

        return view('housings.index', compact('housingsObjects'));
    }

    /**
     * Show the form for creating a new housings.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('housings.create');
    }

    /**
     * Store a new housings in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'housings', 'length' => 4, 'prefix' =>'H-']);
            $data['id']=$id;
            Housings::create($data);

            return redirect()->route('housings.housings.index')
                ->with('success_message', 'Housings was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified housings.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $housings = Housings::findOrFail($id);

        return view('housings.show', compact('housings'));
    }

    /**
     * Show the form for editing the specified housings.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $housings = Housings::findOrFail($id);
        

        return view('housings.edit', compact('housings'));
    }

    /**
     * Update the specified housings in the storage.
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
            
            $housings = Housings::findOrFail($id);
            $housings->update($data);

            return redirect()->route('housings.housings.index')
                ->with('success_message', 'Housings was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified housings from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $housings = Housings::findOrFail($id);
            $housings->delete();

            return redirect()->route('housings.housings.index')
                ->with('success_message', 'Housings was successfully deleted.');
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
                'name' => 'required|string|min:1|max:20',
            'capacity' => 'required|numeric',
            'empty' => 'required|numeric', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
