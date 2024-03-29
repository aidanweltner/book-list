<x-app-layout>
  <div class="mb-12 flex items-center justify-between">
      <div class="text-2xl lg:text-4xl font-bold text-gray-900 inline-flex items-center">
          <h1 class="">{{__('Edit Book')}}</h1>
          <svg class="h-8 w-8 ml-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
      </div>
  </div>
  <div>
    <form method="POST" action="/book/{{ $book->slug }}">
      @csrf
      @method('PATCH')
      
      <div class="max-w-screen-sm">
        <x-label :value="__('Current Image')" />
        <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title.' by '.$book->author }}" class="h-24 mt-1 rounded-sm">
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="image" :value="__('New Image')" />
        <x-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" autofocus />
        @error('image')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="title" :value="__('Book Title')" />
        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$book->title" autofocus />
        @error('title')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="author" :value="__('Author')" />
        <x-input id="author" class="block mt-1 w-full" type="text" name="author" :value="$book->author" autofocus />
        @error('author')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="description" :value="__('Description')" />
        <textarea
          class="rounded-md shadow-sm bg-white border-gray-300 focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 block mt-1 w-full"
          name="description" id="description" rows="3" autofocus>{{ $book->description }}</textarea>
        @error('description')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="completed" :value="__('Completed on')" />
        <x-input id="completed" class="block mt-1 w-full" type="date" name="completed" :value="date( 'Y-m-d', strtotime($book->completed))" autofocus />
        @error('completed')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="rating" :value="__('Rating')" />
        <x-input id="rating" class="block mt-1 w-16" type="number" name="rating" :value="$book->rating" max="5" autofocus />
        @error('rating')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="review" :value="__('Review')" />
        <textarea
          class="block mt-1 w-full"
          name="review" id="review" rows="7"autofocus>{{ $book->review }}</textarea>
        @error('review')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
        <script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
        <script>
          tinymce.init({
              selector:'textarea#review',
              width: '100%',
              height: 640,
              menubar: false,
          });
        </script>
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="purchase" :value="__('Preffered purchase link')" />
        <x-input id="purchase" class="block mt-1 w-full" type="url" name="purchase" :value="$book->purchase" placeholder="https://localbook.shop" autofocus />
        @error('purchase')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="amazon" :value="__('Amazon link')" />
        <x-input id="amazon" class="block mt-1 w-full" type="url" name="amazon" :value="$book->amazon" placeholder="https://amazon.com" autofocus />
        @error('amazon')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-6 max-w-screen-sm flex space-x-2">
        <x-button class="">
          {{ __('Update') }}
          <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </x-button>
        <button class="px-4 py-2 rounded-md hover:bg-gray-300 focus:bg-gray-300 inline-flex items-center">
          <a href="/book/{{ $book->slug }}">{{ __('Cancel') }}</a>
          <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </form>
  </div>
</x-app-layout>