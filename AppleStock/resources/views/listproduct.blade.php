@extends('layouts.app') @section('content')
<style>
  #kt_table_1 td {
    font-size: 12px;
    font-weight: 500;
    padding: 3px;
  }
  #kt_table_1 thead tr th {
    font-size: 12px;
    padding: 5px;
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
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
  <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
      <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
          <h3 class="kt-subheader__title">List Product
          </h3>
          <h4 class="kt-subheader__desc">Manage Stock Product 
          </h4>
        </div>
        @if(Auth::user()->function == 'admin')
        <div class="kt-subheader__toolbar">
          <div class="kt-subheader__wrapper" style='cursor: pointer;' data-toggle="modal" data-target="#ModalAddUser">
            <a href="{{route('showProduct')}}" class="btn kt-subheader__btn-secondary">
              Add new product
            </a>
          </div>
        </div>
        @endif
      </div>
      <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
          <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart">
                </i>
              </span>
              <h3 class="kt-portlet__head-title">
                Manager Product
              </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
              <div class="kt-portlet__head-wrapper">
              </div>
            </div>
          </div>
          <div class="kt-portlet__body">
            <!--begin: Datatable -->
            <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <center>
				  @if($name)
                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="kt_table_1" role="grid" aria-describedby="kt_table_1_info" style="width: 80% !important">
                      <thead>
                        <tr role="row">
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Picture
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 91.25px;" aria-label="Country: activate to sort column ascending">Name
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 115.25px;" aria-label="Ship City: activate to sort column ascending">Quantity
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 145.25px;" aria-label="Ship Address: activate to sort column ascending">Price
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Color
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Capacite
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Systeme
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Date Add
                          </th>
                          <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($name as $data)
                        <tr role="row" class="odd">
                          <td>
                            <center>
                              <img src='{{asset("images/")}}/{{$data->picture}}' style=" background: skin-tone.jpg;background-size: cover;border-radius:10% 10% 10% 10%;width:30px;height:30px;" alt="">
                            </center>
                          </td>
                          <td>
                            <span style='color:black;margin-left:3px'>{{ $data -> name}}
                            </span>
                          </td>
                          <td>
                              @if($data -> quantity == 0)
       <span class="kt-font-bold kt-font-primary" style='float:right;margin-right:10px'><code>Out Of Stock !!</code></span>

                              @else
       <span class="kt-font-bold kt-font-primary" style='float:right;margin-right:10px'>{{ $data -> quantity}}</span>

                              @endif
                            
                          </td>
                          <td>&nbsp;
                            <span style='color:green;float:right;margin-right:10px'>{{ number_format($data->price , 2) }}$
                            </span>
                          </td>
                          <td>
                            <span style='color:black;margin-left:3px'>{{ $data -> color}}
                            </span>
                          </td>
                          <td>
                            <span style='color:black;margin-left:3px'>{{ $data -> capacite}} Go°
                            </span>
                          </td>
                          <td>
                            <span style='color:black;margin-left:3px;'>IOS {{ $data -> systeme}}
                            </span>
                          </td>
                          <td>
                            <span style='color:black;margin-left:3px'>{{ date('Y-m-d',strtotime($data->created_at))}}
                            </span>
                          </td>
                          <td nowrap="">
                            @if(Auth::user()->function == 'admin')			
                            <span class="dropdown">
                              <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h">
                                </i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-toggle="modal" data-target="#ModalupdateProduct"  onclick="InfoUser({{ $data->id}});">
                                  <i class="la la-edit">
                                  </i> Edit Product
                                </a>
                                <a class="dropdown-item" href="{{action('ProductController@removeProduct', $data->id) }}" >
                                  <i class="la la-leaf">
                                  </i> Remove Product
                                </a>
                              </div>
                            </span>
                            @else
                            <span style="font-size:11px">Only Admin
                            </span>   
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
					 @else
						 <center><span style="width: 100px;"><span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger">No data Found !!</span></span></center>
				    @endif
                  </center>
                </div>
              </div>
            </div>
            <!--end: Datatable -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!------>
