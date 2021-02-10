<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oem;
use App\Models\OemSpecs;
use App\Models\MarketplaceInventory;
use DB;

class ApiController extends Controller
{
	
	public function createInventory(Request $request) {
		$oem_spec_id = OemSpecs::where('model_name', $request->model_name)->get('id');
        
        $inventory = new MarketplaceInventory();
		$inventory->oem_specs_id = $oem_spec_id[0]['id'];
        $inventory->kms = $request->kms;
	    $inventory->major_scratches = $request->major_scratches;
	    $inventory->original_paint = $request->original_paint;
	    $inventory->no_of_accidents = $request->no_of_accidents;
	    $inventory->previous_buyers = $request->previous_buyers;
	    $inventory->registration_place = $request->registration_place;
	    $inventory->save();

	    return response()->json([
		"message" => "Inventory record created"
	    ], 201);
	}

	public function getAllOEM() {
		$oem = Oem::get()->toJson(JSON_PRETTY_PRINT);
		return response($oem, 200);
	}

	public function getAllInventories(){
		$inventories = DB::table('marketplace_inventories')
			->select('marketplace_inventories.*','oem_specs.model_name')
			->join('oem_specs','oem_specs.id','=','marketplace_inventories.id')
			->get()->toJson(JSON_PRETTY_PRINT);
		return response($inventories,200);
	}

	public function getAllOEMSpecs(Request $request) {
		$oem = DB::table('oem_specs')
			->select('oem_specs.*','oems.name')
			->join('oems','oems.id','=','oem_specs.id')
			->where([
				['oem_specs.model_name','like','%'.$request->name.'%'],
				['oem_specs.model_year','like','%'.$request->year.'%']
			])
			->get()->toJson(JSON_PRETTY_PRINT);
		return response($oem, 200);
	}

	public function updateInventory(Request $request, $id) {
		if (MarketplaceInventory::where('id', $id)->exists()) {
			$inventory = MarketplaceInventory::find($id);
			$inventory->kms = is_null($request->kms) ? $student->kms : $request->kms;
			$inventory->major_scratches = is_null($request->major_scratches) ? $student->major_scratches : $request->major_scratches;
			$inventory->original_paint = is_null($request->original_paint) ? $student->original_paint : $request->original_paint;
			$inventory->no_of_accidents = is_null($request->no_of_accidents) ? $student->no_of_accidents : $request->no_of_accidents;
			$inventory->previous_buyers = is_null($request->previous_buyers) ? $student->previous_buyers : $request->previous_buyers;
			$inventory->registration_place = is_null($request->registration_place) ? $student->registration_place : $request->registration_place;
			$inventory->save();
	
			return response()->json([
				"message" => "records updated successfully"
			], 200);
			} else {
			return response()->json([
				"message" => "Inventory not found"
			], 404);
			
		}
	}

	public function deleteInventory ($id) {
		if(MarketplaceInventory::where('id', $id)->exists()) {
		  $inventory = MarketplaceInventory::find($id);
		  $inventory->delete();
  
		  return response()->json([
			"message" => "records deleted"
		  ], 202);
		} else {
		  return response()->json([
			"message" => "Inventory not found"
		  ], 404);
		}
	}
}
