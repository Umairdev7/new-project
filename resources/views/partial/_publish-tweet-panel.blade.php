{{-- <!-- Include Rich Text Editor CSS & JS -->
<link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
<script src="/richtexteditor/rte.js"></script>
<script src="/richtexteditor/plugins/all_plugins.js"></script>

<!-- Form Container -->
<div class="px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <!-- Single Rich Text Editor with combined Title and Body -->
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Write Your Post</label>
            <div id="div_editor">
                {!! '<h1>Enter your title here</h1><p>Write your post content here...</p>' !!}
            </div>

            <!-- Hidden Inputs to Capture Separated Values -->
            <input type="hidden" name="title" id="title_input">
            <input type="hidden" name="body" id="body_input">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-4 text-white">Post!</button>

        <!-- Validation Error (Optional) -->
        @error('body')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </form>
</div>

<!-- Initialize Rich Text Editor and Handle Submit -->
<script>
    // Initialize RTE
    var editor = new RichTextEditor("#div_editor");

    // On Form Submit: Extract <h1> as title, rest as body
    document.querySelector('form').addEventListener('submit', function () {
        const fullHTML = editor.getHTMLCode();

        const parser = new DOMParser();
        const doc = parser.parseFromString(fullHTML, 'text/html');

        // Extract <h1> title
        const titleElement = doc.querySelector('h1');
        const title = titleElement ? titleElement.innerText.trim() : '';

        // Remove title from DOM so only body remains
        if (titleElement) titleElement.remove();

        // Get the rest of the content as body
        const body = doc.body.innerHTML.trim();

        // Fill hidden inputs
        document.getElementById('title_input').value = title;
        document.getElementById('body_input').value = body;
    });
</script> --}}

{{-- 2 --}}

<!-- Include Rich Text Editor CSS & JS -->
<link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
<script src="/richtexteditor/rte.js"></script>
<script src="/richtexteditor/plugins/all_plugins.js"></script>

<!-- Form Container -->
<div class="px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <!-- Title Field -->
        <div class="mb-5">
            <label for="title_input" class="block mb-2 font-semibold">Title</label>
            <input
                type="text"
                id="title_input"
                name="title"
                class="w-full border rounded px-3 py-2"
                placeholder="Enter your title here"
                required
            >
        </div>

        <!-- Rich Text Body Editor -->
        <div class="mb-5">
            <label class="block mb-2 font-semibold">Body</label>
            <div id="div_editor">
                <p>Write your post content here...</p>
            </div>

            <!-- Hidden input to store body HTML -->
            <input type="hidden" name="body" id="body_input">
        </div>

        <!-- Submit Button -->
        <button type="submit" class=" bg-blue-500 rounded-lg shadow py-2 px-4 text-white">Post!</button>

        <!-- Validation Error -->
        @error('body')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
    </form>
</div>

<!-- Initialize Rich Text Editor and Extract Body on Submit -->
<script>
    var editor = new RichTextEditor("#div_editor");

    document.querySelector('form').addEventListener('submit', function () {
        const bodyHTML = editor.getHTMLCode().trim();
        document.getElementById('body_input').value = bodyHTML;
    });
</script>

