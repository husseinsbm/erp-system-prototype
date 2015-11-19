<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Controllers\Controller;
use App\Customer;
use App\ActivityLog;
class CustomerController extends Controller
{
  public function index() {
   $customer= Customer::where('delete_stat', '=', 0)
   ->orderBy('name', 'asc')
   ->paginate(config('erp.posts_per_page'));
   $customer->setPath('customer'); 
   return view('erp_system.customer.index',compact('customer'));
 }

 public function getCustomer(Request $request){
  $id=$request->id;
  $customer= Customer::findOrFail($id);

  return response()->json($customer);
}


public function store(CustomerCreateRequest $request)
{ 
  $customer = Customer::create($request->postFillData());

  $customerid=$customer->id;
  $employeeid=Auth::user()->id;
  $log=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'Add Customer','table_affected'=>'customer','primary_key'=>$customerid,'column_affected'=>'all']);

  return redirect()
  ->route('erp_system.customer.index')
  ->withSuccess('New Customer Successfully Created.');

}


public function update(CustomerUpdateRequest $request)
{
  $customer = Customer::findOrFail($request->id);
  $oldsupplier=json_encode($customer);
  $customer->fill($request->postFillData());
  $customer->save();

  $customerid=$customer->id;
  $employeeid=Auth::user()->id;
  $log=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'Edit Suppliers','table_affected'=>'customer','primary_key'=>$customerid,'column_affected'=>'all','old_value'=>$oldsupplier]);

  return redirect()
  ->route('erp_system.customer.index')
  ->withSuccess('Customer updated.');
}


public function delete(Request $request){
  $customer = Customer::findOrFail($request->id);
  $customer->delete_stat=1;
  $customer->save();
  $customerid=$customer->id;
  $employeeid=Auth::user()->id;
  $log=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'Delete Suppliers','table_affected'=>'customer=','primary_key'=>$customerid,'column_affected'=>'delete_stat']);


  return redirect()
  ->route('erp_system.customer.index')
  ->withSuccess('Customer deleted.');
}

}
