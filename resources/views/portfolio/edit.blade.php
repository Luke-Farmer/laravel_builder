<x-admin-master>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center g-0">
        <div class="col-12 col-lg-10">
            <form class="p-3" action="{{ route('portfolio.update', $portfolio->id) }}" method="POST"  onsubmit="return getContent()" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row g-0">
                    <div class="col-12 d-flex bg-dark-blue w-100 p-2">
                        <p class="white mb-0">Page Settings</p>
                        <input href="{{ route('portfolio.update', $portfolio->id) }}" class="white main-button px-3 py-0 ms-auto" name="save" value="Save" type="submit">
                    </div>
                </div>
                <div class="row g-0 bg-white p-3">
                    <div class="col-12 pb-3">
                        <label class="mb-2">URL:</label>
                        <input class="edit-page-input p-1" type="text" label="slug" name="slug" value="{{ $portfolio->slug }}">
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">Published:</label>
                        <select name="enabled" class="edit-page-input p-1">
                            <option value="{{ $portfolio->enabled }}">
                                @if($portfolio->enabled == 1)
                                    Published
                                @else
                                    Draft
                                @endif
                            </option>
                            @if($portfolio->enabled == 1)
                                <option value="0">
                                    Draft
                                </option>
                            @else
                                <option value="1">
                                    Published
                                </option>
                            @endif
                        </select>
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">Page Title:</label>
                        <input class="edit-page-input p-1" type="text" label="title" name="title" value="{{ $portfolio->title }}">
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">SEO Meta Title:</label>
                        <input class="edit-page-input p-1" type="text" label="seo_title" name="seo_title" value="{{ $portfolio->seo_title }}">
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">SEO Meta Description:</label>
                        <input class="edit-page-input p-1" type="text" label="seo_description" name="seo_description" value="{{ $portfolio->seo_description }}">
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">Excerpt:</label>
                        <input class="edit-page-input p-1" type="text" label="excerpt" name="excerpt" value="{{ $portfolio->excerpt }}">
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mt-3">Featured Image</label>
                        <input type="text" id="" class="edit-page-input p-1" name="image" required value="{{ $portfolio->image }}"/>
                    </div>
                    <div class="col-12">
                        <div class="position-relative" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                            <textarea class="w-100" id="editor" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $portfolio->body }}</textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-2 pt-3 pe-3">
            <div class="p-3 save-box bg-dark-blue">
                <p class="mb-0 text-start me-3 fw-bold text-white">URL:<span class="float-end fw-normal">{{ $portfolio->slug }}</span></p>
                <p class="mb-0 text-start me-3 fw-bold text-white">Updated:<span class="float-end fw-normal">{{ date('j M Y',strtotime($portfolio->updated_at)) }}</span></p>
                <div class="d-flex">
                    <form class="mb-0 w-100 mt-3" action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input class="white main-button w-100 p-0 me-3" name="delete" value="Delete" type="submit" onclick="var result = confirm('Want to delete?');">
                    </form>
                </div>
            </div>
            <div class="p-3 save-box bg-dark-blue mt-3">
                <p class="fw-bold text-white">Shortcodes</p>
                <p class="mb-0 text-white">[contact_form]</p>
                <p class="mb-0 text-white">[latest_portfolios]</p>
                <p class="mb-0 text-white">[footer_overlay]</p>
            </div>
        </div>
    </div>
