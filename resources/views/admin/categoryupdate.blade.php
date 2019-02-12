@extends('layouts.apps')
@section('content')
      <legend class="uk-legend ">Edit Category</legend>
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('update.category',$category) }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      {{ method_field('PATCH')}}
      Name
      <div class="uk-margin">
         <input class="uk-input" type="text" name="sub" value="{{$category->sub}}" required>
      </div>
      Category
       <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select" id="form-stacked-select" name="name">
               @if($category->name == 'Arabica')
               <option value="{{$category->name}}">Arabica</option>
               <option value="Robusta">Robusta</option>
               <option value="Other">Other</option>
               @elseif($category->name == 'Robusta')
               <option value="{{$category->name}}">Robusta</option>
               <option value="Arabica">Arabica</option>
               <option value="Other">Other</option>
               @else
               <option value="{{$category->name}}">Other</option>
               <option value="Arabica">Arabica</option>
               <option value="Robusta">Robusta</option>
               @endif
            </select>
         </div>
      </div>
      Status
       <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select" id="form-stacked-select" name="status">
               @if($category->status == 1)
               <option value="{{$category->status}}">Publish</option>
               <option value="0">Not Publish</option>
               @else
               <option value="{{$category->status}}">Not Publish</option>
               <option value="1">Publish</option>
               @endif
            </select>
         </div>
      </div>
   </fieldset>
   <div class="uk-margin">
      <input  class="uk-button uk-button-default" type="submit" value="Post">
</form>
</div>
@if($errors->any())
<div class="uk-text-center uk-text-lead uk-text-danger" uk-alert>
   <a class="uk-text-danger uk-alert-close" uk-close></a>
   <h3 class="uk-text-danger">Notice</h3>
   {{ implode('', $errors->all(':message')) }}
</div>
@endif
@endsection