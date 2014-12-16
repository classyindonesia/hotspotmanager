@extends('template.index')
@section('main')

<h3> <i class='fa fa-signal'></i> {{  $_ENV['NAMA_APLIKASI'] }} - {{ Fungsi::setup_variable('nama_tempat') }}</h3>
<hr>

@if(Auth::user()->ref_user_level_id == 1)
	@include('home.hotspot_info_admin')
@else
	@include('home.hotspot_info_user')
@endif

@include('home.info')



 @stop