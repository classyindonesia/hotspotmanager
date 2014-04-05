<i id='kick{{ $no }}' class='icon-remove'></i>

<script>
$('#kick{{ $no }}').click(function(){

	form_data ={
		username: '{{ $list->username }}',
		ip : '{{ $list->framedipaddress }}'
	}

	$.ajax({
		url : '{{ URL::to("kick_user") }}',
		data: form_data,
		type: 'post',
		success:function(sukses){
			alert(sukses);
			window.location.reload();
		}
	})

});

</script>