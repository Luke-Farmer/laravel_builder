@section('title', $page->seo_title)
@section('description', $page->seo_description)
@section('slug', $page->slug)
<x-master>
    {!! str_replace(array('[contact_form]', '[latest_portfolios]', '[footer_overlay]'), array(view('forms.contact-form'), view('blocks.latest-portfolios'), view('blocks.footer-get-in-touch')) ,$page->body) !!}
</x-master>
<style>
    body {
        margin-top: 122px;
    }
</style>