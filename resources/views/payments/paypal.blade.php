<form method="post" action="{{route('go')}}">
	@csrf
<input type="hidden" value="10" name="amount">
<input type="submit" name="submit">
</form>