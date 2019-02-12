@extends('layouts.apps')
@section('content')
    <h1 class="uk-text-center">Sliders</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table  uk-table-middle uk-table-divider uk-table-responsive">
      <thead>
         <tr>
          <th>No</th>
          <th>Title</th>
          <th>Image</th>
          <th>Description</th>
          <th>Status</th>
          <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($sliders as $key =>$slider)
         <tr>
            <td>{{$sliders->firstItem()+ $key}}</td>
            <td>{{$slider->title}}</td>
            <td>
              <img width="200" src="/img/sliders/{{$slider->image}}">
            </td>
            <td>{!!str_limit($slider->description,200,' ...')!!}</td>
            <td>
              @if($slider->status==1)
              <span uk-icon="icon: check; ratio: 1.5"></span>
              @else
              <span uk-icon="icon: close; ratio: 1.5"></span>
              @endif
            </td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.slider',$slider) }}">Update</a>
               <form action="{{ route('slider.destroy', $slider) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$slider->title}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
       {!! $sliders->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <h3>Notice</h3>
    <p>{{ session()->get('message') }}</p>
</div>
      @endif
@endsection