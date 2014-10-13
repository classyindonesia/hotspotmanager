@extends('template.index')
@section('main')

<h3> <i class='fa fa-signal'></i> Matrix Hotspot - {{ Fungsi::setup_variable('nama_tempat') }}</h3>
<hr>

@include('home.hotspot_info')


@include('home.info')



 @stop