@props(['post' => null])

@if($post)
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="relative h-64 lg:h-auto">
                <img src="{{ $post->featured_image ?? 'https://via.placeholder.com/600x400/667eea/ffffff?text=Featured+Post' }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-full object-cover">
                <div class="absolute top-4 left-4">
                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Featured</span>
                </div>
            </div>
            <div class="p-8 lg:p-12 flex flex-col justify-center">
                <div class="mb-4">
                    <span class="text-blue-600 font-semibold text-sm">{{ $post->category }}</span>
                    <div class="flex items-center text-gray-500 text-sm mt-2">
                        <i class="fas fa-calendar mr-2"></i>
                        <span>{{ $post->published_at->format('M j, Y') }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-clock mr-2"></i>
                        <span>{{ $post->reading_time ?? '5' }} min read</span>
                    </div>
                </div>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">
                    {{ $post->title }}
                </h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $post->excerpt }}</p>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('blog.show', $post->slug) }}" class="bg-gradient-primary text-white px-6 py-3 rounded-lg hover:shadow-glow transition-all duration-300 inline-flex items-center">
                        Read Article
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <div class="flex items-center space-x-4 text-gray-500">
                        <button class="hover:text-red-500 transition-colors">
                            <i class="fas fa-heart"></i>
                            <span class="ml-1">{{ $post->likes ?? 0 }}</span>
                        </button>
                        <button class="hover:text-blue-500 transition-colors">
                            <i class="fas fa-comment"></i>
                            <span class="ml-1">{{ $post->comments_count ?? 0 }}</span>
                        </button>
                        <button class="hover:text-green-500 transition-colors">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="p-8 lg:p-12 text-center">
            <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-bold text-gray-400 mb-4">No Featured Post Available</h3>
            <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                Check back soon for fresh content and insights about web development and technology.
            </p>
        </div>
    </div>
@endif