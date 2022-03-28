<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<center>
	<form method="POST" action="{{ route ('imei') }}" style="margin-top:5%">
        @csrf
		<p><input type="text" style="padding: 15px 10px 10px; font-family: 'Source Sans Pro',arial,sans-serif; border: 1px solid #cecece; color: black;box-sizing: border-box; width: 50%; max-width: 500px;" name="imei" autocomplete="off" maxlength="50" placeholder="Write here IMEI or SN"></p>
		<select name="service" id="service" style="padding: 15px 10px 10px; font-family: 'Source Sans Pro',arial,sans-serif; border: 1px solid #cecece; color: black;box-sizing: border-box; width: 50%; max-width: 500px;">
			<option value="0" selected="selected">PLEASE CHOOSE CHECKER</option>
			<optgroup label="iPHONE SERVICES">
				<option value="0.01">1.10 - APPLE SOLD BY & COVERAGE &#x26A1;</option>
			</optgroup>
		</select>
		<br /><br />
		<button onClick="this.form.submit(); this.disabled=true; this.value='Please Wait'; " type="submit" style="background-color: #2ABCA7; padding: 12px 45px; -ms-border-radius: 5px; -o-border-radius: 5px; border-radius: 5px; border: 1px solid #2ABCA7;-webkit-transition: .5s; transition: .5s; display: inline-block; cursor: pointer; width: 20%; max-width: 200px; color: #fff;">Submit</button>
	</form>

</center>


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 	@if(Session::has('success'))
        
	  	<script type="text/javascript">
	  		Swal.fire({
			  position: 'center',
			  icon: 'success',
			  title: "{!! Session::get('success') !!}",
			  showConfirmButton: false,
			  timer: 2500
			})
	  	</script>

  	@elseif(Session::has('error'))
        
        <script type="text/javascript">
	  		Swal.fire({
			  position: 'center',
			  icon: 'error',
			  title: "{!! Session::get('error') !!}",
			  showConfirmButton: false,
			  timer: 2500
			})
	  	</script>

  	@endif


</body>
</html>