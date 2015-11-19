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
use App\Item;
use App\Customer;

class RfqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      $rfq = Rfq::with('customer_belong_rfq')->where('delete_stat', '=', 0)
      ->orderBy('date', 'desc')
      ->paginate(config('erp.posts_per_page'));
      $rfq->setPath('rfq'); 

      return view('erp_system.rfq.index')->with(compact('rfq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */


public function getpdf($id){
  $rfq = Rfq::where('id',$id)->with('customer_belong_rfq')->first();
     $item=RfqItem::where('rfq_id',$id)
     ->join('item','item.id','=','rfq_item.item_id')
     ->select('item.item_code','item.name','item.price_sell','rfq_item.quantity','item.unit')->get(); 
     $customer = Customer::where('delete_stat', '=', 0) ->get();
/*     return view('erp_system.rfq.view')
     ->with('rfq', $rfq)
     ->with('customer', $customer)
     ->with('item', $item);*/
$data['rfq']=$rfq;

$data['item']=$item;

$pdf = PDF::loadView('erp_system.rfq.rfq_form',$data);
return $pdf->download('RFQ.pdf');
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
 $rfq=Rfq::orderBy('id', 'desc')->first();
   return view('erp_system.rfq.create')->with('customer', $customer)->with('rfq', $rfq);
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(RfqCreateRequest $request)
    {   
        //save selling
      $customer_id=$request->customer;
      if($customer_id==0){
         $customer = new Customer;
         $customer->name=$request->customer;
         $customer->email=$request->email;
         $customer->phone=$request->phone;
         $customer->attn=$request->attn;
         $customer->save();
         $customer_id=$customer->id;
      }
      $rfq = new Rfq;
      $rfq->employee_id=Auth::user()->id;
      $rfq->number=$request->number;
       $rfq->date=$request->date;
        $rfq->note=$request->note;
  $rfq->customer_id=$customer_id;
  $rfq->attn=$request->attn;

      $rfq->save();

        //save item_selling
      $item=json_decode($request->item_list);
      $itemsave = [];
      $i=0;
      foreach ($item as $itemlist) {
      
        $itemsave[$i]=new RfqItem;

        $itemsave[$i]->item_id = $itemlist->id;
        $itemsave[$i]->quantity= $itemlist->quantity;


        $i++;
      }

      $rfq->rfq_has_item()->saveMany($itemsave);


      return redirect()
      ->route('erp_system.rfq.index')
      ->withSuccess('New RFQ Successfully Created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function view($id)
    {
     $rfq = Rfq::where('id',$id)->with('customer_belong_rfq')->first();
     $item=RfqItem::where('rfq_id',$id)
     ->join('item','item.id','=','rfq_item.item_id')
     ->select('item.item_code','item.name','item.price_sell','rfq_item.quantity')->get(); 
     $customer = Customer::where('delete_stat', '=', 0) ->get();
     return view('erp_system.rfq.view')
     ->with('rfq', $rfq)
     ->with('customer', $customer)
     ->with('item', $item);

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
