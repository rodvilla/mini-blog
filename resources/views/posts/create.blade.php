<x-app-layout>
    <div class="max-w-4xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="py-8 flex justify-between items-center">
            <h1 class="text-4xl font-extrabold text-gray-900 leading-9 tracking-tight uppercase flex-1">{{ __('New Post') }}</h1>
        </div>
        <div id="create-post">
            <x-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="block mt-4">
                    <label for="post_title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <x-input type="text" name="title" id="post_title" value="{{ old('title') }}" class="w-full"></x-input>
                    </div>
                </div>
                <div class="mt-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Content') }}</label>
                  <div class="mt-1">
                    <textarea id="description" name="description" rows="3" value="{{ old('description') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                  </div>
                </div>
                  <div class="py-3 text-right">
                    <x-button>{{ __('Save') }}</x-button>
                  </div>
            </form>
        </div>
    </div>
</x-app-layout>
