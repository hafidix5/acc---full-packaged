<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\coas;
use App\Models\criterias;
use App\Models\departments;
use App\Models\invoices;
use App\Models\units;
use App\Models\expenditures;
use App\Models\general_ledgers;
use Illuminate\Http\Request;
use Exception;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ExpendituresController extends Controller
{
public $save_gl;
    /**
     * Display a listing of the expenditures.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
        $expendituresObjects = expenditures::with('invoice','coa','criteria','department','unit')->paginate(25);
      
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
$signed=auth()->user()->name;    
        return view('expenditures.create', compact('Invoices','Coas','Criterias','Departments','Units','signed'));
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
        
       // try {
            
            $data = $this->getData($request);
            $id = IdGenerator::generate(['table' => 'expenditures', 'length' => 10, 'prefix' =>'E-']);
            $data['id']=$id;
            $data['signed']=auth()->user()->name;
            expenditures::create($data);
            
            $this->set_gl($data['date_payment'],$data['id'],$data['coas_id'],$data['description'],
            $data['payment'],$data['payment']);
            
           /*  return redirect()->route('expenditures.expenditures.index')
                ->with('success_message', 'Expenditures was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        } */
    }

    /**
     * Display the specified expenditures.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function set_gl($date, $expenditures_id, $coas_id, $description, $debet, $credit)
    {
            $general_ledgers=new general_ledgers();
            $id = IdGenerator::generate(['table' => 'general_ledgers', 'length' => 12, 'prefix' =>date('ym')]);
            $general_ledgers->id=$id;
            $general_ledgers->date=$date;
            $general_ledgers->expenditures_id=$expenditures_id;
            $general_ledgers->coas_id=$coas_id;
            $general_ledgers->information=$description;
            $general_ledgers->debet=$debet;
            $general_ledgers->credit=$credit;
            $general_ledgers->save();
    }

     public function show($id)
    {
        $expenditures = expenditures::findOrFail($id);

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
            'date_payment' => 'required',
            'invoices_id' => 'required',
            'coas_id' => 'required',
            'criterias_id' => 'required',
            'departments_id' => 'required',
            'description' => 'required|string|min:1|max:60',
            'qty' => 'required|numeric',
            'units_id' => 'required',
            'price' => 'required|numeric',
            'svc_charge' => 'required|numeric',
            'bank_charge' => 'required|numeric',
            'discount_percentage' => 'required|numeric',
            'amount' => 'required|numeric',
            'payment' => 'required|numeric',
            //'signed' => 'required|string',
            'cashless_option' => 'required|string|min:1|max:1',
            'method' => 'required|string|min:1|max:1',
            'add_information' => 'required|string|min:1|max:50', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
