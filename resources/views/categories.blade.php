@extends('layouts.main')

@section('content')
    Kategori
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                   <a href="/categories/{{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</a> 
                </div>
            @endforeach
        </div>
    </div>

@endsection