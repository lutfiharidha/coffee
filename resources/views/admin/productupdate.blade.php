@extends('layouts.apps')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<legend class="uk-legend">Edit Product {{$products->name}}</legend>
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('update.product',$products) }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      {{ method_field('PATCH')}}
      Name
      <div class="uk-margin">
         <input class="uk-input" type="text" name="name" value="{{$products->name}}" required>
      </div>
      Image
         <div class="input-group control-group increment">
          @foreach(explode('|',$products->image) as $ima)
          <img width="150" height="150" class="uk-border-rounded" src="/img/products/{{$ima}}">
            <input type="file" name="image[]">
            @endforeach
            <div class="input-group-btn">
               <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
         </div>
         <div class="clone hide">
            <div class="control-group input-group uk-margin-top">
               <input type="file" name="image[]">
               <div class="input-group-btn">
               <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
         </div>
      </div>
      <div class="uk-margin">
         Description
         <textarea class="uk-textarea" name="description">{!!$products->description!!}</textarea>
      </div>
      <script type="text/javascript">
         var editor = CKEDITOR.replace( 'ckedtor', {
         language: 'en',
         extraPlugins: 'notification'
         });
         
         editor.on( 'required', function( evt ) {
         editor.showNotification( 'This field is required.', 'warning' );
         evt.cancel();
         } );
      </script>
      <div class="uk-margin uk-child-width-1-4" uk-grid>
         <div>
            Stock
            <input class="uk-input" type="number" name="stock" value="{{$products->stock}}" required>
         </div>
         <div>
            Brand
            <input class="uk-input" type="text" name="brand" value="{{$products->brand}}">
         </div>
         <div>
            Price
            <input class="uk-input" type="number" name="price" value="{{$products->price}}" required>
         </div>
         <div>
            Weight
            <input class="uk-input" type="number" name="weight" value="{{$products->weight}}" required>
         </div>
      </div>
      <div class="uk-margin uk-child-width-1-4" uk-grid>
         <div>
            Tokopedia
            <input class="uk-input" type="text" name="tokopedia" value="{{$products->tokopedia}}" required>
         </div>
         <div>
            Bukalapak
            <input class="uk-input" type="text" name="bukalapak" value="{{$products->bukalapak}}">
         </div>
         <div>
            Shopee
            <input class="uk-input" type="text" name="shopee" value="{{$products->shopee}}" required>
         </div>
      </div>
      Category
      <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select" id="form-stacked-select" name="category">
               @foreach($categories as $category)
               <option value="{{$category->id}}">{{$category->name}} - {{$category->sub}}</option>
               @endforeach
            </select>
         </div>
      </div>
      Status
      <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select" id="form-stacked-select" name="status">
               @if($products->status == 1)
               <option value="{{$products->status}}">Publish</option>
               <option value="0">Not Publish</option>
               @else
               <option value="{{$products->status}}">Not Publish</option>
               <option value="1">Publish</option>
               @endif
            </select>
         </div>
      </div>
   </fieldset>
   <div class="uk-margin">
      <input  class="uk-button uk-button-default" type="submit" value="Update">
</form>
</div>
<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
@if($errors->any())
<div class="uk-text-center uk-text-lead uk-dark" uk-alert>
   <a class="uk-alert-close" uk-close></a>
   <h3>Notice</h3>
   {{ implode('', $errors->all(':message')) }}
</div>
@endif
@endsection