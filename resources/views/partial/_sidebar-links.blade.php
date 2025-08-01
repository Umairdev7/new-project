<ul>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('home') }}"
        >
            Home
        </a>
    </li>

    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('explore') }}"
        >
            Explore
        </a>
    </li>
    {{-- <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ url('/calculator') }}"
        >
            Calculator
        </a>
    </li> --}}
    {{-- <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ url('calnew') }}"
        >
            New
        </a>
    </li> --}}
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('bookmarks.index') }}"
        >
            Bookmarks
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ url('/lists') }}"
        >
            Lists
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('profile', auth()->user()) }}"
        >
            Profile
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('user.followers') }}"
        >
            Followers
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('user.index') }}"
        >
            Users
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('friend-requests.index') }}"
        >
            Requests
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('friends') }}"
        >
            Friends
        </a>
    </li>
    <li>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{ route('logout') }}"
        >
            Logout
        </a>
    </li>
</ul>
