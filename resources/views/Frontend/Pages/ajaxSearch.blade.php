@foreach ($data as $item)
    <div class="media"><a class="pull-left" href="{{ route('shop.chi-tiet-san-pham', $item->id) }}"><img class="media-object" width="50"
                src="{{$item->image }}" alt="Image"></a>
        <div class="media-body">
            <h4 class="media-heading"><a href="#">{{ $item->name }}</a></h4>
            <p>   {{ Str::limit($item->description, 100, '...') }}</p>
        </div>
    </div>
@endforeach
