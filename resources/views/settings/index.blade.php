<?php
use App\Models\Themes;
use App\Models\Settings;
?>
<x-admin-master>
    <div class="p-3">
        <form class="mb-0 w-100" action="{{ route('settings.update', 'all') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-accent-light p-3">
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
                        <div class="col-12 d-flex bg-accent-light p-3">
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
                        <div class="col-12 d-flex bg-accent-light p-3">
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
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <label>Portfolio Module:</label>
                            <select name="portfolio_active" class="edit-page-input p-1">
                                @if($portfolio->value == 0)
                                    <option value="{{ $portfolio->value }}">Disabled</option>
                                    <option value="1">Enabled</option>
                                @else
                                    <option value="{{ $portfolio->value }}">Enabled</option>
                                    <option value="0">Disabled</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="p-3 save-box bg-accent-light">
                        <div class="d-flex">
                            <input href="{{ route('settings.update', 'all') }}" class="white main-button px-3 py-0 w-100" value="Save" type="submit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-accent-light p-3">
                            <p class="white mb-0">Theme CSS</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <div class="position-relative" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                                <textarea class="w-100 editor_css" id="editor_css" style="min-height:800px;" label="css" type="text" name="css" spellcheck="false" >{{ $theme->theme_css }}</textarea>
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
<script src="/codemirror/lib/codemirror.js"></script>
<script src="/codemirror/mode/xml/xml.js"></script>
<script src="/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="/codemirror/mode/css/css.js"></script>
<script src="/codemirror/mode/htmlembedded/htmlembedded.js"></script>
<script src="/codemirror/mode/xml/xml.js"></script>
<script src="/codemirror/addon/search/search.js"></script>
<script src="/codemirror/addon/search/searchcursor.js"></script>
<script src="/codemirror/addon/search/jump-to-line.js"></script>
<script src="/codemirror/addon/dialog/dialog.js"></script>
<script>
    let editor_css = CodeMirror.fromTextArea
    (document.getElementById('editor_css'), {
        mode: "xml",
        theme: "dracula",
        lineNumbers: "true",
        lineWrapping: "true"
    });
</script>