@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('slug', $page->slug)
<x-master>
    <ul>
        @foreach($items as $item)
            <li>{{ $item->title }}
            @foreach($item['children'] as $child)
                <li>{{ $child->title }}</li>
                @endforeach
                </li>
            @endforeach
    </ul>
    {!! str_replace(array('[contact_form]', '[latest_portfolios]', '[footer_overlay]'), array(view('forms.contact-form'), view('blocks.latest-portfolios'), view('blocks.footer-get-in-touch')) ,$page->body) !!}
</x-master>
<style>
    body {
        margin-top: 86px;
    }
</style>