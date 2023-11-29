<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Purchaes;
use App\Models\P_order;
use App\Models\Status;
use Session;
use DB;

class PurchaesController extends Controller
{

    public function index() {
        $indexpurchaes = Purchaes::join('statuses', 'purchaes.purchaes_status', '=', 'statuses.id')
                                ->join('suppliers', 'purchaes.suppliers_id', '=', 'suppliers.supplier_id')
                                ->get();
        return view('backend/purchaes/index', compact('indexpurchaes'));
    }

    public function create(){
        $indexData['indexSupplier']= Supplier::all();
        $indexData['indexProduct']= Product::all();
        return view('backend/purchaes/create', $indexData);
    }
    public function store(Request $request){
        $rules = [
            'suppliers_name' => 'required|max:50',
        ];
        
        $v_msg = [
            'suppliers_name.required'=> 'Please enter the supplier name.',
            // Add more messages for other validation rules if needed.
        ];
        
        $this->validate($request, $rules, $v_msg);

        try { 
            DB::beginTransaction();

            $purchase = new Purchaes();
            $purchase->suppliers_id = $request->suppliers_name;
            $purchase->save();

            $types = $request->buying_price;

            foreach ($types as $index => $type) {
                $pOrder = new P_order();
                $pOrder->purchaes_id = $purchase->purchaes_id;
                $pOrder->buying_price = $request->buying_price[$index];
                $pOrder->product_id = $request->product_name[$index];
                $pOrder->selling_price = $request->selling_price[$index];
                $pOrder->product_quantity = $request->product_quantity[$index];
                $pOrder->save();
            }

            DB::commit();
            
            // Flash message and redirect moved outside the try block
            return redirect()->route('purchaes.index')->with('msg','Data submitted successfully');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error','Ops! Data insert fail');
        }
    }

}
