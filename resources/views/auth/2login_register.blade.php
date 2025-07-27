<html>
<head>
    <link rel="stylesheet" href="/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>

    <!-- Glowing Mouse-Follow Shadow -->
{{-- <div id="shadow"
     class="fixed top-0 left-0 z-50 h-32 w-32 rounded-full bg-white blur-[100px] opacity-0 pointer-events-none transition-opacity duration-300">
</div> --}}

<div id="shadow"
     class="fixed top-0 left-0 z-1 h-32 w-32 rounded-full bg-white blur-[70px] transition-opacity duration-300 opacity-0">
</div>


{{-- <div
     class="fixed top-0 left-0 z-1 h-32 w-32 rounded-full bg-white blur-[70px] transition-opacity duration-300 opacity-0" id="shadow">
</div> --}}

<div x-data="{ isLogin: true }"
     class="radius-xl relative z-1 flex h-screen w-full flex-col overflow-auto p-5 sm:p-10">

    <div id="card"
        class="relative mx-auto my-auto w-full max-w-110 shrink-0 overflow-hidden rounded-4xl border-t border-white/20 bg-gradient-to-t from-zinc-100/10 to-zinc-950/50 to-50% p-8 text-white shadow-2xl shadow-black outline -outline-offset-1 outline-white/5 backdrop-blur-2xl">

        <!-- Toggle Tabs -->
        {{-- <div class="mb-8 inline-flex h-12 items-center rounded-full border-b border-b-white/12 bg-zinc-950/75 p-1 text-sm font-medium">
            <button @click="isLogin = false"
                class="px-6"
                :class="!isLogin ? 'text-white bg-zinc-800 rounded-full border-t border-t-white/10 outline outline-white/4' : 'text-zinc-500'">
                Sign up
            </button>
            <button @click="isLogin = true"
                class="px-6"
                :class="isLogin ? 'text-white bg-zinc-800 rounded-full border-t border-t-white/10 outline outline-white/4' : 'text-zinc-500'">
                Sign in
            </button>
        </div> --}}

    <!-- Toggle Tabs with matching glowing background -->
    <div class="mb-8 inline-flex h-12 items-center rounded-full bg-zinc-950/75 border border-white/10 p-1 text-sm font-medium shadow-xl shadow-black/20 backdrop-blur-xl max-w-md mx-auto">
        <!-- Sign Up Tab -->
        <div
            @click="isLogin = false"
            :class="!isLogin
            ? 'inline-flex h-full items-center rounded-full border-t border-t-white/10 bg-zinc-800 px-6 outline -outline-offset-1 outline-white/4 text-white'
            : 'px-6 text-white/50 hover:text-white cursor-pointer'"
        >
            Sign up
        </div>

        <!-- Sign In Tab -->
        <div
            @click="isLogin = true"
            :class="isLogin
            ? 'inline-flex h-full items-center rounded-full border-t border-t-white/10 bg-zinc-800 px-6 outline -outline-offset-1 outline-white/4 text-white'
            : 'px-6 text-white/50 hover:text-white cursor-pointer'"
        >
            Sign in
        </div>
    </div>


        <!-- Title -->
        <h2 class="mb-7 text-[1.4rem] font-medium" x-text="isLogin ? 'Login to your account' : 'Create a new account'"></h2>

        <!-- AUTH FORM CONTAINER -->
        <div class="flex grid-cols-2 flex-col gap-4 text-sm sm:grid">
            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" x-show="isLogin" x-cloak class="col-span-2 flex flex-col gap-4">
                @csrf

                <!-- Email -->
                <div class="relative h-11 overflow-hidden">
                    <input id="email" type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autocomplete="email"
                           placeholder="Email address"
                           class="peer relative z-1 h-full w-full rounded-md border border-white/8 bg-white/5 px-4 text-white placeholder:text-white/20 focus:outline-0 @error('email') border-red-500 @enderror">
                    @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div class="relative h-11 overflow-hidden">
                    <input id="password" type="password"
                           name="password"
                           required
                           placeholder="Password"
                           autocomplete="current-password"
                           class="peer relative z-1 h-full w-full rounded-md border border-white/8 bg-white/5 px-4 text-white placeholder:text-white/20 focus:outline-0 @error('password') border-red-500 @enderror">
                    @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Remember -->
                <div class="flex items-center space-x-2 text-sm mt-1">
                    <input type="checkbox" name="remember" id="remember"
                           class="accent-white"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="text-white">Remember Me</label>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="mt-3 h-12 w-full rounded-md bg-white px-2 text-sm font-medium text-zinc-800 shadow-xl">
                    Login
                </button>

                <!-- Forgot Password -->
                @if (Route::has('password.request'))
                    <a class="mt-2 text-sm text-center text-zinc-400 hover:text-white" href="{{ route('password.request') }}">
                        Forgot your password?
                    </a>
                @endif
            </form>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" x-show="!isLogin" x-cloak class="col-span-2 flex flex-col gap-4">
                @csrf

                <!-- Name -->
                <div class="relative h-11 overflow-hidden">
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           placeholder="Full name"
                           class="peer relative z-1 h-full w-full rounded-md border border-white/8 bg-white/5 px-4 text-white placeholder:text-white/20 focus:outline-0 @error('name') border-red-500 @enderror">
                    @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div class="relative h-11 overflow-hidden">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           placeholder="Email address"
                           class="peer relative z-1 h-full w-full rounded-md border border-white/8 bg-white/5 px-4 text-white placeholder:text-white/20 focus:outline-0 @error('email') border-red-500 @enderror">
                    @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div class="relative h-11 overflow-hidden">
                    <input type="password"
                           name="password"
                           required
                           placeholder="Password"
                           class="peer relative z-1 h-full w-full rounded-md border border-white/8 bg-white/5 px-4 text-white placeholder:text-white/20 focus:outline-0 @error('password') border-red-500 @enderror">
                    @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="relative h-11 overflow-hidden">
                    <input type="password"
                           name="password_confirmation"
                           required
                           placeholder="Confirm password"
                           class="peer relative z-1 h-full w-full rounded-md border border-white/8 bg-white/5 px-4 text-white placeholder:text-white/20 focus:outline-0">
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="mt-3 h-12 w-full rounded-md bg-white px-2 text-sm font-medium text-zinc-800 shadow-xl">
                    Register
                </button>
            </form>
        </div>
    </div>
</div>

<script src="js/shadow.js"></script>

</body>
</html>
