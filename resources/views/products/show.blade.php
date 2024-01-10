@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($products->name) ? $products->name : 'Products' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('products.products.destroy', $products->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('products.products.index') }}" class="btn btn-primary" title="Show All Products">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('products.products.create') }}" class="btn btn-success" title="Create New Products">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('products.products.edit', $products->id ) }}" class="btn btn-primary" title="Edit Products">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Products" onclick="return confirm(&quot;Click Ok to delete Products.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $products->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $products->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $products->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection