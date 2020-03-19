@extends('layouts.backend.app')
@section('content')

<!-- style -->
<link href="{{ URL::asset('admin_assets/assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<!-- style -->

<!-- Bread crumb and right sidebar toggle -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">{!! $pages_title !!}</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'admin' )) }}">{{ __('main.dashboard') }}</a></li>
            <li class="breadcrumb-item active">{!! $pages_title !!}</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->


<!-- Container fluid  -->

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">

                        <center class="m-t-30"><img src="{{ $image != '' ? '/images/profile/' . $image : '/images/profile/anonymous.png' }}" class="img-circle" width="150" />
                            <h4 class="card-title m-t-10">
                                <a href="#" id="name" data-type="text" data-pk="{{ $data_user->id_users }}" 
                                    data-title="Edit Name">{!! $data_user->name !!}
                                </a>
                            </h4>
                            <h6 class="card-subtitle">{{ $get_roles->name }}</h6>
                            <div class="row text-center justify-content-md-center">
                               {{--  <div class="col-4">
                                    <a href="javascript:void(0)" class="link"><i class="icon-people"></i><font class="font-medium">254</font>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link"><i class="icon-picture"></i><font class="font-medium">54</font>
                                    </a>
                                </div> --}}
                            </div>
                        </center>
                    </div>
                    <div><hr></div>
                    <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
                    <div class="card-body"> 
                        <small class="text-muted">{{ __('main.date_birth') }}</small>
                        <h6>{!! date('d M Y', strtotime(Auth::user()->date_birth)) !!}</h6> 

                        <small class="text-muted">Email address </small>
                        <h6> <a href="#" id="email" data-type="text" data-pk="{{ $data_user->id_users }}" 
                                data-title="Edit Email">{!! $data_user->email !!}
                            </a>
                        </h6> 

                        <small class="text-muted">Phone</small>
                        <h6>
                            <a href="#" id="telephone" data-type="text" data-pk="{{ $data_user->id_users }}" 
                                data-title="Edit telephone">{!! $data_user->telephone !!}
                            </a>
                        </h6> 

                        <small class="text-muted">Address</small>
                        <h6>
                            <a href="#" id="address" data-type="textarea" data-pk="{{ $data_user->id_users }}" 
                                data-title="Edit Address">{!! $data_user->address !!}
                            </a>
                        </h6> 


                      {{--   <div class="map-box">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted p-t-30 db">Social Profile</small>
                        <br/>
                        <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button> --}}
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                    </ul>

                        <!-- form profile-->
                        <form method="POST" action="{{LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'admin/update_profile' ))}}" enctype="multipart/form-data">
                             {{ csrf_field() }}

                            <!-- Tab panes -->
                            <div class="tab-content">

                            <!--profile-->
                            <div class="tab-pane active" id="profile" role="tabpanel">
                                <div class="card-body">

                                    @if ( session()->has('message') )
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                           {{ session()->get('message') }}.
                                        </div>
                                    @endif

                                    <!-- username -->
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-md-4 col-form-label">{{ __('main.username') }}</label>
                                      <div class="col-md-8">
                                        <input type="hidden" name="id_users" value="{{$id_users}}">
                                        <input class="form-control" name="nik" type="text" value="{{$nik}}" id="example-text-input" readonly="">
                                      </div>
                                    </div>

                                    <!-- name -->
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-md-4 col-form-label">{{ __('main.name') }}</label>
                                      <div class="col-md-8">
                                        <input class="form-control" name="names" type="text" value="{{$name}}" id="example-text-input" required>
                                      </div>
                                    </div>

                                    <!-- email -->
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-md-4 col-form-label">{{ __('main.email') }}</label>
                                      <div class="col-md-8">
                                        <input class="form-control" name="email" type="text" value="{{$email}}" id="example-text-input" required>
                                      </div>
                                    </div>


                                    <!--pilih_gender-->    
                                    <div class="form-body" id="pilih_gender">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-4 col-form-label">{{ __('main.gender') }}</label>
                                            <div class="col-md-8">
                                               <div class="demo-radio-button">
                                                @if($gender =='L')
                                                    <input name="gender" type="radio" value="L" class="with-gap price_type" id="radio_1" checked="" />
                                                    <label for="radio_1">{{__('main.male')}}</label>
                                                    <input name="gender" type="radio" value="P" class="with-gap price_type" id="radio_2"/>
                                                    <label for="radio_2">{{__('main.female')}}</label>
                                                @else
                                                    <input name="gender" type="radio" value="L" class="with-gap price_type" id="radio_1"/>
                                                    <label for="radio_1">{{__('main.male')}}</label>
                                                    <input name="gender" type="radio" value="P" class="with-gap price_type" id="radio_2" checked=""/>
                                                    <label for="radio_2">{{__('main.female')}}</label>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="control-label col-md-4">{{ __('main.image') }} {{ __('main.profile') }}</label>
                                            <div class="col-md-8">
                                                <input type="file" name="image" id="image" onchange="previewImage(this,[256],4);" accept="image/*"/ class="form-control">
                                                </br></br>
                                                <div class="imagePreview img-circle"></div>
                                                 <small class="form-control-feedback"></small>
                                            </div>
                                        </div>
                                    </div>

                                     <button type="submit" class="btn btn-sm  btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>&nbsp;{{ __('main.edit') }} {{ __('main.profile') }}</button>

                                </div>
                            </div>
                        </form>
                        <!-- end form profile-->

                        <div class="tab-pane" id="settings" role="tabpanel">
                            <!-- form Password-->
                             <div class="card-body">
                                  <h3>{{ __('main.edit') }} {{ __('main.password') }}</h3>
                                  </br>
                                  
                                    <form class="form-horizontal" role="form" id="password_change" method="post" action="{{ url('admin/update_password_profile') }}">
                                    {{ csrf_field() }}
                                    <!-- #section:elements.form -->


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label"  for="password">{{ __('main.password') }} {{ __('main.new') }}</label>                                            
                                             <input type="password" class="form-control" name="password" placeholder="{{ __('main.password') }} {{ __('main.new') }}" required="required" id="password1" onkeyup="checkPass1(); return false;">
                                            <small class="form-control-feedback" id="confirmMessage1"></small> 
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label"  for="password">{{ __('main.confirm') }} {{ __('main.password') }}</label>                                            
                                                <input type="password" class="form-control" name="password_confrim" placeholder="{{ __('main.confirm') }} {{ __('main.password') }}" id="password2" required="required" onkeyup="checkPass(); return false;">
                                            <small class="form-control-feedback" id="confirmMessage"></small> 
                                        </div>
                                    </div>


                                    <div class="clearfix form-actions">
                                      <div class="col-md-offset-3 col-md-9">
                                        
                                      <input type="hidden" name="id_users" value="{{$id_users}}">
                                        <button type="submit" id="submit" class="btn btn-sm  btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>&nbsp;{{ __('main.edit') }} {{ __('main.password') }}</button>
                                        &nbsp; &nbsp; &nbsp;
                                        <button class="btn btn-sm btn-secondary" type="reset">
                                          <i class="ace-icon fa fa-undo bigger-110"></i>
                                          Reset
                                        </button>
                                      </div>
                                    </div>
                                  </form>
                            </div>
                            <!--end  form Password-->
                        </div>


                    </div><!-- end Tab panes -->
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme working">10</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>

