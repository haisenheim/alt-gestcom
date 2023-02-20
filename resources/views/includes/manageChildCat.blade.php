<ul>
    @foreach($childs as $child)
        <li>
            <span><img src="{{ $child->photo }}" height="25" alt=""> </span>
            @if ($child->articles->count())
            <a href="#">{{ $child->name }} <span> ({{ $child->articles->count() }})</span></a>
            @else
            {{ $child->name }} ({{ $child->articles->count() }})
            @endif
        @if(count($child->children))
            @include('includes.manageChildCat',['childs' => $child->children])
        @endif
        </li>
    @endforeach
</ul>
