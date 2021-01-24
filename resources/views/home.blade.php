<x-app-layout>
    <div>
        <div class="text-2xl lg:text-4xl font-bold text-gray-900">
            <h1>Reading List</h1>
        </div>
    </div>
    
    <ul class="space-y-4 lg:space-y-6 my-4 lg:my-6 md:gap-4 md:space-y-0 md:grid md:grid-cols-2 lg:block">
        @forelse ($books as $book)
            @include('book')
        @empty
            <li>
              <p>Sorry, no books found</p>
            </li>
        @endforelse
    </ul>

    {{ $books->links() }}

</x-app-layout>