<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="business" value="negativesintopositives@ipvc.pt">
    <div ng-repeat="c in vm.listProdsCar">
    <input type="hidden" name="" value="{{$oi=$index+1}}">
		<input type="hidden" name="{{'item_name_'+$oi}}" value="{{c.name}}">
		<input type="hidden" name="{{'quantity_'+$oi}}" value="{{c.quantity}}">
		<input type="hidden" name="{{'amount_'+$oi}}" value="{{c.price}}">
		<input type="hidden" name="return" id="cancel_return" value="http://localhost:8000/payment">
	    <input type="hidden" name="cancel_return" id="cancel_return" value="http://localhost:8000/checkout">

	</div>

	<button type="submit" class="btn btn-default alert alert-success pull-right">Continue to Payment <span class="glyphicon glyphicon-chevron-right"></span></button>
	
</form>