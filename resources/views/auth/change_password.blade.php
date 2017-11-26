@extends('layouts.app')

@section('content')


	@if(session('success'))
		<!-- If password successfully show message -->
		<div class="row">
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-md-6">

            <h3 class="page-title">@lang('quickadmin.qa_change_password')</h3>

            {!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
            <!-- If no success message in flash session show change password form  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('quickadmin.qa_edit')
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('current_password', trans('quickadmin.qa_current_password'), ['class' => 'control-label']) !!}
                                {!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('current_password'))
                                    <p class="help-block">
                                        {{ $errors->first('current_password') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('new_password', trans('quickadmin.qa_new_password'), ['class' => 'control-label']) !!}
                                {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('new_password'))
                                    <p class="help-block">
                                        {{ $errors->first('new_password') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 form-group">
                                {!! Form::label('new_password_confirmation', trans('quickadmin.qa_password_confirm'), ['class' => 'control-label']) !!}
                                {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('new_password_confirmation'))
                                    <p class="help-block">
                                        {{ $errors->first('new_password_confirmation') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
		</div>

		<div class="col-md-6">

            <h3 class="page-title">Choose avatar</h3>

                {!! Form::open(['method' => 'POST', 'route' => 'choose_avatar', 'files' => true]) !!}

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('avatar', 'Avatar:', ['class' => 'control-label']) !!}
                            {!! Form::file('avatar') !!}
                        </div>
                    </div>

                    {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
		</div>
	</div>

@stop





































