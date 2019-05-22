@extends('rb28dett::layouts.master')
@section('icon', 'ion-person-stalker')
@section('title', __('rb28dett_users::general.user_list'))
@section('subtitle', __('rb28dett_users::general.users_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('rb28dett::index') }}">@lang('rb28dett_users::general.home')</a></li>
        <li><span href="">@lang('rb28dett_users::general.user_list')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1">
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('rb28dett_users::general.user_list')
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('rb28dett_users::general.name')</th>
                                        <th>@lang('rb28dett_users::general.email')</th>
                                        <th>@lang('rb28dett_users::general.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="uk-table-shrink">
                                                <div class="uk-button-group">
                                                    @can('roles', $user)
                                                        <a href="{{ route('rb28dett::users.roles.manage', ['id' => $user->id]) }}" class="uk-button uk-button-small uk-button-default">
                                                            @lang('rb28dett_users::general.roles')
                                                        </a>
                                                    @else
                                                        <button disabled class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('rb28dett_users::general.roles')
                                                        </button>
                                                    @endcan
                                                    @can('update', $user)
                                                        <a href="{{ route('rb28dett::users.edit', ['id' => $user->id]) }}" class="uk-button uk-button-small uk-button-default @if($user->id == Auth::id()) uk-disabled @endif">
                                                            @lang('rb28dett_users::general.edit')
                                                        </a>
                                                    @else
                                                        <button disabled class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('rb28dett_users::general.edit')
                                                        </button>
                                                    @endcan
                                                    @can('delete', $user)
                                                        <a href="{{ route('rb28dett::users.destroy.confirm', ['user' => $user->id]) }}" class="uk-button uk-button-small uk-button-danger @if($user->id == Auth::id()) uk-disabled @endif">
                                                            @lang('rb28dett_users::general.delete')
                                                        </a>
                                                    @else
                                                        <button disabled class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('rb28dett_users::general.delete')
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->links('rb28dett::layouts.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
