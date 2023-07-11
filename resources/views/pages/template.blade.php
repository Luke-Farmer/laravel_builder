@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('slug', $page->slug)
<x-master>
    @if ($page->use_builder = 0)
        {!! str_replace(array('[contact_form]', '[latest_portfolios]', '[footer_overlay]', '[portfolios]'), array(view('forms.contact-form'), view('blocks.latest-portfolios'), view('blocks.footer-get-in-touch'), view('blocks.portfolio')) ,$page->body) !!}
    @else
        {!! $page->html !!}
        {!! $page->css !!}
    @endif
</x-master>
<style>
    body {
        margin-top: 86px;
    }
</style>