{{-- <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8"> --}}
<div class="px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <!--Include the JS & CSS-->
        <div class="mb-5">
        <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
        <script type="text/javascript" src="/richtexteditor/rte.js"></script>
        <script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>
        <div id="div_editor1">
            {{-- <input type="text" name="title" id=""> --}}

            {!! "<p>This is a default toolbar demo of Rich text editor.</p>" !!}
	        <p name="title">Title.</p>
	        <p name="body">This is a default toolbar demo of Rich text editor.</p>
	        {{-- <p><img src='/images/editor-image.png' /></p> --}}
	        <p><img src="{{ auth()->user()->avatar }}"
                    alt="your avatar"
                    class="rounded-full mr-2"
                />
            </p>
        </div>

        <script>
	        var editor1 = new RichTextEditor("#div_editor1");
	        //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
        </script>
        </div>
        {{-- <hr class="my-4"> --}}
        <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Post!</button>



    </form>

        @error('body')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror

</div>
