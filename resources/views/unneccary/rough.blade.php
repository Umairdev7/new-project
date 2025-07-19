{{-- <!--Include the JS & CSS-->
<link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
<script type="text/javascript" src="/richtexteditor/rte.js"></script>
<script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>
<div id="div_editor1">
	<p>This is a default toolbar demo of Rich text editor.</p>
	<p><img src='/images/editor-image.png' /></p>
</div>

<script>
	var editor1 = new RichTextEditor("#div_editor1");
	//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
</script> --}}








<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
                <form method="POST" action="/tweets">
                    @csrf

{{--                    <div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-lg space-y-4">--}}
                        <!-- Title Input -->
                        <input
                            type="text"
                            name="title"
                            placeholder="Enter title..."
                            class="w-full text-xl font-semibold border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        />

                        <!-- Text Body Textarea -->
                        <textarea
                            name="body"
                            rows="3"
                            placeholder="What's up doc?"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        ></textarea>

                        <!-- Submit Button (Optional) -->
{{--                        <button--}}
{{--                            type="submit"--}}
{{--                            class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition"--}}
{{--                        >--}}
{{--                            Save--}}
{{--                        </button>--}}
{{--                    </div>--}}


                    {{--                    <textarea--}}
{{--                     name="body"--}}
{{--                     class="w-full"--}}
{{--                     placeholder="What's up doc?"--}}
{{--                     ></textarea>--}}

                    <hr class="my-4">

                    <footer class="flex justify-between">
                        {{-- <img src="https://i.pravatar.cc/40?u={{ auth()->user()->email }}" --}}
                        <img src="{{ auth()->user()->avatar }}"
                        alt="your avatar"
                        class="rounded-full mr-2"
                        >
                        <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Tweet-a-roo!</button>
                    </footer>

                </form>

                @error('body')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>


<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <!--Include the JS & CSS-->
        <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
        <script type="text/javascript" src="/richtexteditor/rte.js"></script>
        <script type="text/javascript" src='/richtexteditor/plugins/all_plugins.js'></script>
        <div id="div_editor1">
	        <p>This is a default toolbar demo of Rich text editor.</p>
	        <p><img src='/images/editor-image.png' /></p>
        </div>

        <script>
	        var editor1 = new RichTextEditor("#div_editor1");
	        //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
        </script>

        <hr class="my-4">

        <footer class="flex justify-between">
            {{-- <img src="https://i.pravatar.cc/40?u={{ auth()->user()->email }}" --}}
            <img src="{{ auth()->user()->avatar }}"
            alt="your avatar"
            class="rounded-full mr-2"
            >
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Tweet-a-roo!</button>
        </footer>

    </form>
</div>

                <div class="flex p-4 border-b border-b-gray-400">
                    <div class="mr-2 flex-shrink-0">
                        <img src="{{ $tweet->user->avatar }}"
                        alt=""
                        class="rounded-full mr-2"
                        >
                    </div>

                    <div>

                        {{-- <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5> --}}
                        <p class="text-sm"><b>{{ $tweet->title }}</b></p>
                        <span class="text-sm text-gray-500">{{ $tweet->created_at->diffForHumans() }}</span>

                        {{-- <p class="text-sm">{{ $tweet->body }}</p> --}}

                        {{-- <a href="{{ route('viewtweet', $tweet->id) }}" class="btn btn-primary btn-sm bg-blue-500 text-white">View</a> --}}

                        {{-- <a href="{{ route('viewtweet', $tweet->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                             View
                        </a> --}}

                        <a href="{{ route('viewtweet', $tweet->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg ">
                             View
                        </a>



                        {{-- <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">View</button> --}}

                    </div>
                </div>

