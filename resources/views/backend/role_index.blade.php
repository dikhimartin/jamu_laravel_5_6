@extends('layouts.backend.app')
@section('content')




        <!-- Bread crumb and right sidebar toggle -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">{!! $pages_title !!}</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'dashboard' )) }}">{{ __('main.dashboard') }}</a></li>
                    <li class="breadcrumb-item active">{!! $pages_title !!}</li>
                </ol>
            </div>
        </div>
        <!-- End Bread crumb and right sidebar toggle -->



        <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
 								 <h4 class="card-title">{{ __('main.user_role') }}</h4>
                                <h6 class="card-subtitle"></h6>
                            	</br></br>
								<div class="button-group">
                                   @permission('role-create')
							            <a class="btn btn-info waves-light btn-sm" href="{{ route('roles.create') }}"><span class="btn-label"><i class="fa fa-plus"></i></span>&nbsp;{{ __('main.create_new') }}
							            </a>
									@endpermission
                                </div>
                            	</br>


									<div class="row">
										<div class="col-md-12">

											@if ($message = Session::get('success'))
												<div class="alert alert-success">
													<p>{{ $message }}</p>
												</div>
											@endif
                                			<div id="notif_success"></div>
											<div class="table-responsive">
												<table class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th>No</th>
															<th>{{ __('main.name') }}</th>
															<th>{{ __('main.description') }}</th>
															<th width="280px">Action</th>
														</tr>
													</thead>

													<tbody>
														@foreach ($roles as $key => $role)
															<tr>
																<td>{{ ++$i }}</td>
																<td>{{ $role->display_name }}</td>
																<td>{{ $role->description }}</td>
																<td>
																	<a href='javascript:void(0)' onclick=show({{ $role->id }})  class="btn waves-effect waves-light btn-rounded btn-sm btn-info" href="{{ route('roles.show',$role->id) }}">{{ __('main.show') }}</a>

																	@permission('role-edit')
																	<a class="btn waves-effect waves-light btn-rounded btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">{{ __('main.edit') }}</a>
																	@endpermission


																	@permission('role-delete')
																		<a href='javascript:void(0)' onclick=removed({{ $role->id }}) class='btn waves-effect waves-light btn-rounded btn-sm btn-danger' title='{{ __('main.delete') }}'>{{ __('main.delete') }}</a>
														        	@endpermission

																</td>
															</tr>
															@endforeach
													</tbody>
												</table>
											</div>

											{!! $roles->render() !!}
										</div><!-- /.span -->
									</div><!-- /.row -->
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Container fluid  -->



        <!-- Form Modal -->
        <div class="modal fade col-md-12" id="modal_show_role" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
            <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header center bg-info">
                  <h4 class="modal-title text-white"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <!-- Modal Form -->
                <div class="modal-body">
                    <div class="widget-box">
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-sm-12">


                                        <!--names-->
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">{{ __('main.name') }}</label>
                                                <div class="col-md-9">
                                                    <input name="name" id="name" placeholder="{{ __('main.name') }}" class="form-control" type="text"  required readonly="">
                                                    <small class="form-control-feedback"></small>
                                                </div>
                                            </div>
                                        </div>

                                        <!--display_name-->
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">{{ __('main.display_name') }}</label>
                                                <div class="col-md-9">
                                                    <input name="display_name" id="display_name" placeholder="{{ __('main.display_name') }}" class="form-control" type="text"  required readonly="">
                                                    <small class="form-control-feedback"></small>
                                                </div>
                                            </div>
                                        </div>

                                        <!--description-->
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">{{ __('main.description') }}</label>
                                                <div class="col-md-9">
                                                    <input name="description" id="description" placeholder="{{ __('main.description') }}" class="form-control" type="text"  required readonly="">
                                                    <small class="form-control-feedback"></small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-5">{{ __('main.list_permissions') }}</label>
                                                <div class="col-md-9">
                                                    <div class="show_role"></div>
                                                    <small class="form-control-feedback"></small>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="modal-footer">
                       
                    </div>
                </div>

              </div>
            </form>
          </div>
        </div> 


	@push('js')

<script type="text/javascript">
	

        function show(id){
          
            console.log(id);
            $.ajax({
                url : "{{ url('dashboard/get_roles_byid') }}",
                type: "GET",
                dataType: "JSON",
                data: {"id":id},
                success: function(result)
                {
                    // console.log(result.data_role);

                    $('[name="id"]').val(result.data_role.id);
                    $('[name="name"]').val(result.data_role.name);
                    $('[name="display_name"]').val(result.data_role.display_name);
                    $('[name="description"]').val(result.data_role.description);


						var inputData = "";
						$.each(result.data_rolePermissions, function(key, value) {
							console.log(value.display_name);
							inputData += '<label class="label label-success">'+value.display_name+'</label>&nbsp;&nbsp;';
						})

						$('.show_role').html(inputData)


                    $('#modal_show_role').modal('show');
                   

                    $('.modal-title').text('Detail {{ __('main.user_role') }}');

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }


</script>

		<script type="text/javascript">
			function removed(id){
			        swal({
			            title: "{{ __('main.are_you_sure') }}",   
			            text: "{{ __('main.are_you_sure_detail') }}",   
			            type: "warning",   
			            showCancelButton: true,   
			            confirmButtonColor: "#DD6B55",   
			            confirmButtonText: "{{ __('main.yes_deleted') }}",   
			            cancelButtonText: "{{ __('main.no_cancel') }}",   
			            closeOnConfirm: false,   
			            closeOnCancel: false 
			        },
			         function(isConfirm){
			           if (isConfirm) {
			            var url ="{{url('dashboard/deleted_roles')}}";
			            $.ajax({
			                url : url,
			                type: "POST",
			                data: {"id":id},
			                dataType: "JSON",
			                headers:
			                {
			                    'X-CSRF-Token': $('input[name="_token"]').val()
			                },
			                success: function(result)
			                {
			                     if(result.data_post.status) //if success close modal and reload ajax table
			                    {   
			                        swal("{{ __('main.done') }}","{{ __('main.done_detail') }}","success");
			                        $("#notif_success").animate({
			                                left: "+=50",
			                                height: "toggle"
			                            }, 100, function() {
			                            });
			                        document.getElementById("notif_success").innerHTML ="<div class='alert alert-"+result.data_post['class']+"'>"+result.data_post['message']+"</div>";

			                        setTimeout(function() {
			                                $('#notif_success').hide();
			                            }, 1500);
			                        window.location.reload()
			                    }
			                },
			                error: function (jqXHR, textStatus, errorThrown)
			                {
			                    alert('Error deleting data');
			                }
			            });
			          }else{
			                swal("{{ __('main.cancelled') }}", "{{ __('main.cancelled_detail') }}", "error");
			          } 
			       })
			}
		</script>
	@endpush
	@stack('js')

@endsection
