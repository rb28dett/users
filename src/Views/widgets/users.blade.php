{!!
    \ConsoleTVs\Charts\Facades\Charts::multiDatabase('line', 'highcharts')
    ->title(__('rb28dett_users::general.last_users'))->dataset(__('rb28dett_users::general.new_users'), \RB28DETT\Users\Models\User::all())
    ->elementLabel(__('rb28dett_users::general.new_users'))->lastByDay(7, true)->render();
!!}
