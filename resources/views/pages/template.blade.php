@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('slug', $page->slug)
<x-master>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
            <ul>
                @foreach($nav as $nav_item)
                    @if($nav_item->category_id == $category->id)
                        <li>{{ $nav_item->name }} - {{ $nav_item->url }}</li>
                    @endif
                @endforeach
            </ul>
        @endforeach
    </ul>
    {!! str_replace(array('[contact_form]', '[latest_portfolios]', '[footer_overlay]'), array(view('forms.contact-form'), view('blocks.latest-portfolios'), view('blocks.footer-get-in-touch')) ,$page->body) !!}
</x-master>
<style>
    body {
        margin-top: 86px;
    }
</style>