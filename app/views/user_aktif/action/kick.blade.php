<i data-toggle='tooltip' title='kick' id='kick{{ $no }}' class='fa fa-times text-danger' style='cursor:pointer;'></i>

<script>

$('#kick{{ $no }}').click(function(){
 setuju = confirm('are you sure ?');
 if(setuju == true){
 		form_data ={
		username: '{{ $list->username }}',
		ip : '{{ $list->framedipaddress }}',
		nas_ip : '{{ $list->nasipaddress }}'
	}

	$.ajax({
		url : '{{ URL::to("kick_user") }}',
		data: form_data,
		type: 'post',
		success:function(sukses){
			//alert(sukses);
			window.location.reload();
		}
	})
}

});

</script>