@extends('layouts.app')
@section('content')
<div class="min-h-full">  <!-- Ensures content fills available height -->

<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  {{-- Edit Title --}}
  <title>Profile Bio - SyLica</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-inter antialiased px-3">
  <!-- Container -->
  <main class="max-w-xl mx-auto my-8 bg-white rounded-2xl shadow-md overflow-hidden">
    <!-- Cover image -->
    <div class="relative h-28 sm:h-36 bg-gradient-to-tr from-[#0f172a] via-[#1e293b] to-[#0f172a] rounded-t-2xl overflow-hidden">
      <img
        {{-- src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/0477d374-dae5-45ed-8c6d-74830089e530.png" --}}
        src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/0477d374-dae5-45ed-8c6d-74830089e530.png"
        alt="Modern abstract dark navy blue gradient background with smooth shapes and textures"
        class="w-full h-full object-cover"
        onerror="this.style.display='none'"
      />
    </div>

    <!-- Profile & user info -->
    <section class="relative px-6 sm:px-10 -mt-16 flex flex-col items-center text-center">
      <div class="relative w-32 h-32 sm:w-36 sm:h-36 rounded-full border-4 border-white shadow-lg bg-white overflow-hidden">
        <img
          {{-- src="https://i.pinimg.com/736x/d0/60/37/d06037ab90de46a4090961c50e6b4917.jpg" --}}
          src="{{ $user->avatar }}"
          alt="Avatar"
          class="w-full h-full object-cover"
          onerror="this.style.display='none'"
        />
      </div>
      {{-- <p class="text-sm text-gray-500 mt-3"> {{ $user->name }} </p> --}}
      <p class="text-sm text-gray-500 mt-3"> User Profile </p>
      <h1 class="text-2xl sm:text-3xl font-semibold mt-1 tracking-tight text-gray-900"> {{ $user->name }} </h1>
      <div class="flex flex-wrap justify-center sm:justify-center gap-2 mt-2 text-gray-500 text-sm font-medium">
        {{-- <span>Isekai</span> --}}
        <span class="mx-1">&bull;</span>
        <span>Joined {{ $user->created_at->diffForHumans() }}</span>
      </div>

      <!-- Buttons -->
    @if (auth()->id() == $user->id)

      <div class="mt-5 flex flex-wrap justify-center gap-4">
          {{-- <button class="flex items-center gap-2 border border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-medium hover:bg-gray-100 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Edit
        </button> --}}
    <a href="{{ route('user.edit',$user->id) }}">
        <button class="flex items-center gap-2 border border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-medium hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 11l6.536-6.536a2 2 0 112.828 2.828L11.828 13.828a2 2 0 01-1.414.586H9v-2.414a2 2 0 01.586-1.414z" />
        </svg>
        Edit
        </button>
    </a>
        {{-- <button class="flex items-center gap-2 border border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-medium hover:bg-gray-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m-6 0H7a2 2 0 01-2-2v-6a2 2 0 012-2h6m0 0V5a3 3 0 116 0v3" />
          </svg>
          Message
        </button> --}}
        <a href="{{ route('friends') }}">
            <button class="flex items-center gap-2 border border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-medium hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Friends
            </button>
        </a>

        <button aria-label="More options" class="flex items-center justify-center border border-gray-300 rounded-lg py-2 px-3 text-gray-700 hover:bg-gray-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <circle cx="12" cy="12" r="1" />
            <circle cx="19" cy="12" r="1" />
            <circle cx="5" cy="12" r="1" />
          </svg>
        </button>
      </div>
    @endif


      <!-- Bio/Description -->
        <p class="mt-6 max-w-xl text-center text-gray-700 text-sm leading-relaxed">
            {{ $user->about }}
        </p>
    </section>

    <section class="px-8 sm:px-12 mt-10 pb-10">
      <!-- Information Header -->
      <h2 class="text-gray-900 text-lg font-semibold mb-5 border-b border-gray-200 pb-2">Information</h2>

      <!-- Information items grid -->
      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-4 text-gray-600 text-sm">
        {{-- <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linejoin="round" stroke-linecap="round" d="M12 2a10 10 0 11-7.016 17.017L4 22l4.984-1.016A10 10 0 0112 2z" />
          </svg>
          <dt class="font-medium text-gray-700">Website</dt>
          <dd class="ml-auto">sylica.eu.org</dd>
        </div> --}}

        <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linejoin="round" stroke-linecap="round" d="M16 12a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0a8 8 0 11-8 0 8 8 0 018 0z" />
          </svg>
          <dt class="font-medium text-gray-700">Email</dt>
          <dd class="ml-auto truncate max-w-xs sm:max-w-none">{{ $user->email }}</dd>
        </div>

        {{-- <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linejoin="round" stroke-linecap="round" d="M3 10l6 6-4 4m9-18v12m0 0l-4-4m4 4l4-4" />
          </svg>
          <dt class="font-medium text-gray-700">Phone</dt>
          <dd class="ml-auto whitespace-nowrap">+00 000 000 00 00</dd>
        </div> --}}

        <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linejoin="round" stroke-linecap="round" d="M12 4v16m-6-8h12" />
          </svg>
          <dt class="font-medium text-gray-700">Joined</dt>
          <dd class="ml-auto whitespace-nowrap">{{ $user->created_at->diffForHumans() }}</dd>
        </div>
      </dl>

      <!-- Tags badges -->
      {{-- <div class="mt-8 flex flex-wrap gap-2 border-t border-gray-200 pt-6">
        <span class="bg-gray-100 text-gray-800 text-xs sm:text-sm font-semibold py-2 px-4 rounded-lg cursor-default select-none">UI Designer</span>
        <span class="bg-gray-100 text-gray-800 text-xs sm:text-sm font-semibold py-2 px-4 rounded-lg cursor-default select-none">UX Designer</span>
        <span class="bg-gray-100 text-gray-800 text-xs sm:text-sm font-semibold py-2 px-4 rounded-lg cursor-default select-none">Design System</span>
        <span class="bg-gray-100 text-gray-800 text-xs sm:text-sm font-semibold py-2 px-4 rounded-lg cursor-default select-none">Product</span>
        <span class="bg-gray-100 text-gray-800 text-xs sm:text-sm font-semibold py-2 px-4 rounded-lg cursor-default select-none">Succesfull</span>
      </div> --}}
    </section>
  </main>

</body>
</html>
</div>
@endsection
