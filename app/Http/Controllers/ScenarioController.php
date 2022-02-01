<?php

namespace App\Http\Controllers;

use App\Models\Scenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScenarioController extends Controller
{
    protected $executor;
    protected $validator;

    public function __construct(Scenario $executor)
    {
        $this->executor = $executor;
    }

    public function index()
    {
		$scenarios = DB::Select('select * from scenarios');

        return view('pages.scenarios.index', compact('scenarios'));
    }

    public function create()
    {
        return view('pages.scenarios.create');
    }

    public function add_scenario(Request $request)
    {
        request()->validate([
            'sensors5G' => 'required',
            'sensorsNB' => 'required',
            'sensorsLoRa' => 'required',
            'Gateaways' => 'required',
            'FinalCost' => 'required',
            'Energy' => 'required'
        ]);

        $sensors5G = $request->input('sensors5G');
        $sensorsNB = $request->input('sensorsNB');
        $sensorsLoRa = $request->input('sensorsLoRa');
        $Gateaways = $request->input('Gateaways');
        $FinalCost = $request->input('FinalCost');
        $Energy = $request->input('Energy');
		$display = 1;

        $data=array('sensors5G'=>$sensors5G,'sensorsNB'=>$sensorsNB,'sensorsLoRa'=>$sensorsLoRa,'Gateaways'=>$Gateaways,'FinalCost'=>$FinalCost,'Energy'=>$Energy,'display'=>$display);

        DB::table('scenarios')->insert($data);
        return redirect('scenarios/index')->with('message', ' Scenario added successfully!');
    }

    public function edit_scenario()
    {


    }

    public function scenario_display($id,$display)
    {
        DB::update('update scenario set display = ? where id = ?',[$display,$id]);
        return redirect()->back()->with('message', 'Scenario Status was successfully updated.');
    }
}
