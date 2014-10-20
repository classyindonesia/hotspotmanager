@if(Auth::user()->ref_user_level_id == 1)
    @include('template.komponen.menu_atas.admin')
@else
    @include('template.komponen.menu_atas.user')
@endif