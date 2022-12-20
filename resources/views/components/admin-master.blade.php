<?php
use App\Models\Themes;
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="/codemirror/theme/dracula.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="icon" type="image/png" href="/img/favicon.svg"/>
        <script src="/codemirror/lib/codemirror.js"></script>
        <script src="/codemirror/mode/xml/xml.js"></script>
    </head>
    <style>
        {{ Themes::where('active', '=', '1')->first()->theme_css }}
    </style>
    <body>
        <div class="container-fluid p-0" style="background: #D9D9D6;">
            <div class="row g-0 vh-100">
                <div class="col-12 col-lg-2">
                    <x-admin-sidebar></x-admin-sidebar>
                </div>
                <div class="col-12 col-lg-10" style="background: #D9D9D6;">
                    <x-admin-nav></x-admin-nav>
                    {{ $slot }}
                </div>
            </div>
        </div>

    </body>
    <script>
        let editor = CodeMirror.fromTextArea
        (document.getElementById('editor'), {
            mode: "xml",
            theme: "dracula",
            lineNumbers: "true",
            lineWrapping: "true"
        });
    </script>
</html>