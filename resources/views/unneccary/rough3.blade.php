<!-- Include CSS & JS -->
<link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
<script src="/richtexteditor/rte.js"></script>
<script src="/richtexteditor/plugins/all_plugins.js"></script>

<form method="POST" action="/tweets">
    @csrf

    <!-- Title Editor -->
    <div id="div_editor_title">{!! "<p>Title here...</p>" !!}</div>
    <input type="hidden" name="title" id="title_input">

    <!-- Body Editor -->
    <div id="div_editor_body">{!! "<p>Body content here...</p>" !!}</div>
    <input type="hidden" name="body" id="body_input">

    <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Post!</button>
</form>

<script>
    var editorTitle = new RichTextEditor("#div_editor_title");
    var editorBody = new RichTextEditor("#div_editor_body");

    document.querySelector('form').addEventListener('submit', function () {
        document.getElementById('title_input').value = editorTitle.getHTMLCode();
        document.getElementById('body_input').value = editorBody.getHTMLCode();
    });
</script>
