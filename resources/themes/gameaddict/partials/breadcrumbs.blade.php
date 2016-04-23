@if ($breadcrumbs)
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a> / 
            @else
               {{ $breadcrumb->title }}
            @endif
        @endforeach
@endif