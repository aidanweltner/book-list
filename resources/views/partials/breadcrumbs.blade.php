@unless ($breadcrumbs->isEmpty())
  <nav aria-label="breadcrumbs pt-4 lg:pt-8">
    <ol class="breadcrumb flex space-x-2 lg:space-x-3">
      @foreach ($breadcrumbs as $breadcrumb)
        @if (!is_null($breadcrumb->url) && !$loop->last)
          <li class="breadcrumb-item">
            <a class="border-b border-yellow-500 transition-all hover:border-transparent hover:text-yellow-500 inline-flex items-center" href="{{ $breadcrumb->url }}" title="{{ $breadcrumb->title }}">
              @if ( $loop->first )
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 lg:mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              @endif
              {{ $breadcrumb->title }}
            </a>
            <span class="ml-2 lg:ml-3">•</span>
          </li>
        @else
          <li aria-current="location" class="breadcrumb-item active inline-flex items-center">
            @if ( $loop->first )
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 lg:mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              @endif
              {{ $breadcrumb->title }}
          </li>
        @endif
      @endforeach
    </ol>
  </nav>
@endunless