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
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
  <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
      <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
          <h3 class="kt-subheader__title">List Users
          </h3>
          <h4 class="kt-subheader__desc">Latest Users 
          </h4>
        </div>
        <div class="kt-subheader__toolbar">
          <div class="kt-subheader__wrapper" style='cursor: pointer;' data-toggle="modal" data-target="#ModalAddUser">
            <a href="#" class="btn kt-subheader__btn-secondary">
              Add new users
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
                Users
              </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
              <div class="kt-portlet__head-wrapper">
              </div>
            </div>
          </div>
          <div class="kt-portlet__body">
		    @if (session('alert'))
			  <div class="alert alert-danger">
			  {{ session('alert') }}
			  </div>
			@endif
		  
            <!--begin: Datatable -->
            <div id="kt_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <center>
                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="kt_table_1" role="grid" aria-describedby="kt_table_1_info" style="width: 80% !important">
                      <thead>
                        <tr role="row">
                          <th class="sorting_desc" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 47.25px;" aria-sort="descending" aria-label="Order ID: activate to sort column ascending">ID
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 91.25px;" aria-label="Country: activate to sort column ascending">Name
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 115.25px;" aria-label="Ship City: activate to sort column ascending">Email
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 145.25px;" aria-label="Ship Address: activate to sort column ascending">Function
                          </th>
                          <th class="sorting" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 112.25px;" aria-label="Company Agent: activate to sort column ascending">From
                          </th>
                          <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($name as $data)
                        <tr role="row" class="odd">
                          <td class="sorting_1">{{ $data->id}}
                          </td>
                          <td>
                            <span style='color:black'>{{ $data -> name}}
                            </span>
                          </td>
                          <td>
                            <span style='color:black'>{{ $data -> email}}
                            </span>
                          </td>
                          @if($data->function == 'admin')
                          <td>
                            <span class="kt-badge  kt-badge--info kt-badge--inline kt-badge--pill">{{ ucfirst($data->function)}}
                            </span>
                          </td>
                          @elseif($data->function == 'vendeur')
                          <td>
                            <span class="kt-badge  kt-badge--warning kt-badge--inline kt-badge--pill">{{ ucfirst($data->function)}}
                            </span>
                          </td>
                          @else
                          <td>
                            <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">{{ ucfirst($data->function)}}
                            </span>
                          </td>
                          @endif
                          <td>&nbsp;
                            <span class="kt-font-bold kt-font-primary">{{ $data -> country}}
                            </span>
                          </td>
                          <td nowrap="">
                            <span class="dropdown">
                              <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h">
                                </i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-toggle="modal" data-target="#ModalupdateUser"  onclick="InfoUser({{ $data->id}});">
                                  <i class="la la-edit">
                                  </i> Edit User
                                </a>
                                <a class="dropdown-item" href="{{action('GestionUsersController@deleteUsers', $data->id) }}" >
                                  <i class="la la-leaf">
                                  </i> Remove User
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
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
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="function" class="col-md-4 col-form-label text-md-right">{{ __('Function') }}
            </label>
            <div class="col-md-6">
             <!-- <input id="function" type="text" class="form-control{{ $errors->has('function') ? ' is-invalid' : '' }}" name="function" value="{{ old('function') }}" required autocomplete="function" autofocus> @if ($errors->has('function'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('function') }}
                </strong>
              </span> @endif-->
          <select class="form-control" id="function" name="function">
            <option value='admin'>Admin</option>
            <option value='user'>User</option>
          </select>		
            </div>
          </div>
          <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('From') }}
            </label>
            <div class="col-md-6">
              <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus> @if ($errors->has('country'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}
            </label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email"> @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
            </label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password"> @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}
                </strong>
              </span> @endif
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


<div id="ModalupdateUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update User 
          <span id='username'>
          </span>
        </h4>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('updateusers') }}">
          <div class="form-group row">
		  <input type="hidden" name="idname" id='idname' value="{{ old('idname') }}">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}
            </label>
            <div class="col-md-6">
              <input id="name2" type="text" class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" name="name2" value="{{ old('name2') }}" required autocomplete="name" autofocus> @if ($errors->has('name2'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name2') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="function" class="col-md-4 col-form-label text-md-right">{{ __('Function') }}
            </label>
            <div class="col-md-6">
              <input id="function2" type="text" class="form-control{{ $errors->has('function2') ? ' is-invalid' : '' }}" name="function2" value="{{ old('function2') }}" required autocomplete="function" autofocus> @if ($errors->has('function2'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('function2') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}
            </label>
            <div class="col-md-6">
              <input id="country2" type="text" class="form-control{{ $errors->has('country2') ? ' is-invalid' : '' }}" name="country2" value="{{ old('country2') }}" required autocomplete="country" autofocus> @if ($errors->has('country2'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('country2') }}
                </strong>
              </span> @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}
            </label>
            <div class="col-md-6">
              <input id="email2" type="email" class="form-control{{ $errors->has('email2') ? ' is-invalid' : '' }}" name="email2" value="{{ old('email2') }}" required autocomplete="email"> @if ($errors->has('email2'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email2') }}
                </strong>
              </span> @endif
            </div>
          </div>
          
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
@if ($errors->has('password') || $errors->has('email'))
<script>
  $(document).ready(function() {
    $('#ModalAddUser').modal('show');
  });
</script>
@endif
@if ($errors->has('name2') || $errors->has('email2') || $errors->has('function2'))
<script>
  $(document).ready(function() {
    $('#ModalupdateUser').modal('show');
  });
</script>
@endif
<script>
  function InfoUser(id) {
    var _token = $("input[name='_token']").val();
    $.ajax({
      url: "{{ url('/') }}/dashboard/users/ajaxRequest",
      type: "POST",
      data: {
        Action: 'get_update_users',
        _token: _token,
        iduser: id
      }
    }).done(function(rep) {
      var nom   = rep.success[0]['name'];
      var id    = rep.success[0]['id'];
      var fun   = rep.success[0]['function'];
      var email = rep.success[0]['email'];
      var city  = rep.success[0]['country'];
	  console.log(id);
      $("#username").html(nom);
      $("#country2").val(city);
      $("#function2").val(fun);
      $("#name2").val(nom);
      $("#email2").val(email);
      $("#idname").val(id);
    });
  }
</script>
@endsection
