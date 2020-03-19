@extends('layouts.backend.app')

@section('content')
    @section('css')
        <style type="text/css">
            fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow:  0px 0px 0px 0px #000;
                    box-shadow:  0px 0px 0px 0px #000;
            }

            legend.scheduler-border {
                font-size: 1.2em !important;
                font-weight: bold !important;
                text-align: left !important;
                width:auto;
                padding:0 10px;
                border-bottom:none;
            }
        </style>
    @endsection

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


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                 <h4 class="card-title">{{ __('main.user_role') }}</h4>
                                <h6 class="card-subtitle"></h6>
                               
                                <div class="button-group">
                                    <div class="pull-right">
                                        <a class="btn btn-secondary waves-light btn-sm" href="{{ route('roles.index') }}"><span class="btn-label"><i class="fa fa-reply"></i></span>&nbsp;{{ __('main.back') }}
                                        </a>
                                    </div>
                                </div>

                                <p style="margin-bottom: 100px"></p>

                                    <div class="row">
                                        <div class="col-md-12">
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                                <div class="row">

                                                    <!--Name -->
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Name:</strong>
                                                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                        </div>
                                                    </div>

                                                    <!--Display Name -->
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Display Name:</strong>
                                                            {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                                                        </div>
                                                    </div>

                                                    <!-- Description -->
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>Description:</strong>
                                                            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                                                        </div>
                                                    </div>


                                                    <!-- Premission -->
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>Permission:</strong>
                                                                <p style="margin-bottom: 50px"></p>
                                                                <div class="row show-grid">
                                                                     @foreach ($arrGroup as $groupName => $data)
                                                                        <div class="col-sm-3" style="min-height: 175px;">
                                                                            <fieldset class="scheduler-border">
                                                                                <legend class="scheduler-border">{{ strtoupper($groupName) }}</legend>
                                                                                <div class="control-group">
                                                                                     @foreach($data as $value)
                                                                                        <div>
                                                                                        <label class="custom-control custom-checkbox">{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name custom-control-input')) }}
                                                                                        {{ $value->display_name }}
                                                                                            <span class="custom-control-label"></span>
                                                                                        </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                     @endforeach
                                                                </div>
                                                                <p style="margin-bottom: 50px"></p>
                                                            </div>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Submit</button>
                                                    </div> 
                                                </div>
                                            {!! Form::close() !!}    
                                        </div><!--col-md-12-->
                                    </div><!--row-->
                            </div><!--card-body-->
                        </div><!--card-->
                    </div><!--col-12-->
                </div><!--row-->
            </div><!--container-fluid-->
@endsection

