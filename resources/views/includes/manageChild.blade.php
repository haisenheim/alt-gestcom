<ul>
    @foreach($childs as $child)
        <li>
            @if ($child->articles->count())
            <a href="/marchand/category/{{ $child->id }}">{{ $child->name }}</a>
            <span><a href="#"  data-name="{{ $child->name}}" data-id={{ $child->id }} class="btn-import btn btn-xs btn-light" title="Importer"><i class="fa fa-download" data-target="#modalImport" data-toggle="modal"></i></a></span>
            @else
            {{ $child->name }}
            <span><a href="#" data-name="{{ $child->name}}" data-id={{ $child->id }} class="btn-import btn btn-xs btn-light" title="Importer"><i class="fa fa-download" data-target="#modalImport" data-toggle="modal"></i></a></span>
            @endif
        @if(count($child->children))
            @include('includes.manageChild',['childs' => $child->children])
        @endif
        </li>
    @endforeach
</ul>
