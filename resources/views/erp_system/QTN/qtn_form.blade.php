<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type"><title>QTN form</title>

</head><body>
<div style="text-align: center;">&nbsp;&nbsp;<b style=""><span style="font-size: 20pt; font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">PT.
KEMILAU JAYA LESTARI<o:p></o:p></span></b></div>
<p class="MsoHeader" style="margin-left: 0.75in; text-align: center;"><span style="font-size: 10pt; font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">WISMA
GKBI
39<sup>th </sup>Floor<o:p></o:p></span></p>
<p class="MsoHeader" style="margin-left: 0.75in; text-align: center;" align="center"><span style="font-size: 10pt; font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">JL.
JEND
SUDIRMAN No.28 Jakarta 10210 <o:p>&nbsp;</o:p></span></p>
<p class="MsoHeader" style="margin-left: 0.75in; text-align: center;"><span style="font-size: 10pt; font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">Phone
:
(021) 5799 8037<span style="">&nbsp; </span>email:
sales@kjlestari.com<span style="">&nbsp; </span>www.kllestari.com</span></p>
<p class="MsoHeader" style="margin-left: 0.75in; text-align: center;"><span style="font-size: 10pt; font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;"><big><big><big>RFQ
Produk/Jasa</big></big></big></span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 150%; text-align: center;"><span style="font-size: 10pt; font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;"></span></p>
<div style="text-align: left;">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 150%;"><span style="position: relative; z-index: 251652608;"><span style="position: absolute; left: -10px; top: -2px; width: 296px; height: 30px;"></span></span><span style="font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">No.<span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>:{{$qtn->number}}&nbsp; <o:p></o:p></span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 150%;"><span style="position: relative; z-index: 251654656;"></span><span style="font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">Date&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<span style="">&nbsp;&nbsp; </span>
:{{$qtn->date}}&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 150%;"><span style="font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">To&nbsp;&nbsp;
&nbsp;<span style=""> &nbsp; </span><span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>:{{$qtn->customer_belong_qtn->name}}&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 150%;"><span style="font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;">Attn&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp; :{{$qtn->attn}}&nbsp;<o:p></o:p></span></p>
<span style="font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;"><span style=""></span><o:p></o:p></span>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 150%;"><span style="position: relative; z-index: 251660800; left: -11px; top: 24px; width: 450px; height: 50px;"></span><span style="font-family: &quot;Century Gothic&quot;,&quot;sans-serif&quot;;"><o:p></o:p></span></p>
<br>
<table style="text-align: left; width: 652px; height: 60px;  " border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td>No.</td>
<td>Description</td>
<td>Qty</td>
<td>Unit</td>
<td>Unit Price</td>
<td>Total Price</td>
</tr>
<?php $no=0; 
$total=0;
?>

    @foreach ($item as $itemlist)
      <?php $no++; 
      $total+=$itemlist->price* $itemlist->quantity;
      ?>
    <tr >
      <td>
        <span >{{$no}}</span>

      </td>
      <td>
        <span >{{$itemlist->name}}</span>

      </td>
      <td>
        <span >{{$itemlist->quantity}}</span>

      </td>
      <td>
        <span >{{$itemlist->unit}}</span>

      </td>
 <td>
        <span >{{$itemlist->price}}</span>

      </td>
       <td>
        <span >{{$itemlist->price* $itemlist->quantity}}</span>

      </td>
    </tr>


    @endforeach
</tbody>
<br>
</table>
<table style="text-align: left; width: 652px; height: 60px;"border="1" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td>Delivery Cost</td>
<td>{{$qtn->delivery_cost}}</td>

</tr>
<tr>
<td>Total Amount</td>
<td>{{$total+$qtn->delivery_cost}}</td>

</tr>
</tbody>
</table>
<br>
<table style="text-align: left; width: 373px; height: 32px;" border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
<td style="width: 100px;">Delivery Time</td>
<td>{{$qtn->delivery_time}}</td>
</tr>
<tr>
<td>Delivery Point</td>
<td>{{$qtn->delivery_point}}</td>
</tr>
<tr>
<td>Payment</td>
<td>{{$qtn->payment}}</td>
</tr>
<tr>
<td>Tax</td>
<td>{{$qtn->tax}}</td>
</tr>
<tr>
<td>Validity</td>
<td>{{$qtn->validity}}</td>
</tr>
<tr>
<td>Note</td>
<td style="width: 200px;">{{$qtn->note}}</td>
</tr>
</tbody>
</table>
<br>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; line-height: 150%;"></p>
<br style="" clear="all">
</div>
</body></html>