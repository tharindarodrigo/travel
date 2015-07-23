<ol class="breadcrumb">
    @foreach($breadcrumb as $node)
    <li
    @if($node->active) class='active' @endif itemscope itemtype="http://schema.org/Breadcrumb">
        @if($node->url)<a href="{{ $node->url }}" title="{{ $node->title }}" itemprop="url">@endif
            <span itemprop="title">{{ trim($node->title) }}</span>
        @if($node->url)</a>@endif
    </li>
    @endforeach
</ol>
