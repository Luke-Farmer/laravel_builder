<?php
use App\Models\Themes;
?>
<x-admin-master>
    <div class="p-3">
        <form class="mb-0 w-100" action="{{ route('settings.update', 'all') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-dark-blue p-3">
                            <p class="white mb-0">Admin Settings</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <label>Development Mode:</label>
                            <select name="enabled" class="edit-page-input p-1">
                                <option value="{{ $enabled }}">
                                    @if($enabled == 1)
                                        Enabled
                                    @else
                                        Disabled
                                    @endif
                                </option>
                                @if($enabled == 1)
                                    <option value="0">
                                        Disbaled
                                    </option>
                                @else
                                    <option value="1">
                                        Enabled
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-dark-blue p-3">
                            <p class="white mb-0">Site Settings</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Business Name:</label>
                                    <input class="edit-page-input p-1" name="company_name" value="{{ $company }}">
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Business Number:</label>
                                    <input class="edit-page-input p-1" name="business_number" value="{{ $businessNumber }}">
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Website Name:</label>
                                    <input class="edit-page-input p-1" name="site_name" value="{{ $name }}">
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Company Email:</label>
                                    <input class="edit-page-input p-1" name="site_email" value="{{ $email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-dark-blue p-3">
                            <p class="white mb-0">Misc Settings</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <label>Active Theme: {{ Themes::where('active', '=', '1')->first()->theme_name }}</label>
                            <select name="theme" class="edit-page-input p-1">
                                <option value="{{ $theme->theme_name }}">{{ $theme->theme_name }}</option>
                            @foreach(Themes::where('active', '=', '0')->get() as $themeName)
                                    <option value="{{ $themeName->theme_name }}">{{ $themeName->theme_name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="p-3 save-box bg-dark-blue">
                        <div class="d-flex">
                            <input href="{{ route('settings.update', 'all') }}" class="white main-button px-3 py-0 w-100" value="Save" type="submit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-dark-blue p-3">
                            <p class="white mb-0">Theme CSS</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <div class="position-relative" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                                <textarea class="w-100" id="editor" style="min-height:800px;" label="css" type="text" name="css" spellcheck="false" >{{ $theme->theme_css }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-master>
<style>
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
    * {
        font-family: "Fira Code", monospace;
    }
</style>
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
<script>
    let editor = CodeMirror.fromTextArea
    (document.getElementById('editor'), {
        mode: "css",
        theme: "dracula",
        lineNumbers: "true",
        lineWrapping: "true"
    });
</script>