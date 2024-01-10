<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\subjects;
use Illuminate\Http\Request;
use Exception;

class SubjectsController extends Controller
{

    /**
     * Display a listing of the subjects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subjectsObjects = subjects::paginate(25);

        return view('subjects.index', compact('subjectsObjects'));
    }

    /**
     * Show the form for creating a new subjects.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('subjects.create');
    }

    /**
     * Store a new subjects in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            subjects::create($data);

            return redirect()->route('subjects.subjects.index')
                ->with('success_message', 'Subjects was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified subjects.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $subjects = subjects::findOrFail($id);

        return view('subjects.show', compact('subjects'));
    }

    /**
     * Show the form for editing the specified subjects.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $subjects = subjects::findOrFail($id);
        

        return view('subjects.edit', compact('subjects'));
    }

    /**
     * Update the specified subjects in the storage.
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
            
            $subjects = subjects::findOrFail($id);
            $subjects->update($data);

            return redirect()->route('subjects.subjects.index')
                ->with('success_message', 'Subjects was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified subjects from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $subjects = subjects::findOrFail($id);
            $subjects->delete();

            return redirect()->route('subjects.subjects.index')
                ->with('success_message', 'Subjects was successfully deleted.');
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
                'name' => 'required|string|min:1|max:30', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
