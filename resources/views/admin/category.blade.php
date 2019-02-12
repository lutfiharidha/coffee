@extends('layouts.apps')
@section('content')
    <h1 class="uk-text-center">Categories</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table  uk-table-middle uk-table-divider uk-table-responsive">
      <thead>
         <tr>
          <th>No</th>
          <th>Category</th>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($categories as $key =>$category)
         <tr>
            <td>{{$categories->firstItem()+ $key}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->sub}}</td>
            <td>
              @if($category->status==1)
              <span uk-icon="icon: check; ratio: 1.5"></span>
              @else
              <span uk-icon="icon: close; ratio: 1.5"></span>
              @endif
            </td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.category',$category) }}">Update</a>
               <form action="{{ route('category.destroy', $category) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$category->sub}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
       {!! $categories->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <h3>Notice</h3>
    <p>{{ session()->get('message') }}</p>
</div>
      @endif
@endsection