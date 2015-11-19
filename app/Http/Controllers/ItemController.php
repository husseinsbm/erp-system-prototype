<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Http\Requests;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\Item;
use App\ActivityLog;
class ItemController extends Controller
{
 
 public function index() {

  $item = Item::where('delete_stat', '=', 0)
   ->orderBy('name', 'asc')
   ->paginate(config('erp.posts_per_page'));
   $item->setPath('item'); 

 return view('erp_system.item.index',compact('item'));

 }
public function getpdf(){
$pdf = PDF::loadView('erp_system.item.index',compact('item'));
return $pdf->download('a.pdf');
}
public function getItem(Request $request){
  $id=$request->id;
 $item = Item::findOrFail($id);
 
  return response()->json($item);
}


public function store(ItemCreateRequest $request)
{
    $item = Item::create($request->postFillData());
    $itemid=$item->id;
   $employeeid=Auth::user()->id;
      $logs=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'Add Item','table_affected'=>'item','primary_key'=>$itemid,'column_affected'=>'all']);
    return redirect()
        ->route('erp_system.item.index')
        ->withSuccess('New Item Successfully Created.');
     
}

 public function update(ItemUpdateRequest $request)
  {
    $item = Item::findOrFail($request->id);
    $olditem=json_encode($item);
    $item->fill($request->postFillData());
    $item->save();
     $itemid=$item->id;
   $employeeid=Auth::user()->id;
 $logs=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'Edit Item','table_affected'=>'item','primary_key'=>$itemid,'column_affected'=>'all','old_value'=>$olditem]);

    return redirect()
        ->route('erp_system.item.index')
        ->withSuccess('Item updated.');
  }
  public function delete(Request $request){
 $item = Item::findOrFail($request->id);
    $item->delete_stat=1;
    $item->save();
      $itemid=$item->id;
   $employeeid=Auth::user()->id;
$logs=ActivityLog::create(['employee_id'=>$employeeid,'activity'=>'Delete Item','table_affected'=>'item','primary_key'=>$itemid,'column_affected'=>'remove_stat']);

    return redirect()
        ->route('erp_system.item.index')
        ->withSuccess('Item deleted.');
}

}