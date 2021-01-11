<x-app-layout>
    <div>
        <div class="text-2xl lg:text-4xl font-bold text-gray-900">
            <h1>Reading List</h1>
        </div>
    </div>
    
    <ul class="space-y-4 lg:space-y-6 my-4 lg:my-6">
        @include('book')
        @include('book', [ 'image' => '/images/filler-2.jpg'])
        @include('book', [ 'text' => '
            Bacon ipsum dolor amet drumstick occaecat mollit sint. Sirloin short ribs burgdoggen non ullamco nisi filet mignon. Eu occaecat in beef ribs veniam ribeye. Shank voluptate minim, kevin flank pariatur ullamco beef tongue id ground round. Drumstick hamburger aute, exercitation sausage nisi ham hock chislic. Qui duis officia fatback, turkey tail magna boudin labore frankfurter.
            Bacon ipsum dolor amet drumstick occaecat mollit sint. Sirloin short ribs burgdoggen non ullamco nisi filet mignon. Eu occaecat in beef ribs veniam ribeye. Shank voluptate minim, kevin flank pariatur ullamco beef tongue id ground round. Drumstick hamburger aute, exercitation sausage nisi ham hock chislic. Qui duis officia fatback, turkey tail magna boudin labore frankfurter.
            Bacon ipsum dolor amet drumstick occaecat mollit sint. Sirloin short ribs burgdoggen non ullamco nisi filet mignon. Eu occaecat in beef ribs veniam ribeye. Shank voluptate minim, kevin flank pariatur ullamco beef tongue id ground round. Drumstick hamburger aute, exercitation sausage nisi ham hock chislic. Qui duis officia fatback, turkey tail magna boudin labore frankfurter.
        '])
        @include('book')
    </ul>

</x-app-layout>