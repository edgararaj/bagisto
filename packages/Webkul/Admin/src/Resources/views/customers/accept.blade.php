@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.customers.customers.edit-title') }}
@stop

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link"
                        onclick="window.location = '{{ route('admin.customer.index') }}'"></i>
                    Aceitar Registo Profissional
                </h1>
            </div>

            <div class="page-action"></div>
        </div>

        <form method="POST" action="{{ route('admin.customer.accept', $customer->id) }}" @submit.prevent="onSubmit">
            <div class="page-content">
                <div class="form-container">
                    @csrf()

                    <input name="_method" type="hidden" value="PUT">

                    <div class="style:overflow: auto;">&nbsp;</div>

                    <div slot="body">
                        {!! view_render_event('bagisto.admin.customer.edit.form.before', ['customer' => $customer]) !!}

                        <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                            <label for="first_name" class="required">
                                {{ __('admin::app.customers.customers.first_name') }}</label>

                            <input readonly type="text" class="control" id="first_name" name="first_name"
                                value="{{ old('first_name') ?: $customer->first_name }}" v-validate="'required'"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;" />

                            <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                        </div>

                        {!! view_render_event('bagisto.admin.customer.edit.first_name.after', ['customer' => $customer]) !!}

                        <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                            <label for="last_name" class="required">
                                {{ __('admin::app.customers.customers.last_name') }}</label>

                            <input readonly type="text" class="control" id="last_name" name="last_name"
                                value="{{ old('last_name') ?: $customer->last_name }}" v-validate="'required'"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">

                            <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                        </div>

                        {!! view_render_event('bagisto.admin.customer.edit.last_name.after', ['customer' => $customer]) !!}

                        <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                            <label for="email" class="required"> {{ __('admin::app.customers.customers.email') }}</label>

                            <input readonly type="email" class="control" id="email" name="email"
                                value="{{ old('email') ?: $customer->email }}" v-validate="'required|email'"
                                data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">

                            <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                        </div>

                        {!! view_render_event('bagisto.admin.customer.edit.email.after', ['customer' => $customer]) !!}

                        <div class="control-group" :class="[errors.has('phone') ? 'has-error' : '']">
                            <label for="phone">{{ __('admin::app.customers.customers.phone') }}</label>

                            <input readonly type="text" class="control" id="phone" name="phone"
                                value="{{ $customer->phone }}" v-validate="'numeric'"
                                data-vv-as="&quot;{{ __('admin::app.customers.customers.phone') }}&quot;">

                            <span class="control-error" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>
                        </div>

                        {!! view_render_event('bagisto.admin.customer.edit.phone.after', ['customer' => $customer]) !!}

                        {!! view_render_event('bagisto.admin.customer.edit.form.after', ['customer' => $customer]) !!}
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">Aceitar</button>
                </div>
            </div>
        </form>
    </div>
@stop
