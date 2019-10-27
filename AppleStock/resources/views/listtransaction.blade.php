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
          <h3 class="kt-subheader__title">List Orders
          </h3>
          <h4 class="kt-subheader__desc">View all Transaction 
          </h4>
        </div>
        <div class="kt-subheader__toolbar">
          <div class="kt-subheader__wrapper" style='cursor: pointer;' data-toggle="modal" data-target="#ModalAddUser">
            <a href="{{route('showtransaction')}}" class="btn kt-subheader__btn-secondary">
              Add new Order
            </a>
          </div>
        </div>
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
                Manager Transaction
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
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 145.25px;" aria-label="Ship Address: activate to sort column ascending">Price
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Color
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Capacite
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Systeme
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Date Order
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Order/Count
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">Total Order
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">User
                          </th>
                          <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Remove
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
                          <td>&nbsp;
                            <span style='color:green;float:right;margin-right:10px'>{{ $data -> price	}}$
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
                            <span style='color:black;margin-left:3px'>{{date('Y-m-d',strtotime($data->created_at))}}
                            </span>
                          </td>
                          <td>
                            <span style='color:black;float:right;margin-right:10px'> {{ $data -> total}}
                            </span>
                          </td>
                          <td>
                            <span  style='color:green;float:right;margin-right:10px'>{{ number_format($data -> total * $data -> price , 2) }}$
                            </span>
                          </td>
                          <td>
                            <span style='color:black;margin-left:3px;'> {{ $data -> user}}
                            </span>
                          </td>
                          @if(Auth::user()->function == 'admin')
                          <td nowrap="">
                            <a class="dropdown-item" href="{{action('TransactionController@removeOrder', $data->id) }}" >
                              <i class="la la-leaf">
                              </i> Remove Order
                            </a>
                            @else
                          <td>
                            <span style='font-size:11px'>Only.admin
                            </span>
                          </td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
@endsection
