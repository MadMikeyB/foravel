@foreach($items as $item)
  <li>
    <a href="{!! $item->url() !!}"> @if ( $item->hasChildren() )<span class>@endif{!! $item->title !!}@if ( $item->hasChildren() )</span>@endif</a>
    @if ( $item->hasChildren() )
      <ul class="sub-menu">
        @foreach ( $item->children() as $child )
          <li><a href="{!! $child->url() !!}">{!! $child->title !!}</a></li>
          @if ( $child->hasChildren() )
            <ul class="sub-menu">
              @foreach( $child->children() as $grandkid )
                <li><a href="{!! $grandkid->url() !!}">{!! $grandkid->title !!}</a></li>
              @endforeach
            </ul>
          @endif
        @endforeach
      </ul>
    @endif
  </li>
@endforeach