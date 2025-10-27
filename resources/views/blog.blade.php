@extends('layout.app')

@section('title', 'blog')

@section('content')

<section class="pt-20 pb-16 bg-linear-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6 text-gradient">Blog & Insights</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Sharing knowledge, experiences, and insights about web development, technology trends, and best practices
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 ;g:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Featured Article</h2>
            <p class="text-xl text-gray-600">Latest insights from my development journey</p>
        </div>
    </div>
    <x-featured-post :post="$featuredPost ?? null" />
</section>
@endsection