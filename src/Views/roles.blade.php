@extends('rb28dett::layouts.master')
@section('icon', 'ion-ribbon-a')
@section('title', __('rb28dett_users::general.user_roles'))
@section('subtitle', __('rb28dett_users::general.roles_desc', ['id' => $user->id, 'total' => $roles->count()]))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('rb28dett::index') }}">@lang('rb28dett_users::general.home')</a></li>
        <li><a href="{{ route('rb28dett::users.index') }}">@lang('rb28dett_users::general.user_list')</a></li>
        <li><span>@lang('rb28dett_users::general.user_roles')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
            <div class="uk-width-1-1@s uk-width-3-5@l">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('rb28dett_users::general.user_roles')
                    </div>
                    <div class="uk-card-body">
                        <form class="uk-form-stacked" method="POST">
                            {{ csrf_field() }}
                            @if(isset($method)) {{ method_field($method) }} @endif
                                <fieldset class="uk-fieldset">
                                   <div uk-grid>
                                   @foreach($roles as $role)
                                       <div class="uk-width-1-1@m uk-width-1-2@l">
                                           <label><input class="uk-checkbox" name="{{ $role->id }}" type="checkbox"  @if($role->hasUser($user)) checked @endif> {{ $role->name }}</label>
                                           <div class="uk-text-meta">
                                               {{ $role->description }}
                                           </div>
                                       </div>
                                   @endforeach
                                   </div>

                                   <div class="uk-margin">
                                       <a href="{{ route('rb28dett::users.index') }}" class="uk-button uk-button-default uk-align-left"> @lang('rb28dett_users::general.cancel')</a>
                                       <div class="uk-align-right">
                                           <button type="submit" class="uk-button uk-button-primary">
                                               <span class="ion-forward"></span>&nbsp; @lang('rb28dett_users::general.submit')
                                           </button>
                                       </div>
                                   </div>
                               </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
        </div>
    </div>


@endsection
