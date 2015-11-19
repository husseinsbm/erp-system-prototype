<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use PDF;
use App\Http\Requests;
use App\Http\Requests\RfqCreateRequest;
use App\Http\Requests\RfqUpdateRequest;
use App\Http\Controllers\Controller;
use App\Rfq;
use App\RfqItem;
use App\Qtn;
use App\QtnItem;
use App\Item;
use App\Customer;

class QtnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $rfq = Rfq::with('customer_belong_rfq')->where('delete_stat', '=', 0)->where('approval_stat', '=', 0)
      ->orderBy('date', 'desc')
      ->get();
      
      $qtn = Qtn::with('customer_belong_qtn')->where('delete_stat', '=', 0)
      ->orderBy('date', 'desc')
      ->paginate(config('erp.posts_per_page'));
      $qtn->setPath('qtn'); 
      return view('erp_system.qtn.index',compact('qtn'))->with('rfq', $rfq);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

public function getpdf($id){
  $qtn = Qtn::where('id',$id)->with('customer_belong_qtn')->first();
     $item=QtnItem::where('qtn_id',$id)
     ->join('item','item.id','=','qtn_item.item_id')
     ->select('item.item_code','item.name','qtn_item.price','qtn_item.quantity','item.unit')->get(); 
     
/*     return view('erp_system.rfq.view')
     ->with('rfq', $rfq)
     ->with('customer', $customer)
     ->with('item', $item);*/
$data['qtn']=$qtn;

$data['item']=$item;
  //return response()->json($data);
$pdf = PDF::loadView('erp_system.qtn.qtn_form',$data);
return $pdf->download('QTN.pdf');
}

    public function getItemrfq(Request $request)
    {
   /* $col;
    if($request->s=='n'){
      $col='name';
    }else{
      $col='item_code';

    }*/
    $name=$request->term;

    $item = Item::where('name', 'like','%'. $name.'%')->orWhere('item_code', 'like','%'. $name.'%')
    ->limit(5)->get();

    $result = [];

    foreach ($item as $itemlist) {

     $res=[];     
     $res['name']=$itemlist->name;
     $res['id']=$itemlist->id;
     $res['item_code']=$itemlist->item_code;
     $res['sell_price']=$itemlist->price_sell;
     $res['description_1']=$itemlist->description_1;
     $res['description_2']=$itemlist->description_2;
     $res['description_3']=$itemlist->description_3;
     $res['stock']=$itemlist->stock;
     $res['unit']=$itemlist->unit;
     $result[] = $res;

   }
   $result = array ("results" => $result);
   return response()->json($result);

 }   



 public function create()
 {


   $customer=Customer::where('delete_stat',0)->get();

   return view('erp_system.rfq.create')->with('customer', $customer);
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {   
        //save selling
      $customer_id=$request->customer;

      $qtn = new Qtn;
      $qtn->employee_id=Auth::user()->id;
      $qtn->number=$request->number;
      $qtn->rfq_id=$request->rfq_id;
      $qtn->date=$request->date;
      $qtn->note=$request->note;
      $qtn->to=$customer_id;
      $qtn->attn=$request->attn;
      $qtn->delivery_time=$request->delivery_time;
      $qtn->delivery_cost=$request->delivery_cost;
      $qtn->tax=$request->tax;
      $qtn->validity=$request->validity;

      $qtn->approval_stat=2;
      $qtn->save();
      $qtn_id=$qtn->id;
      $rfq=Rfq::where('id',$request->rfq_id)->update(array('approval_stat' => 2));;

        //save item_selling
      $itemrfq= RfqItem::join('item','item.id','=','rfq_item.item_id')
      ->where('rfq_id',$request->rfq_id)
      ->select('item.item_code','item.id','rfq_item.quantity')
      ->get();
       $itemsave = [];
       $i=0;
      foreach ($itemrfq as $itemlist) {
       $item_code=$itemlist->item_code;
        $itemsave=new QtnItem;
        $itemsave->item_id=$itemlist->id;
        $itemsave->quantity=$itemlist->quantity;
        $itemsave->qtn_id=$qtn_id;
      $itemsave->price=$request->input($item_code);
        $itemsave->save();

      }
      //$qtn->qtn_has_item->saveMany($itemsave);
         


      return redirect()
      ->route('erp_system.qtn.index')
      ->withSuccess('New QTN Successfully Created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function view($id)
    {
      $qtn=Qtn::orderBy('id', 'desc')->first();


     $rfq = Rfq::where('id',$id)->with('customer_belong_rfq')->first();
     $item=RfqItem::where('rfq_id',$id)
     ->join('item','item.id','=','rfq_item.item_id')
     ->select('item.item_code','item.name','item.price_sell','rfq_item.quantity','item.unit')->get(); 
     $customer = Customer::where('delete_stat', '=', 0) ->get();
     return view('erp_system.qtn.create')
     ->with('rfq', $rfq)
     ->with('customer', $customer)
     ->with('item', $item)
     ->with('qtn', $qtn);

   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SellingUpdateRequest $request, $id)
    {
      $sales = Sales::findOrFail($request->id);
      $sales->fill($request->postFillData());
      $sales->save();


      return redirect()
      ->route('admin.sellings.index')
      ->withSuccess('Transaction updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function cancel(Request $request){
     $rfq = Rfq::findOrFail($request->id);
     $rfq->approval_stat=9;
     $rfq->save();


     return redirect()
     ->route('erp_system.rfq.index')
     ->withSuccess('RFQ canceled.');
   }

 }
