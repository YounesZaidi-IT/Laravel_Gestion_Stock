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
          <h3 class="kt-subheader__title">Add new Product
          </h3>
          <h4 class="kt-subheader__desc">Manage Stock 
          </h4>
        </div>
        <div class="kt-subheader__toolbar">
          <a href="{{route('showall')}}" class="btn kt-subheader__btn-secondary">
            view all product
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
        Add new Product
      </h3>
    </div>
  </div>
  <!--begin::Form-->
  <form class="kt-form kt-form--label-right" enctype="multipart/form-data" method="POST" action="{{ route('addProduct') }}">
    @csrf
    <div class="kt-portlet__body">
      <div class="form-group row">
        <label class="col-lg-1 col-sm-12">Name
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="text" class="form-control" id="nameprocut" name="nameprocut" im-insert="true" placeholder="Iphone .." value="{{ old('nameprocut') }}">
          <code>{{ $errors->first('nameprocut') }}
          </code>	
        </div>
        <label class="col-lg-1 col-sm-12">Quantity
        </label>
        <div class="col-lg-5 col-md-9 col-sm-12">
          <input type="text" class="form-control" id="Quantity" name="Quantity" im-insert="true" placeholder="..." value="{{ old('Quantity') }}">
          <code>{{ $errors->first('Quantity') }}
          </code>	
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-1 col-sm-12">Price
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="text" class="form-control" id="Price" name="Price" im-insert="true" placeholder="$" value="{{ old('Price') }}">
          <code>{{ $errors->first('Price') }}
          </code>	
        </div>
        <label class="col-lg-1 col-sm-12" >Color
        </label>
        <div class="col-lg-5 col-md-9 col-sm-12">
          <select class="form-control" id="Color" name="Color">
            <option>Black
            </option>
            <option>White
            </option>
            <option>Gold
            </option>
            <option>Silver
            </option>
            <option>Red
            </option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-1 col-sm-12">Capacite
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <select class="form-control" id="Capacite" name="Capacite">
            <option value='16'>16 Go
            </option>
            <option value='32'>32 Go
            </option>
            <option value='64'>64 Go
            </option>
            <option value='256'>256 Go
            </option>
            <option value='512'>512 Go
            </option>
          </select>
        </div>
        <label class="col-lg-1 col-sm-12">Systeme
        </label>
        <div class="col-lg-5 col-md-9 col-sm-12">
          <input type="text" class="form-control" id="Systeme" name="Systeme" im-insert="true"  placeholder="IOS Version .." value="{{ old('Systeme') }}">
          <code>{{ $errors->first('Systeme') }}
          </code>	
        </div>
      </div>
      <div class="form-group row">
        <label class="col-lg-1 col-sm-12">Picture 
        </label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="Picture" name="Picture" value="{{ old('Picture') }}">
            <label class="custom-file-label" for="customFile">
            </label>
            <code>{{ $errors->first('Picture') }}
            </code>		
          </div>
        </div>
      </div>
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="kt-portlet__foot">
      <div class="kt-form__actions">
        <div class="row">
          <div class="col-lg-9 ml-lg-left">
            <button type="submit" class="btn btn-brand">Submit
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
<div class="col-xl-8"  style="width:50%;margin-left:25%">
  <!--begin:: Widgets/Best Sellers-->
  <div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          Last Product Added
        </h3>
      </div>
    </div>
    <div class="kt-portlet__body">
      <div class="tab-content">
        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
          <div class="kt-widget5">
            @foreach($name as $data)  
            <div class="kt-widget5__item" id= "{{ $data->id }}">
              <div class="kt-widget5__content">
                <div class="kt-widget5__pic">
                  <img class="kt-widget7__img" src= '{{asset("images/")}}/{{$data->picture}}' alt="">
                </div>
                <div class="kt-widget5__section">
                  <a href="#" class="kt-widget5__title kt-font-info">
                    {{ $data->name }}
                  </a>
                  <p class="kt-widget5__desc">
                    color 
                    <code>{{ $data->color }}
                    </code> systeme : 
                    <code>ios {{ $data->systeme }}
                    </code>
                  </p>
                  <div class="kt-widget5__info">
                    <span>Capacite : 
                    </span>
                    <span class="kt-font-info">{{ $data->capacite }} Go°
                    </span>
                    <span>Date Added:
                    </span>
                    <span class="kt-font-info"> {{ date('Y-m-d',strtotime($data->created_at)) }} 
                    </span>
                  </div>
                </div>
              </div>						
              <div class="kt-widget5__content">
                <div class="kt-widget5__stats">
                  <span class="kt-widget5__number"> {{ number_format($data->price , 2) }}$ 
                  </span>
                  <span class="kt-widget5__sales">Price
                  </span>
                </div>
                <div class="kt-widget5__stats">
                  <span class="kt-widget5__number">{{ $data->quantity }}
                  </span>
                  <span class="kt-widget5__votes">Quantity
                  </span>
                </div>
              </div>	
            </div>	
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!--end:: Widgets/Best Sellers-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
@endsection
