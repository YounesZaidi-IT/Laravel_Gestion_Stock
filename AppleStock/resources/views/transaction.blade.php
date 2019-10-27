@extends('layouts.app') @section('content')
<style>
  #kt_table_1 td {
    font-size: 12px;
    font-weight: 500;
    padding: 5px;
  }
  #kt_table_1 thead tr th {
    font-size: 12px;
    padding: 6px;
  }
  table.dataTable thead th,
  table.dataTable thead td {
    border-bottom: 0px;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: none;
    color: black!important;
    border-radius: 4px;
    border: 1px solid #828282;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button:active {
    background: none;
    color: black!important;
  }
</style>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
  <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
      <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
          <h3 class="kt-subheader__title">Make new Order
          </h3>
          <h4 class="kt-subheader__desc">Manage Stock 
          </h4>
        </div>
        <div class="kt-subheader__toolbar">
          <a href="{{route('listtransaction')}}" class="btn kt-subheader__btn-secondary">
            view all Orders
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="kt-portlet" style="width:50%;margin-left:25%">
  <div class="kt-portlet__head">
    <div class="kt-portlet__head-label" >
      <h3 class="kt-portlet__head-title">
        Make new Transaction
      </h3>
    </div>
  </div>
  <!--begin::Form-->
  <form class="kt-form kt-form--label-right" enctype="multipart/form-data" method="POST" action="{{ route('add_transaction') }}">
    @csrf
    <div class="kt-portlet__body">
      <div class="form-group row">
        <label class="col-lg-1 col-sm-12">Product
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <select class="form-control" id="Product" name="Product">
            <option value='none'>Select Product
            </option>
            @foreach($name as $data)
            <option value='{{ $data -> id}}'>{{ $data -> name}} - {{ $data->color}}
            </option>
            @endforeach
          </select>	
        </div>
        <label class="col-lg-2 col-sm-12">Total Product
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input class="form-control" type="number" id="productcount" name="productcount" min="1">
        </div>
      </div>
      <div id='info'>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div id='message'>
    </div>
    <div class="kt-portlet__foot">
      <div class="kt-form__actions">
        <div class="row">
          <div class="col-lg-9 ml-lg-left">
            <button type="button" onclick='addproduct()' class="btn btn-brand">add
            </button>
            <button type="reset" class="btn btn-secondary">Cancel
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!--end::Form-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
<script>
  function addproduct(){
    var idproduct    = $("#idprod").html();
    var productcount = $("#productcount").val();
    var quantity      = $("#quantity").html();
    console.log(productcount);
    console.log(quantity);
    if(productcount >= 1){
      if(parseInt(productcount) > parseInt(quantity)){
        alert('Stay under count of quantity ')
      }
      else{
        var _token = $("input[name='_token']").val();
        $.ajax({
          url: "{{ url('/') }}/Transaction/add_transaction",
          type: "POST",
          data: {
            Action: 'get_product',
            _token: _token,
            idproduct: idproduct,
            productcount : productcount
          }
        }
              ).done(function(rep){
          if(rep.success == 'done'){
            message = '<span style="color:green">'+rep.success+'</span>'
            update_data(idproduct);
          }
          else{
            message = '<span style="color:red">'+rep.success+'</span>'
          }
          $("#message").html('<center>'+message+'</center>');
        });
      }
    }
    else{
      alert('Make sure to add a min 1 product !!')
    }
  }
  $('#Product').change(function() {
    var id = $(this).val();
    update_data(id);
  }
                      );
  function update_data(id){
    if(id != 'none'){
      $('#info').html('<center><span>Loading</span></center>');
      var _token = $("input[name='_token']").val();
      $.ajax({
        url: "{{ url('/') }}/Transaction/get_product_info",
        type: "POST",
        data: {
          Action: 'get_product',
          _token: _token,
          idproduct: id
        }
      }
            ).done(function(rep){
        var id         = rep.success[0]['id'];
        var name       = rep.success[0]['name'];
        var color      = rep.success[0]['color'];
        var price      = rep.success[0]['price'];
        var quantity   = rep.success[0]['quantity'];
        var systeme    = rep.success[0]['systeme'];
        var picture    = rep.success[0]['picture'];
        var capacite   = rep.success[0]['capacite'];
        var created_at = rep.success[0]['created_at'];
        if(quantity == 0){
          quantity = 'Out of Stock contact Admin Please';
        }
        var info = 'Product : <code id="idprod">'+id+'</code><div style="margin-top:20px" class="kt-widget5__item" id="1"><div class="kt-widget5__content"><div class="kt-widget5__pic"><img class="kt-widget7__img" src="{{asset("images/")}}/'+picture+'"  style=" background: skin-tone.jpg;background-size: cover;border-radius:10% 10% 10% 10%;width:150px;height:150px;" alt=""></div><div style="margin-top:14px" class="kt-widget5__section"><a href="#" class="kt-widget5__title kt-font-info">'+name+'</a><p class="kt-widget5__desc">color : <code>'+color+'</code> , systeme : <code>ios '+systeme+'</code></p><div class="kt-widget5__info"><span>Capacite : </span><span class="kt-font-info">'+capacite+' Go°</span><span> Date Added:</span><span class="kt-font-info"> '+created_at+'</span></div></div></div>						<div class="kt-widget5__content"><div class="kt-widget5__stats"><span class="kt-widget5__sales">Price</span> <code class="kt-widget5__number"> '+price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'$</code><span></div><div class="kt-widget5__stats"><span class="kt-widget5__votes">Quantity</span> <code class="kt-widget5__number" id="quantity">'+quantity+'</code></div></div></div>';
        $('#info').html(info);
      }
                  );
    }
    else{
      $('#info').html('<center><span>Please select a product !!</span></center>');
    }
  }
</script>
@endsection
