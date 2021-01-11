<li class="">
  <article class="grid grid-cols-3 gap-x-5">
    <div class="col-span-1 w-full h-full relative">
      <div class="absolute inset-0">
        <img src="{{ $book->image ??'https://source.unsplash.com/featured/?book'}}" alt="Book" class="object-cover h-full w-full rounded-md">
      </div>
    </div>
    <div class="col-span-2 min-h-60 flex flex-col justify-between p-2 lg:px-4 lg:py-12">
      <h4 class="font-bold text-xl lg:text-2xl text-gray-900 mb-2">{{ $book->title ?? 'Book name'}}</h4>
      <p class="text-base text-gray-800">{{ $book->description ?? 'Bacon ipsum dolor amet drumstick occaecat mollit sint. Sirloin short ribs burgdoggen non ullamco nisi filet mignon. Eu occaecat in beef ribs veniam ribeye. Shank voluptate minim, kevin flank pariatur ullamco beef tongue id ground round. Drumstick hamburger aute, exercitation sausage nisi ham hock chislic. Qui duis officia fatback, turkey tail magna boudin labore frankfurter.'}}</p>
    </div>
  </article>
</li>