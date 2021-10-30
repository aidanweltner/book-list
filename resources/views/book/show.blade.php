<x-app-layout>
  <x-slot name="head">
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'book', $book) }}
  </x-slot>

  <x-slot name="breadcrumb">
    {{ Breadcrumbs::render('book', $book) }}
  </x-slot>

  <article>
    <header>
      <div class="w-full h-hscreen relative">
        <div class="absolute inset-0">
          <img src="{{ asset($book->image) ??'https://source.unsplash.com/featured/?book'}}"
            alt="{{ $book->title.' by '.$book->author }}" class="object-cover h-full w-full rounded-md">
        </div>
      </div>
      <div class="flex flex-col justify-between px-2 py-4 lg:px-4 lg:py-12">
        <div class="mb-2">
          <div class="mb-2 flex flex-col space-y-2 md:flex-row-reverse md:items-center justify-between">
            @auth
            <div class="flex items-center space-x-3">
              <a href="/book/{{ $book->slug }}/edit"
                class="px-4 py-2 bg-yellow-300 rounded-md border-r-2 border-b-2 border-yellow-400 hover:bg-yellow-400 focus:bg-yellow-400 inline-flex items-center">
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                <span>{{__('Edit')}}</span>
              </a>
            </div>
            @endauth
            <h1 class="font-bold text-4xl lg:text-5xl leading-none text-gray-900 m-0">{{ $book->title ?? 'Book name'}}
            </h1>
          </div>
          <p class="text-gray-700 text-lg lg:text-xl">{{ __( 'by' ).' '.$book->author }}</p>
        </div>
        <div>
          <p class="max-w-screen-md text-base text-gray-800">{{ $book->description ?? 'Bacon ipsum dolor amet drumstick
            occaecat mollit sint. Sirloin short ribs burgdoggen non ullamco nisi filet mignon. Eu occaecat in beef ribs
            veniam ribeye. Shank voluptate minim, kevin flank pariatur ullamco beef tongue id ground round. Drumstick
            hamburger aute, exercitation sausage nisi ham hock chislic. Qui duis officia fatback, turkey tail magna
            boudin labore frankfurter.'}}</p>
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
      @if ( $book->amazon || $book->purchase )
      <div class="flex items-center space-x-2 mt-10 mb-4">
        @if( $book->purchase )
        <a href="{{ $book->purchase }}" target="_blank"
          class="px-4 py-2 bg-yellow-300 rounded-md border-r-2 border-b-2 border-yellow-400 hover:bg-yellow-400 focus:bg-yellow-400 inline-flex items-center">
          <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span>{{__('Purchase This Book')}}</span>
        </a>
        @endif
        @if ( $book->amazon )
        <a href="{{ $book->amazon }}" target="_blank"
          class="px-4 py-2 rounded-md hover:bg-gray-300 focus:bg-gray-300 inline-flex items-center">
          <span>{{__('Buy on Amazon')}}</span>
        </a>
        @endif
      </div>
      @endif
      <a href="/all"
        class="mb-4 mt-16 text-gray-900 flex items-center border-yellow-400 border-none hover:border-b-2 transition-all duration-200">
        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span>{{ __('Back to All Books') }}</span>
      </a>
      @auth
      <div class="mt-12 flex items-center space-x-2">
        <button id="deletebtn"
          class="px-4 py-2 bg-yellow-200 rounded-md border-r-2 border-b-2 border-yellow-300 hover:bg-yellow-300 focus:bg-yellow-300 inline-flex items-center">
          <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
          <span>{{__('Delete Book')}}</span>
        </button>
        <form method="POST" action="{{ $book->path() }}">
          @csrf
          @method('DELETE')
          <x-button class="hidden" id="confirm">
            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            <span>{{__('Yes, delete this book')}}</span>
          </x-button>
        </form>
      </div>
      <script>
        var deletebtn = document.getElementById('deletebtn');
          var confirm = document.getElementById('confirm');
          let confirmed = false;

          deletebtn.addEventListener('click', () => {
            if ( confirmed ) {
              deletebtn.classList.add('inline-flex');
              deletebtn.classList.remove('hidden');
              confirm.classList.add('hidden');
              confirm.classList.remove('inline-flex');
            } else {
              deletebtn.classList.add('hidden');
              deletebtn.classList.remove('inline-flex');
              confirm.classList.add('inline-flex');
              confirm.classList.remove('hidden');
            }
          });
      </script>
      @endauth
    </main>
  </article>
</x-app-layout>