<!-- Container fluid  -->

@endsection

@push('js')
    <script type="text/javascript" src="{{ URL::asset('admin_assets/assets/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js') }}">
    </script>   

    <script src="{{ URL::asset('admin_assets/assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
<script type="text/javascript">

    document.getElementById("submit").disabled = true;
      $( "#password_change" ).submit(function( event ) {
        dataString = $("#password_change").serialize();
        // console.log(dataString);
            $.ajax({
               type: "POST",
               url: $(this).attr('action'),
               data: dataString,
               success: function(data)
               {   
                   $.toast({
                        heading: 'Success',
                        text: 'Your Password has been Changes',
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'success',
                        hideAfter: 2000, 
                        stack: 6
                      });
               }
             });
             return false; 
        event.preventDefault();
    });

    function checkPass(){
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('password1');
        var pass2 = document.getElementById('password2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field
        //and the confirmation field
        if(pass1.value =="" && pass2.value ==""){
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Not empty!";
            document.getElementById("submit").disabled = true;
        }
        else if (pass1.value == pass2.value) {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!";
            document.getElementById("submit").disabled = false;
        } else {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!";
            document.getElementById("submit").disabled = true;
        }
    }


    function checkPass1(){
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('password1');
        var pass2 = document.getElementById('password2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field
        //and the confirmation field
        if(pass1.value =="" && pass2.value ==""){
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Not empty!";
            document.getElementById("submit").disabled = true;
        }
        else if (pass1.value == pass2.value) {
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!";
            document.getElementById("submit").disabled = false;
        } else {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!";
            document.getElementById("submit").disabled = true;
        }
    }

    //text inline update
    $(document).ready(function() {

     $.fn.editable.defaults.mode = 'inline';

       $.fn.editable.defaults.params = function (params) 
       {
        params._token = $("#_token").data("token");
        return params;
       };

        $('#name').editable({
                validate: function(value) {
                    if($.trim(value) == '') 
                        return 'Value is required.';
                    },
                type: "text",
                url:'{{url('admin/UpdateInlineName')}}',  
                send:'always',
                ajaxOptions: {
                dataType: 'json'
                }
        });

        $('#email').editable({
            validate: function(value) {
                if($.trim(value) == '') 
                    return 'Value is required.';
                },
            type: "text",
            url:'{{url('admin/UpdateInlineEmail')}}',  
            send:'always',
            ajaxOptions: {
            dataType: 'json'
            }
        });

        $('#telephone').editable({
            validate: function(value) {
                if($.trim(value) == '') 
                    return 'Value is required.';
                },
            type: "text",
            url:'{{url('admin/UpdateInlineTelephone')}}',  
            send:'always',
            ajaxOptions: {
            dataType: 'json'
            }
        });

        $('#address').editable({
            validate: function(value) {
                if($.trim(value) == '') 
                    return 'Value is required.';
                },
            type: "text",
            url:'{{url('admin/UpdateInlineAddress')}}',  
            send:'always',
            ajaxOptions: {
            dataType: 'json'
            }
        });

    } );     
      
</script>
@endpush