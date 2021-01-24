<x-app-layout>
  <div class="mb-12 flex items-center justify-between">
      <div class="text-2xl lg:text-4xl font-bold text-gray-900 inline-flex items-center">
          <h1 class="">Reading List</h1>
          <svg class="h-8 w-8 ml-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
          </svg>
      </div>
      @auth
        <div class="flex items-center space-x-3">
          <button class="px-4 py-2 bg-yellow-300 rounded-md border-r-2 border-b-2 border-yellow-400 hover:bg-yellow-400 focus:bg-yellow-400 inline-flex items-center">
            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            <a href="/book/create">{{__('New Book')}}</a>
          </button>
          <button class="px-4 py-2 bg-yellow-200 rounded-md border-r-2 border-b-2 border-yellow-300 hover:bg-yellow-300 focus:bg-yellow-300 inline-flex items-center">
            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
            </svg>
            <a href="/logout">{{__('Logout')}}</a>
          </button>
        </div>
      @endauth
  </div>
  
  <ul class="space-y-4 lg:space-y-6 my-4 lg:my-6">
      @forelse ($books as $book)
          @include('book')
      @empty
          <li>
            <p>Sorry, no books found</p>
          </li>
      @endforelse
  </ul>

  {{ $books->link() }}

</x-app-layout>