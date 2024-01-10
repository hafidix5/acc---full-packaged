<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;
use Exception;

class ProductsController extends Controller
{

    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productsObjects = products::paginate(25);

        return view('products.index', compact('productsObjects'));
    }

    /**
     * Show the form for creating a new products.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('products.create');
    }

    /**
     * Store a new products in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            products::create($data);

            return redirect()->route('products.products.index')
                ->with('success_message', 'Products was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified products.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $products = products::findOrFail($id);

        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified products.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $products = products::findOrFail($id);
        

        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified products in the storage.
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
            
            $products = products::findOrFail($id);
            $products->update($data);

            return redirect()->route('products.products.index')
                ->with('success_message', 'Products was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified products from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $products = products::findOrFail($id);
            $products->delete();

            return redirect()->route('products.products.index')
                ->with('success_message', 'Products was successfully deleted.');
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
