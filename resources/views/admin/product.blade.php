@extends('layouts.apps')
@section('content')
    <h1 class="uk-text-center">Products</h1>
<div uk-scrollspy="cls: uk-animation-fade; repeat: false" class="uk-overlay uk-overlay-primary uk-width-auto">
   <table class="uk-table uk-table-divider uk-table-responsive">
      <thead>
         <tr>
         	<th>No</th>
          <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($products as $key =>$product)
         <tr>
            <td>{{$products->firstItem()+ $key}}</td>
            <td>
              @foreach(array_slice(explode('|',$product->image), 0, 1) as $ima)
              <img width="80" height="80" class="uk-border-rounded" src="/img/products/{{$ima}}">
              @endforeach
            </td>
            <td>{{$product->name}}</td>
            <td>{!!str_limit($product->description,200,' ...')!!}</td>
            <td>{{$product->brand}}</td>
            <td>{{$product->cat->name}} </td>
            <td>{{$product->stock}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->status}}</td>
            <td>
               <a class="uk-button uk-button-text uk-text-primary" href="{{ route('update.product',$product) }}">Update</a>
               <form action="{{ route('product.destroy', $product) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button class="uk-button uk-button-text uk-text-danger" onclick="return confirm('Are you sure to delete {{$product->name}}?')" > Delete </button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
       {!! $products->render() !!}
</div>
@if(session()->has('message'))
<div class="uk-text-center uk-text-lead" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <h3>Notice</h3>
    <p>{{ session()->get('message') }}</p>
</div>
      @endif
@endsection