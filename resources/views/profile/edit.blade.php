<x-app-layout>
  <div class="mb-12 flex items-center justify-between">
      <div class="text-2xl lg:text-4xl font-bold text-gray-900 inline-flex items-center">
          <h1 class="">{{__('Edit Profile')}}</h1>
          <svg class="h-8 w-8 ml-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
      </div>
  </div>
  <div>
    <form method="POST" action="/profile/{{ $profile->id }}" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      
      <div class="max-w-screen-sm">
        <x-label :value="__('Current Image')" />
        <img src="{{ Storage::url($profile->image) ? Storage::url($profile->image) : 'https://source.unsplash.com/featured/?girl' }}" alt="{{ $profile->h1 }}" class="h-36 mt-1 rounded-sm">
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="image" :value="__('New Image')" />
        <x-input id="image" class="block mt-1 w-full" type="file" name="image" autofocus />
        @error('image')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="h1" :value="__('Top Heading')" />
        <x-input id="h1" class="block mt-1 w-full" type="text" name="h1" :value="old('h1')?old('h1'):$profile->h1" autofocus />
        @error('h1')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="h2" :value="__('Bottom Heading')" />
        <x-input id="h2" class="block mt-1 w-full" type="text" name="h2" :value="old('h2')?old('h2'):$profile->h2" autofocus />
        @error('h2')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-2 max-w-screen-sm">
        <x-label for="body" :value="__('Profile Body Content')" />
        <textarea
          class="block mt-1 w-full"
          name="body" id="body" rows="7"autofocus>{{ old('body') ? old('body') : $profile->body }}</textarea>
        @error('body')
          <p class="text-yellow-900">{{ $message }}</p>
        @enderror
        <script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
        <script>
          tinymce.init({
              selector:'textarea#body',
              width: '100%',
              height: 640,
              menubar: false,
          });
        </script>
      </div>

      <div class="mt-6 max-w-screen-sm flex space-x-2">
        <x-button class="">
          {{ __('Update Profile') }}
          <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </x-button>
        <button class="px-4 py-2 rounded-md hover:bg-gray-300 focus:bg-gray-300 inline-flex items-center">
          <a href="{{ route('home') }}">{{ __('Cancel') }}</a>
          <svg class="h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </form>
  </div>
</x-app-layout>