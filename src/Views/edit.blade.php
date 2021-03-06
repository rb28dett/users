@extends('rb28dett::layouts.master')
@section('icon', 'ion-edit')
@section('title', __('rb28dett_users::general.edit_user'))
@section('subtitle', __('rb28dett_users::general.edit_desc', ['id' => "#".$user->id, 'time_ago' => $user->created_at->diffForHumans()]))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('rb28dett::index') }}">@lang('rb28dett_tickets::general.home')</a></li>
        <li><a href="{{ route('rb28dett::users.index') }}">@lang('rb28dett_users::general.user_list')</a></li>
        <li><span>@lang('rb28dett_users::general.edit_user')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
            <div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('rb28dett_users::general.edit_user')
                    </div>
                    <div class="uk-card-body">
                        <form method="POST" action="{{ route('rb28dett::users.update', ['user' => $user]) }}" class="uk-form-stacked">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <fieldset class="uk-fieldset">
                                <div class="uk-margin">
                                    <label class="uk-form-label">@lang('rb28dett_users::general.name')</label>
                                    <input value="{{ old('name', isset($user) ? $user->name : '') }}" name="name" class="uk-input" type="text" placeholder="@lang('rb28dett_users::general.name')">
                                </div>

                                <div class="uk-margin">
                                    <a href="{{ route('rb28dett::users.index') }}" class="uk-align-left uk-button uk-button-default">@lang('rb28dett_users::general.cancel')</a>
                                    <button type="submit" class="uk-button uk-button-primary uk-align-right">
                                        <span class="ion-forward"></span>&nbsp; @lang('rb28dett_users::general.edit')
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
        </div>
    </div>
@endsection