<div id="ModalupdateProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Product 
          <span id='username'>
          </span>
        </h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('update_product') }}"  enctype="multipart/form-data" >
          <div class="form-group row">
            <label for="nameprocut" class="col-md-4 col-form-label text-md-right">{{ __('Name procut') }}
            </label>
            <div class="col-md-6">
              <input id="nameprocut" type="text" class="form-control{{ $errors->has('nameprocut') ? ' is-invalid' : '' }}" name="nameprocut" value="{{ old('nameprocut') }}" required autocomplete="nameprocut" autofocus> @if ($errors->has('nameprocut'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nameprocut') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="Quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}
            </label>
            <div class="col-md-6">
              <input id="quantity" type="text" class="form-control{{ $errors->has('Quantity') ? ' is-invalid' : '' }}" name="Quantity" value="{{ old('Quantity') }}" required autocomplete="Quantity" autofocus> @if ($errors->has('Quantity'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Quantity') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}
            </label>
            <div class="col-md-6">
              <input id="price" type="text" class="form-control{{ $errors->has('Price') ? ' is-invalid' : '' }}" name="Price" value="{{ old('Price') }}" required autocomplete="Price" autofocus> @if ($errors->has('Price'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Price') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="Color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}
            </label>
            <div class="col-md-6">
              <input id="color" type="text" class="form-control{{ $errors->has('Color') ? ' is-invalid' : '' }}" name="Color" value="{{ old('Color') }}" required autocomplete="color"> @if ($errors->has('Color'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Color') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="Capacite" class="col-md-4 col-form-label text-md-right">{{ __('Capacite') }}
            </label>
            <div class="col-md-6">
              <input id="capacite" type="Capacite" class="form-control{{ $errors->has('Capacite') ? ' is-invalid' : '' }}" name="Capacite" value="{{ old('Capacite') }}" required autocomplete="Capacite"> @if ($errors->has('Capacite'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Capacite') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="Systeme" class="col-md-4 col-form-label text-md-right">{{ __('Systeme') }}
            </label>
            <div class="col-md-6">
              <input id="systeme" type="Systeme" class="form-control{{ $errors->has('Systeme') ? ' is-invalid' : '' }}" name="Systeme" value="{{ old('Systeme') }}" required autocomplete="Systeme"> @if ($errors->has('Systeme'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Systeme') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="Color" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}
            </label>
            <div class="col-md-6">
              <img id='picture' src=""  style=" background: skin-tone.jpg;background-size: cover;border-radius:10% 10% 10% 10%;width:150px;height:150px;"/>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="Picture">
                <label class="custom-file-label" for="customFile">
                </label>		
              </div>
            </div>
          </div>	
          <input type="hidden" id='picture' name="delete">	
          <input type="hidden" id='idproduct' name="idproduct">					
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!------>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
<script>
  function InfoUser(id) {
    var _token = $("input[name='_token']").val();
    $.ajax({
      url: "{{ url('/') }}/product/update",
      type: "POST",
      data: {
        Action: 'update_product',
        _token: _token,
        idproduct: id
      }
    }
          ).done(function(rep){
      console.log(rep);
      var name     = rep.success[0]['name'];
      var id       = rep.success[0]['id'];
      var capacite = rep.success[0]['capacite'];
      var color    = rep.success[0]['color'];
      var picture  = rep.success[0]['picture'];
      var price    = rep.success[0]['price'];
      var quantity = rep.success[0]['quantity'];
      var systeme  = rep.success[0]['systeme'];
      $("#nameprocut").val(name);
      $("#idproduct").val(id);
      $("#capacite").val(capacite);
      $("#color").val(color);
      $("#picture").attr("src", '{{asset("images/")}}/'+picture);
      $("#price").val(price);
      $("#quantity").val(quantity);
      $("#systeme").val(systeme);
    }
                );
  }
</script>
@endsection
