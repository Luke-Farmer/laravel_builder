<x-master>
    @section('title', $page->seo_title)
    @section('description', $page->seo_description)
    {!! $page->body !!}
</x-master>