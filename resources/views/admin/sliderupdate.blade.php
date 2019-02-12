@extends('layouts.apps')
@section('content')
      <legend class="uk-legend ">Edit Sliders</legend>
<div class="uk-container uk-container-medium uk-card uk-card-secondary" uk-scrollspy="cls: uk-animation-fade; repeat: true">
<form class="uk-padding " action="{{ route('update.slider',$slider) }}"  enctype="multipart/form-data" method="post">
   <fieldset class=" uk-margin-top uk-fieldset">
      {{ csrf_field() }}
      {{ method_field('PATCH')}}
      Title
      <div class="uk-margin">
         <input class="uk-input" type="text" name="title" value="{{$slider->title}}" required>
      </div>
      Image
      <div class="uk-margin">
              <img width="150" height="150" class="uk-border-rounded" src="/img/sliders/{{$slider->image}}">
         <div uk-form-custom>
            
            <input type="file" name="image">
            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
         </div>
      </div>
      Description
      <div class="uk-margin">
         <textarea class="uk-textarea" name="description" rows="5">{!!$slider->description!!}</textarea>
      </div>
      Status
       <div class="uk-margin">
         <div class="uk-form-controls">
            <select class="uk-select" id="form-stacked-select" name="status">
               @if($slider->status == 1)
               <option value="{{$slider->status}}">Publish</option>
               <option value="0">Not Publish</option>
               @else
               <option value="{{$slider->status}}">Not Publish</option>
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