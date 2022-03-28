<center>
	  @if(Session::has('success'))
                    <div class="alert alert-success">
                        {!! Session::get('success') !!}
                    </div>
      @endif
	<form method="POST" action="{{ route ('imei') }}" style="margin-top:5%">
        @csrf
		<p><input type="text" style="padding: 15px 10px 10px; font-family: 'Source Sans Pro',arial,sans-serif; border: 1px solid #cecece; color: black;box-sizing: border-box; width: 50%; max-width: 500px;" name="imei" autocomplete="off" maxlength="50" placeholder="Write here IMEI or SN"></p>
		<select name="service" id="service" style="padding: 15px 10px 10px; font-family: 'Source Sans Pro',arial,sans-serif; border: 1px solid #cecece; color: black;box-sizing: border-box; width: 50%; max-width: 500px;">
			<option value="0" selected="selected">PLEASE CHOOSE CHECKER</option>
			<optgroup label="iPHONE SERVICES">
				<option value="3">1.10 - APPLE SOLD BY & COVERAGE &#x26A1;</option>
				<option value="103">0.05 - iPHONE CARRIER &#x26A1;</option>
				<option value="102">0.12 - iPHONE CARRIER S1 &#x26A1;</option>
				<option value="101">0.12 - iPHONE CARRIER S2 &#x26A1;</option>
				<option value="38">0.09 - iPHONE CARRIER S3 &#x26A1;</option>
				<option value="8">0.05 - iPHONE SIM-LOCK &#x26A1;</option>
				<option value="12">0.05 - IMEI &#x21C4; SN CONVERT &#x26A1;</option>
				<option value="201">0.15 - UDID &#x2192; SN CONVERT &#x26A1;</option>
				<option value="30">0.06 - APPLE BASIC INFO &#x26A1;</option>
				<option value="26">0.01 - APPLE SERIAL INFO &#x26A1;</option>
				<option value="109">0.05 - APPLE iCLOUD HINT &#x26A1;</option>
				<option value="3">0.02 - iCLOUD ON/OFF &#x26A1;</option>
				<option value="4">0.06 - iCLOUD CLEAN/LOST &#x26A1;</option>
				<option value="10">0.03 - APPLE ACTIVATION STATUS &#x26A1;</option>
				<option value="110">2.70 - MACBOOK/iMAC INFO & ICLOUD STATUS &#x26A1;</option>
				<option value="49">2.40 - APPLE iOS & MAC MDM STATUS &#x26A1;</option>
				<option value="11">3.40 - APPLE iOS & MAC MDM STATUS &#x1F552;</option>
				<option value="40">3.50 - APPLE iOS & MAC MDM & iCLOUD STATUS &#x26A1;</option>
			</optgroup>
		</select>
		<br /><br />
		<button onClick="this.form.submit(); this.disabled=true; this.value='Please Wait'; " type="submit" style="background-color: #2ABCA7; padding: 12px 45px; -ms-border-radius: 5px; -o-border-radius: 5px; border-radius: 5px; border: 1px solid #2ABCA7;-webkit-transition: .5s; transition: .5s; display: inline-block; cursor: pointer; width: 20%; max-width: 200px; color: #fff;">Submit</button>
	</form>

</center>
