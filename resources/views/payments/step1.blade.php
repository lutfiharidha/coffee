@extends('layouts.nav')
@section('content')
<main id="main" class="uk-container uk-container-large uk-child-width-2" uk-height-viewport="offset-top: false" >
   
        {{ csrf_field() }}
   <div class="uk-child-width-1-2@m uk-padding" uk-grid>
    <div>
            <p class="uk-text-danger">Name
                <input class="uk-input" name="name" type="text" placeholder="Name" required></p>
                
            <p class="uk-text-danger">Address
                <input class="uk-input" name="address" type="text" placeholder="Full Address" required>
            <div class="uk-margin">

</div>
<div class="uk-margin">
    <select class="uk-select" name="country" id="country">
        <option value="">Select Country</option>
@foreach($countries as $a => $value)
        <option value="{{$a}}">{{$value}}</option>
    @endforeach
    </select> 
</div>
<div class="uk-margin">
        <select class="uk-select" name="state" id="state">
        <option value="">Select Province</option>
    </select>
</div></p>
<div class="uk-child-width-1-2" uk-grid>
	<div>
<p class="uk-text-danger">City
<input class="uk-input" name="city" type="text" placeholder="City" required></p>
</div>
<div>
<p class="uk-text-danger">Post Code
<input class="uk-input" name="pcode" type="text" placeholder="Post Code" required></p>
</div>
            </div>
            <p class="uk-text-danger">Phone
                <input class="uk-input" name="phone" type="text" placeholder="Phone" required></p>
            <p>Information for Seller
                <textarea class="uk-textarea" rows="5" name="ket" placeholder="Information for Seller"></textarea></p>
    </div>
    <div>
        <div class="uk-child-width-1-2@m" uk-grid>
            <div>
        @foreach(array_slice(explode('|',$pro->image), 0, 1) as $ima)
                <img class="uk-prodt" src="/img/products/{{$ima}}" alt="">
            @endforeach
        </div>
        <div>
            <p class="uk-text-bold">{{$pro->name}}</p>
                <p>$ {{$pro->price}} x {{$stock}}
                <input name="kuantitas" type="hidden" value="{{$pro->stock}}">
<!--         <div class="uk-margin">
    <select class="uk-select" name="service" id="service" onchange="myFunction()">
        <option value="">Select Service</option>
    </select>
</div> -->
            <form method="post" action="{{route('go',$pro)}}" target="_blank">
              @csrf
        <b>TOTAL</b>
        <div id="total"></div>
              <input class="uk-margin-top uk-width-1" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal">
            </form>

        </div>
    </div>
</div>
</div>
</form>
</main>

<script type="text/javascript">
     var weight = parseFloat({{$pro->req}})*{{$pro->stock}}
            $(document).ready(function() {
            $('select[name="city"]').on('change', function() {
                var cityId = $(this).val();
                    if(cityId) {
                    $.getJSON({
                        url: '/get-service/'+encodeURI(cityId)+'/'+encodeURI(weight),
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                        $.each(data, function(i,n){
                        $('select[name="service"]').append('<option value="'+n['costs'][0]['cost'][0]['value']+'">'+n['costs'][i]['service']+' - '+n['costs'][0]['cost'][0]['value']+'</option>');
                            });
                        }
                    });
                    }else{
                    $('select[name="service"]').empty();
                      }
                   });
                });
        </script>
        <script type="text/javascript">
        var result    = parseFloat({{$stock}})*parseFloat({{$pro->price}}); 
        $('#total').append('<output>'+ result +'</output><input name="amount" type="hidden" value="'+ result +'">');
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
            $('select[name="country"]').on('change', function() {
                var stateID = $(this).val();
                    if(stateID) {
                    $.ajax({
                        url: '{{url("/get-state")}}/'+encodeURI(stateID),
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                        $('select[name="state"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                    }else{
                    $('select[name="state"]').empty();
                      }
                   });
                });
        </script>
@endsection 