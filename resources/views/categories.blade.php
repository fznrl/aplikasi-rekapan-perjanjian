@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                       <a href="{{ route('perjanjian', ['category'=>$category->slug]) }}" class="text-decoration-none">{{ $category->name }}</a> 
                    </div>
                @endforeach
            </div>
        </div>
      </div>
    </section>
</div>
    

@endsection