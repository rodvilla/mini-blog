<x-app-layout>
    <div class="max-w-4xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="py-8">
            <h1 class="text-4xl font-extrabold text-gray-900 leading-9 tracking-tight uppercase">All posts</h1>
        </div>
        <div id="posts">
            @foreach ($posts as $post)
            <div class="py-12 border-t">
                <h2 class="text-2xl leading-8 font-bold tracking-tight inline-block">{{ $post->title }}</h2>
                <span class="ml-1 italic text-sm text-gray-400">by {{ $post->user->name }} on {{ $post->publish_date }}</span>
                <div class="leading-7 mt-4">{{ $post->description }}</div>
            </div>
            @endforeach
        </div>
        <div class="pb-8">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
