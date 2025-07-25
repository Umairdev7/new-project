@extends('layouts.app')
@section('content')
    <div class="min-h-full">  <!-- Ensures content fills available height -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile Bio</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-inter antialiased px-3">
  <!-- Container -->
  <main class="max-w-xl mx-auto my-8 bg-white rounded-2xl shadow-md overflow-hidden">
    <!-- Cover image -->
    <div class="relative h-28 sm:h-36 bg-gradient-to-tr from-[#0f172a] via-[#1e293b] to-[#0f172a] rounded-t-2xl overflow-hidden">
      <img
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
          src="{{ $user->avatar }}"
          alt="Avatar"
          class="w-full h-full object-cover"
          onerror="this.style.display='none'"
        />
      </div>
      {{-- <p class="text-sm text-gray-500 mt-3">@{{ \Illuminate\Support\Str::slug($user->name) }}</p> --}}
      <p class="text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($user->name) }}</p>
      <h1 class="text-2xl sm:text-3xl font-semibold mt-1 tracking-tight text-gray-900">{{ $user->name }}</h1>
      <div class="flex flex-wrap justify-center sm:justify-center gap-2 mt-2 text-gray-500 text-sm font-medium">
        <span>{{ $user->interests ?? 'Member' }}</span>
        <span class="mx-1">&bull;</span>
        <span>Joined {{ $user->created_at->format('M Y') }}</span>
      </div>

      <!-- Buttons -->
      <div class="mt-5 flex flex-wrap justify-center gap-4">
        @if (auth()->id() !== $user->id)
          <!-- Follow/Unfollow Button -->
          @if ($isFollowing)
            <form method="POST" action="{{ route('unfollow', $user->id) }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-gray-600 rounded-lg shadow hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Following
              </button>
            </form>
          @else
            <form method="POST" action="{{ route('follow', $user->id) }}">
              @csrf
              <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Follow
              </button>
            </form>
          @endif

          <!-- Friend Status Buttons -->
          @if ($isFriend)
            <span class="px-4 py-2 text-sm font-semibold text-white bg-green-700 rounded-lg shadow">
              Friends
            </span>
          @elseif ($friendRequest)
            <button disabled class="px-4 py-2 text-sm font-semibold text-white bg-yellow-500 rounded-lg shadow">
              Request Sent
            </button>
          @elseif ($incomingRequest)
            <div class="flex gap-2">
              <form action="{{ route('friend-request.accept', $incomingRequest->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg shadow">
                  Accept Request
                </button>
              </form>
              <form action="{{ route('friend-request.decline', $incomingRequest->id) }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg shadow">
                  Decline
                </button>
              </form>
            </div>
          @else
            <form action="{{ route('friend-request.send', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow hover:bg-indigo-700 transition">
                Add Friend
              </button>
            </form>
          @endif
        @endif

        <!-- Message Button (placeholder) -->
        {{-- <button class="flex items-center gap-2 border border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-medium hover:bg-gray-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m-6 0H7a2 2 0 01-2-2v-6a2 2 0 012-2h6m0 0V5a3 3 0 116 0v3" />
          </svg>
          Message
        </button> --}}

        <div class="relative">
  <!-- Friends List Button -->
  <button
    id="friendsButton"
    class="flex items-center gap-2 border border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-medium hover:bg-gray-100 transition"
    onclick="toggleFriendsList()"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    Friends
  </button>

  <!-- Friends Dropdown -->
  <div
    id="friendsDropdown"
    class="hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-10 overflow-hidden"
  >
    <div class="p-3 border-b border-gray-200 bg-gray-50">
      <h3 class="font-semibold text-gray-800">Friends ({{ $user->friends->count() }})</h3>
    </div>

    @if($user->friends->count())
      <div class="max-h-72 overflow-y-auto">
        @foreach($user->friends as $friend)
          <a
            href="{{ route('show', $friend->id) }}"
            class="flex items-center p-3 hover:bg-gray-50 transition"
          >
            <img
              src="{{ $friend->avatar }}"
              alt="{{ $friend->name }}"
              class="w-10 h-10 rounded-full object-cover mr-3 border border-gray-200"
            >
            <div>
              <p class="font-medium text-gray-800">{{ $friend->name }}</p>
              <p class="text-xs text-gray-500">{{ '@'.\Illuminate\Support\Str::slug($friend->name) }}</p>
            </div>
          </a>
        @endforeach
      </div>
    @else
      <div class="p-4 text-center text-gray-500">
        No friends yet
      </div>
    @endif
  </div>
</div>

<script>
  function toggleFriendsList() {
    const dropdown = document.getElementById('friendsDropdown');
    dropdown.classList.toggle('hidden');

    // Close when clicking outside
    document.addEventListener('click', function closeDropdown(e) {
      if (!e.target.closest('.relative')) {
        dropdown.classList.add('hidden');
        document.removeEventListener('click', closeDropdown);
      }
    });
  }
</script>

      </div>

      <!-- Bio/Description -->
      <p class="mt-6 max-w-xl text-center text-gray-700 text-sm leading-relaxed">
        {{ $user->about ?? 'No bio available' }}
      </p>
    </section>

    <section class="px-8 sm:px-12 mt-10 pb-10">
      <!-- Information Header -->
      <h2 class="text-gray-900 text-lg font-semibold mb-5 border-b border-gray-200 pb-2">Information</h2>

      <!-- Information items grid -->
      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-4 text-gray-600 text-sm">
        <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linejoin="round" stroke-linecap="round" d="M12 2a10 10 0 11-7.016 17.017L4 22l4.984-1.016A10 10 0 0112 2z" />
          </svg>
          <dt class="font-medium text-gray-700">Email</dt>
          <dd class="ml-auto truncate max-w-xs sm:max-w-none">{{ $user->email }}</dd>
        </div>

        <div class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linejoin="round" stroke-linecap="round" d="M16 12a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0a8 8 0 11-8 0 8 8 0 018 0z" />
          </svg>
          <dt class="font-medium text-gray-700">Member Since</dt>
          <dd class="ml-auto whitespace-nowrap">{{ $user->created_at->format('d M, Y') }}</dd>
        </div>

        <!-- Additional fields can be added here -->
      </dl>

      <!-- Tags badges -->
      @if($user->interests)
        <div class="mt-8 flex flex-wrap gap-2 border-t border-gray-200 pt-6">
          @foreach(explode(',', $user->interests) as $interest)
            <span class="bg-gray-100 text-gray-800 text-xs sm:text-sm font-semibold py-2 px-4 rounded-lg cursor-default select-none">{{ trim($interest) }}</span>
          @endforeach
        </div>
      @endif
    </section>
  </main>
</body>
    </div>
@endsection