</x-admin-master>
<style>
    .bg-dark-blue {
        background: #153248;
    }
    .save-box {

    }
    textarea {
        background: #D9D9D6;
        box-shadow: 0px 0px 10px 1px rgb(68 88 144 / 10%);
        font-size: 13px;
        border: 1px solid black;
    }
    .edit-page-input {
        font-size: 13px;
        background: #ececec!important;
    }

    /* Please see the article */

    #editing, #highlighting {
        /* Both elements need the same text and space styling so they are directly on top of each other */
        margin: 10px;
        padding: 10px;
        border: 0;
    }
    #editing, #highlighting, #highlighting * {
        /* Also add text styles to highlighing tokens */
        font-family: monospace;
        tab-size: 2;
    }


    #editing, #highlighting {
        /* In the same place */
        top: 0;
        left: 0;
    }


    /* Move the textarea in front of the result */

    #editing {
        z-index: 1;
    }
    #highlighting {
        z-index: 0;
    }


    /* Make textarea almost completely transparent */

    #editing {
        color: transparent;
        background: transparent;
        caret-color: white; /* Or choose your favourite color */
    }

    /* Can be scrolled */
    #editing, #highlighting {
        overflow: auto;
        white-space: nowrap; /* Allows textarea to scroll horizontally */
    }

    /* No resize on textarea */
    #editing {
        resize: none;
    }

    /* Paragraphs; First Image */
    * {
        font-family: "Fira Code", monospace;
    }
    p code {
        border-radius: 2px;
        background-color: #eee;
        color: #111;
    }


    /* Syntax Highlighting from prism.js starts below, partly modified: */

    /* PrismJS 1.23.0
    https://prismjs.com/download.html#themes=prism-funky&languages=markup */
    /**
     * prism.js Funky theme
     * Based on “Polyfilling the gaps” talk slides http://lea.verou.me/polyfilling-the-gaps/
     * @author Lea Verou
     */

    code[class*="language-"],
    pre[class*="language-"] {
        font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
        font-size: 1em;
        text-align: left;
        white-space: pre;
        word-spacing: normal;
        word-break: normal;
        word-wrap: normal;
        line-height: 1.5;

        -moz-tab-size: 4;
        -o-tab-size: 4;
        tab-size: 4;

        -webkit-hyphens: none;
        -moz-hyphens: none;
        -ms-hyphens: none;
        hyphens: none;
    }

    /* Code blocks */
    pre[class*="language-"] {
        padding: .4em .8em;
        margin: .5em 0;
        overflow: auto;
        /* background: url('data:image/svg+xml;charset=utf-8,<svg%20version%3D"1.1"%20xmlns%3D"http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg"%20width%3D"100"%20height%3D"100"%20fill%3D"rgba(0%2C0%2C0%2C.2)">%0D%0A<polygon%20points%3D"0%2C50%2050%2C0%200%2C0"%20%2F>%0D%0A<polygon%20points%3D"0%2C100%2050%2C100%20100%2C50%20100%2C0"%20%2F>%0D%0A<%2Fsvg>');
        background-size: 1em 1em; - WebCoder49*/
        background: black; /* - WebCoder49 */
    }

    code[class*="language-"] {
        background: black;
        color: white;
        box-shadow: -.3em 0 0 .3em black, .3em 0 0 .3em black;
    }

    /* Inline code */
    :not(pre) > code[class*="language-"] {
        padding: .2em;
        border-radius: .3em;
        box-shadow: none;
        white-space: normal;
    }

    .token.comment,
    .token.prolog,
    .token.doctype,
    .token.cdata {
        color: #aaa;
    }

    .token.punctuation {
        color: #999;
    }

    .token.namespace {
        opacity: .7;
    }

    .token.property,
    .token.tag,
    .token.boolean,
    .token.number,
    .token.constant,
    .token.symbol {
        color: #0cf;
    }

    .token.selector,
    .token.attr-name,
    .token.string,
    .token.char,
    .token.builtin {
        color: yellow;
    }

    .token.operator,
    .token.entity,
    .token.url,
    .language-css .token.string,
    .token.variable,
    .token.inserted {
        color: yellowgreen;
    }

    .token.atrule,
    .token.attr-value,
    .token.keyword {
        color: deeppink;
    }

    .token.regex,
    .token.important {
        color: orange;
    }

    .token.important,
    .token.bold {
        font-weight: bold;
    }
    .token.italic {
        font-style: italic;
    }

    .token.entity {
        cursor: help;
    }

    .token.deleted {
        color: red;
    }

    /* Plugin styles: Diff Highlight */
    pre.diff-highlight.diff-highlight > code .token.deleted:not(.prefix),
    pre > code.diff-highlight.diff-highlight .token.deleted:not(.prefix) {
        background-color: rgba(255, 0, 0, .3);
        display: inline;
    }

    pre.diff-highlight.diff-highlight > code .token.inserted:not(.prefix),
    pre > code.diff-highlight.diff-highlight .token.inserted:not(.prefix) {
        background-color: rgba(0, 255, 128, .3);
        display: inline;
    }

    /* End of prism.js syntax highlighting*/
</style>