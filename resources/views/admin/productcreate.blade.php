@extends('layouts.apps')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<legend class="uk-legend ">Add Product</legend>
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
   <form class="uk-padding " action="{{ route('store.product') }}"  enctype="multipart/form-data" method="post">
      <fieldset class=" uk-margin-top uk-fieldset">
         {{ csrf_field() }}
         Name
         <div class="uk-margin">
            <input class="uk-input" type="text" name="name" placeholder="Title" required>
         </div>
         Image
         <div class="input-group control-group increment">
            <input type="file" name="image[]">
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
        Description
      <div class="uk-margin">
         <textarea class="uk-textarea ckeditor" id="ckedtor" name="description" rows="5"></textarea>
      </div> 
        <div class="uk-margin uk-child-width-1-4" uk-grid>
         <div>
         <input class="uk-input" type="number" name="stock" placeholder="Stock" required>
      </div>
      <div>
         <input class="uk-input" type="text" name="brand" placeholder="Brand">
      </div>
      <div>
         <input class="uk-input" type="number" name="price" placeholder="Price" required>
      </div>
      <div>
         <input class="uk-input" type="number" name="weight" placeholder="Weight" required>
      </div>
      </div>
      <div class="uk-margin uk-child-width-1-4" uk-grid>
         <div>
         <input class="uk-input" type="text" name="tokopedia" placeholder="Tokopedia" required>
      </div>
      <div>
         <input class="uk-input" type="text" name="bukalapak" placeholder="Bukalapak">
      </div>
      <div>
         <input class="uk-input" type="text" name="shopee" placeholder="Shopee" required>
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
               <option value="1">Publish</option>
               <option value="0">Not Publish</option>
            </select>
         </div>
      </div>
   </fieldset>
   <div class="uk-margin">
      <input  class="uk-button uk-button-default" type="submit" placeholder="Post">
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
<div class="uk-text-center uk-text-lead uk-text-danger" uk-alert>
   <a class="uk-text-danger uk-alert-close" uk-close></a>
   <h3 class="uk-text-danger">Notice</h3>
   {{ implode('', $errors->all(':message')) }}
</div>
@endif
@endsection