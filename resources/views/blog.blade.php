@extends('layout.app')

@section('title', 'blog')

@section('content')

<section class="pt-20 pb-16 bg-linear-to-br from-blue-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-5xl font-bold mb-6 text-gradient overflow-y-visible">Blog & Insights</h1>
            <div class="w-20 h-1 bg-gradient-primary mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Sharing knowledge, experiences, and insights about web development, technology trends, and best practices
            </p>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Featured Article</h2>
            <p class="text-xl text-gray-600">Latest insights from my development journey</p>
        </div>
        <x-featured-post :post="$featuredPost ?? null" />
    </div>
</section>

<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4">Latest Posts</h2>
            <p class="text-xl text-gray-600">Explore more articles</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse ($posts as $post)
                <x-blog-post-card :post="$post" />

            @empty
                <div class="col-span-full text-center text-gray-500 py-12">
                    <p>No posts available at the moment. Check back soon!</p>
                </div>
            @endforelse
            
        </div>

        {{-- <div class="mt-16">
            {{ $posts->links() }}
        </div> --}}

    </div>
</section>

@endsection