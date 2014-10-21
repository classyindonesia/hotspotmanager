<h4>Tulis Pesan</h4>

<hr>
<input maxlength="225" type='text' class='form-control' placeholder='tulis pesan...' id='pesan' />

<script type="text/javascript">
$(document).ready(function(){
	$('#pesan').focus();
});






$("#pesan").keypress(function(e) {
    if(e.which == 13) {
        
        pesan = $('#pesan').val();
         if(pesan == ''){
        	return false;
        }

        $('#pesan').attr('readonly', '0');

        $.ajax({
        	url : '{{ URL::route("obrolan_insert") }}',
        	data : { username : '{{ Auth::user()->username }}', pesan : pesan},
        	type : 'post',
        	error :function(err){
        		alert('error! terjadi kesalahan pada sisi server!');
        		$('#pesan').removeAttr('readonly');
        	},
        	success:function(ok){
        		$('#pesan').val('');
        		$('#pesan').removeAttr('readonly');
        	}
        })



    }
});

</script>