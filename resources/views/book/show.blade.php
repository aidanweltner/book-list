<x-app-layout>
  <article>
    <header>
      <div class="w-full h-hscreen relative">
        <div class="absolute inset-0">
          <img src="{{ $book->image ??'https://source.unsplash.com/featured/?book'}}" alt="Book" class="object-cover h-full w-full rounded-md">
        </div>
      </div>
      <div class="flex flex-col justify-between px-2 py-4 lg:px-4 lg:py-12">
        <div class="mb-2">
          <div class="mb-2 flex flex-col space-y-2 md:flex-row-reverse md:items-center justify-between">
            @auth
              <div class="flex items-center space-x-3">
                <a href="/book/{{ $book->slug }}/edit" class="px-4 py-2 bg-yellow-300 rounded-md border-r-2 border-b-2 border-yellow-400 hover:bg-yellow-400 focus:bg-yellow-400 inline-flex items-center">
                  <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                  <span>{{__('Edit')}}</span>
                </a>
                <a href="/book/{{ $book->slug }}/delete" class="px-4 py-2 bg-yellow-200 rounded-md border-r-2 border-b-2 border-yellow-300 hover:bg-yellow-300 focus:bg-yellow-300 inline-flex items-center">
                  <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                  <span>{{__('Delete')}}</span>
                </a>
              </div>
            @endauth
            <h1 class="font-bold text-4xl lg:text-5xl leading-none text-gray-900 m-0">{{ $book->title ?? 'Book name'}}</h1>
          </div>
          <p class="text-gray-700 text-lg lg:text-xl">{{ __( 'by' ).' '.$book->author }}</p>
        </div>
        <div>
          <p class="text-base text-gray-800">{{ $book->description ?? 'Bacon ipsum dolor amet drumstick occaecat mollit sint. Sirloin short ribs burgdoggen non ullamco nisi filet mignon. Eu occaecat in beef ribs veniam ribeye. Shank voluptate minim, kevin flank pariatur ullamco beef tongue id ground round. Drumstick hamburger aute, exercitation sausage nisi ham hock chislic. Qui duis officia fatback, turkey tail magna boudin labore frankfurter.'}}</p>
          <div class="flex items-center space-x-2 mt-2">
            <x-rating :rating="$book->rating" />
            <p class="text-gray-700 text-xs lg:text-sm inline-flex">
              {{ __('Completed: ') }}
              {{ date( 'F j, Y', strtotime($book->completed) ) }}
            </p>
          </div>
        </div>
      </div>
    </header>
    <main class="px-2 py-4 lg:px-4 lg:py-6">
      <h2 class="mb-3 text-gray-600 text-xl lg:text-2xl font-bold leading-none">{{ __('Full Review:')}}</h2>
      <div class="prose">
        {!! $book->review !!}
      </div>
      <a href="/all" class="mb-4 mt-8 text-gray-900 flex items-center border-yellow-400 border-none hover:border-b-2 transition-all duration-200">
        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span>{{ __('Back to All Books') }}</span>
      </a>
    </main>
  </article>
</x-app-layout>