<li class="">
  <article class="grid lg:grid-cols-3 gap-5">
    <div class="lg:col-span-1 w-full h-full min-h-60 relative">
      <div class="absolute inset-0">
        <img src="{{ $book->image ??'https://source.unsplash.com/featured/?book'}}" alt="Book" class="object-cover h-full w-full rounded-md">
      </div>
    </div>
    <div class="lg:col-span-2 min-h-60 flex flex-col justify-between p-2 lg:px-4 lg:py-12">
      <div class="mb-2">
        <h4 class="font-bold text-xl lg:text-2xl text-gray-900 mb-1">{{ $book->title ?? 'Book name'}}</h4>
        <p class="text-gray-700 text-sm lg:text-base">{{ __( 'by' ).' '.$book->author }}</p>
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
  </article>
</li>