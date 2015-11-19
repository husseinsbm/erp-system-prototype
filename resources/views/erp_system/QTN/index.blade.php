@extends('erp_system.admin_template')

@section('content')
<div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
      <h3>QTN <small>» Request</small></h3>
      </div>
      
    </div>

    <div class="row">
     <div class="col-sm-12">

      <table id="posts-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Date</th>
              <th>RFQ No</th>
            <th>Customer</th>
            <th>Attn</th>
            <th>Item</th>
            <th>Aproval Stat</th>

              <th data-sortable="false">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rfq as $rfqlist)
              <tr>
               
                <td>{{ date('d/m/Y', strtotime($rfqlist->date)) }}</td>
                  <td>{{ $rfqlist->number }}</td>
                    <td>{{ $rfqlist->customer_belong_rfq->name }}</td>
                     <td>{{ $rfqlist->attn }}</td>
                     <td></td>
                     <td>@if($rfqlist->approval_stat==0) Waiting @elseif($rfqlist->approval_stat==9) Canceled  @endif </td> 
                <td>
                  
                  <a href="{{url('/erp_system/qtn/'. $rfqlist->id )}}/view"
                     class="btn btn-xs btn-warning">
                    <i class="fa fa-eye"></i> View
                  </a>
                   
                   <a
                     class="btn btn-xs btn-danger" onclick="cancel_rfq('{{ $rfqlist->number}}',{{$rfqlist->id}} )">
                    <i class="fa fa-remove"></i>  Cancel
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div> 
    </div>
    </div>
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>QTN <small>» Process</small></h3>
      </div>
      
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('erp_system.partials.errors')
        @include('erp_system.partials.success')

        <table id="posts-table" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Date</th>
              <th>QTN No</th>
            <th>Customer</th>
            <th>Attn</th>
            <th>Total</th>
            <th>Aproval Stat</th>

              <th data-sortable="false">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($qtn as $qtnlist)
              <tr>
               
                <td>{{ date('d/m/Y', strtotime($qtnlist->date)) }}</td>
                  <td>{{ $qtnlist->number }}</td>
                    <td>{{ $qtnlist->customer_belong_qtn->name }}</td>
                     <td>{{ $qtnlist->attn }}</td>
                     <td>{{ $qtnlist->total }}</td>
                     <td>@if($qtnlist->approval_stat==2) Accepted @elseif($qtnlist->approval_stat==9) Canceled  @endif </td> 
                <td>
                    <a href="{{url('/erp_system/qtn/'. $qtnlist->id)}}/getpdf "
                     class="btn btn-xs btn-warning">
                    <i class="fa fa-eye"></i> PDF
                  </a>
                <!--   <a href="{{url('/erp_system/qtn/'. $qtnlist->id )}}/view"
                     class="btn btn-xs btn-warning">
                    <i class="fa fa-eye"></i> View
                  </a>
                   <a
                     class="btn btn-xs btn-danger" onclick="cancel_qtn('{{ $qtnlist->number}}',{{$qtnlist->id}} )">
                    <i class="fa fa-remove"></i>  Cancel
                  </a> -->
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
          {!! $qtn->render() !!}
      </div>
    </div>

  </div>

{{-- Cancel qtn Modal --}}
<div class="modal fade" id="modal-qtn-cancel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          ×
        </button>
        <h4 class="modal-title">Please Confirm</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i>  
          Are you sure you want to cancel the
          <kbd><span id="cancel_rqf_name"></span></kbd>
          QTN?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="{{url('/erp_system/qtn/cancel')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <input type="hidden" name="id" id="cancel_id" value="">
     
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Cancel QTN
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
<script type="text/javascript">
  
   function cancel_qtn(name,key) {
$("#cancel_qtn_name").html(name);
$("#cancel_id").val(key);
 $("#modal-qtn-cancel").modal("show");

    }

</script>
