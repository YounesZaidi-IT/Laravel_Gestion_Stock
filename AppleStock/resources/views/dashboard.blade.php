@extends('layouts.app') @section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
  <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
      <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
          <h3 class="kt-subheader__title">Dashboard
          </h3>
          <h4 class="kt-subheader__desc">Latest updates and statistic charts
          </h4>
        </div>
        <div class="kt-subheader__toolbar">
          <div class="kt-subheader__wrapper">
            @if (Auth::user()->function == 'admin')
            <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="" data-placement="top" data-original-title="Quick actions">
              <a href="#" style="background-color: #0746a7 !important;border-color: #0746a7 !important" class="btn btn-danger kt-subheader__btn-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quick Setting 
                <i class="fa fa-arrow-down" style='font-size:11px;margin-left:6px;'>
                </i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item" style='cursor: pointer;'data-toggle="modal" data-target="#ModalAddUser" >
                  <i class="la la-user" >
                  </i> Add New User
                </span>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="kt-content kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet">
          <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
              <div class="col-md-12 col-lg-6 col-xl-3">
                <!--begin::Total Profit-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Total Sell
                      </h4>
                      <span class="kt-widget24__desc">
                        Amount
                      </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-brand">
                      ${{ number_format($data->total, 2) }}
                    </span>	 
                  </div> 
                  <div class="progress progress--sm">
                    <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <div class="kt-widget24__action">
                    <span class="kt-widget24__change">
                    </span>
                    <span class="kt-widget24__number">
                    </span>
                  </div>				   			      
                </div>
                <!--end::Total Profit-->
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <!--begin::New Feedbacks-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Users
                      </h4>
                      <span class="kt-widget24__desc">
                        All users
                      </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-warning">
                      {{$data->users}}
                    </span>	 
                  </div> 
                  <div class="progress progress--sm">
                    <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <div class="kt-widget24__action">
                    <span class="kt-widget24__change">
                    </span>
                    <span class="kt-widget24__number">
                    </span>
                  </div>				   			      
                </div>				
                <!--end::New Feedbacks--> 
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <!--begin::New Orders-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Product
                      </h4>
                      <span class="kt-widget24__desc">
                        Total Product in stock
                      </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-success">
                      {{$data->product}}
                    </span>	 
                  </div> 
                  <div class="progress progress--sm">
                    <div class="progress-bar kt-bg-success" role="progressbar" style="width: 49%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <div class="kt-widget24__action">
                    <span class="kt-widget24__change">
                    </span>
                    <span class="kt-widget24__number">
                    </span>
                  </div>				   			      
                </div>				
                <!--end::New Orders--> 
              </div>
              <div class="col-md-12 col-lg-6 col-xl-3">
                <!--begin::New Users-->
                <div class="kt-widget24">
                  <div class="kt-widget24__details">
                    <div class="kt-widget24__info">
                      <h4 class="kt-widget24__title">
                        Product OUT Stock
                      </h4>
                      <span class="kt-widget24__desc">
                        OUT Stock
                      </span>
                    </div>
                    <span class="kt-widget24__stats kt-font-danger">
                      {{$data->outstock}}
                    </span>	 
                  </div> 
                  <div class="progress progress--sm">
                    <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                  <div class="kt-widget24__action">
                    <span class="kt-widget24__change">
                    </span>
                    <span class="kt-widget24__number">
                    </span>
                  </div>				   			      
                </div>				
                <!--end::New Users--> 
              </div>
            </div>
          </div>
        </div>
        <div class="row">	   
          <div class="col-xl-6">
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
                      @foreach($product as $data)  
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
                            <span class="kt-widget5__number"> {{ number_format($data->price , 2) }} $
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
          <div class="col-xl-6">
            <!--Begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
              <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                  <h3 class="kt-portlet__head-title">
                    Recent Order
                  </h3>
                </div>
              </div>
              <div class="kt-portlet__body">
                <!--Begin::Timeline 3 -->
                <div class="kt-timeline-v2">
                  <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                    @foreach($transaction as $val)
                    <div class="kt-timeline-v2__item">
                      <span class="kt-timeline-v2__item-time">{{date('m-d',strtotime($val->created_at))}}
                      </span>
                      <div class="kt-timeline-v2__item-cricle">
                        <i class="fa fa-genderless kt-font-success">
                        </i> 
                        <!-- brand-danger-warning--->
                      </div>
                      <div class="kt-timeline-v2__item-text kt-padding-top-5">
                        <a href="#" class="kt-link kt-link--brand kt-font-bolder"> {{$val->name}} 
                        </a> 
                        <code>{{$val->color}} {{$val->capacite}}G° 
                        </code>
                        <span>{{$val->total}} Order 
                        </span> 
                        Total 
                        <a href="#" class="kt-link kt-link--brand kt-font-bolder">USD {{ number_format($val->price*$val->total, 2) }} 
                        </a>
                      </div>
                      <div class="kt-list-pics kt-list-pics--sm kt-padding-l-20">
                        <a href="#">
                          <img  src= '{{asset("images/")}}/{{$val->picture}}' title="">
                        </a>
                        <code>{{ucfirst($val->user)}}
                        </code>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <!--End::Timeline 3 -->
              </div>
            </div>
          </div>
        </div>	 
      </div>
    </div>
  </div>
</div>



<div id="ModalAddUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add new User
        </h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}
            </label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
              @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}
                </strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="function" class="col-md-4 col-form-label text-md-right">{{ __('Function') }}
            </label>
            <div class="col-md-6">
              <input id="function" type="text" class="form-control{{ $errors->has('function') ? ' is-invalid' : '' }}" name="function" value="{{ old('function') }}" required autocomplete="function" autofocus>
              @if ($errors->has('function'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('function') }}
                </strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}
            </label>
            <div class="col-md-6">
              <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
              @if ($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country') }}
                </strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}
            </label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}
                </strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
            </label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password"  value="{{ old('password') }}">
              @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}
                </strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}
            </label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
@if ($errors->has('password') || $errors->has('email') || $errors->has('function') )
<script>
  $( document ).ready(function() {
    $('#ModalAddUser').modal('show');
  });
</script>
@endif
@endsection
