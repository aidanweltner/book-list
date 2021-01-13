<x-app-layout>
  <div class="mb-12 flex items-center justify-between">
      <div class="text-2xl lg:text-4xl font-bold text-gray-900 inline-flex items-center">
          <h1 class="">New book</h1>
          <svg class="h-8 w-8 ml-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
      </div>
  </div>
  <div>
    <form method="POST" action="/book">
      @csrf

      <div class="mt-2 max-w-screen-sm">
        <x-label for="title" :value="__('Book Title')" />
        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus />
        @error('title')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="author" :value="__('Author')" />
        <x-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author')" autofocus />
        @error('author')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="description" :value="__('Description')" />
        <textarea
          class="rounded-md shadow-sm bg-yellow-50 border-gray-300 focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 block mt-1 w-full"
          name="description" id="description" rows="3" autofocus>{{ old('description') ?? '' }}</textarea>
        @error('description')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="completed" :value="__('Completed on')" />
        <x-input id="completed" class="block mt-1 w-full" type="date" name="completed" :value="old('completed')" autofocus />
        @error('completed')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="rating" :value="__('Rating')" />
        <x-input id="rating" class="block mt-1 w-16" type="number" name="rating" :value="old('rating')" max="5" autofocus />
        @error('rating')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="review" :value="__('Review')" />
        <textarea
          class="rounded-md shadow-sm bg-yellow-50 border-gray-300 focus:border-yellow-300 focus:ring focus:ring-yellow-200 focus:ring-opacity-50 block mt-1 w-full"
          name="review" id="review" rows="7"autofocus>{{ old('review') ?? '' }}</textarea>
        @error('review')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="purchase" :value="__('Preffered purchase link')" />
        <x-input id="purchase" class="block mt-1 w-full" type="url" name="purchase" :value="old('purchase')" placeholder="https://localbook.shop" autofocus />
        @error('purchase')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="amazon" :value="__('Amazon link')" />
        <x-input id="amazon" class="block mt-1 w-full" type="url" name="amazon" :value="old('amazon')" placeholder="https://amazon.com" autofocus />
        @error('amazon')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-6 max-w-screen-sm">
        <x-button class="">
          {{ __('Create') }}
          <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
        </x-button>
      </div>
    </form>
  </div>
</x-app-layout>