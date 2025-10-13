        @if (auth()->id() !== $user->id)

        <div class="row">

        <div class="profile-action-buttons mt-2">
            <!-- Follow Button -->

                      <!-- Friend Status Buttons -->
          @if ($isFriend)
            <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-black bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
              Friends
            </button>
          @elseif ($friendRequest)
            <button disabled class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-black bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
              Request Sent
            </button>
          @elseif ($incomingRequest)
            <div class="flex gap-2">
              <form action="{{ route('friend-request.accept', $incomingRequest->id) }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-black bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
                  Accept Request
                </button>
              </form>
              <form action="{{ route('friend-request.decline', $incomingRequest->id) }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-black bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
                  Decline
                </button>
              </form>
            </div>
          @else
            <form action="{{ route('friend-request.send', $user->id) }}" method="POST">
              @csrf
              <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-black bg-blue-600 rounded-lg shadow hover:bg-blue-700 bg-blue transition">
                Add Friend
              </button>
            </form>
          @endif

        </div>

        @if ($isFriend || auth()->id() === $user->id)

            <div class="profile-action-buttons mt-2">


            <!-- Follow/Unfollow Button -->
            @if ($isFollowing)
                <form method="POST" action="{{ route('unfollow', $user->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-black bg-gray-600 rounded-lg shadow hover:bg-gray-700 bg-blue transition">
                {{-- <button type="submit" class="btn btn-primary btn-sm mr-2"> --}}
                    Following
                </button>
                </form>
            @else
                <form method="POST" action="{{ route('follow', $user->id) }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-black bg-blue-600 rounded-lg shadow hover:bg-blue-700 bg-blue transition">
                    {{-- <button type="submit" class="btn btn-primary btn-sm mr-2 bg-blue"> --}}
                        Follow
                    </button>
                    </form>
                @endif
                    {{-- <button class="btn btn-primary btn-sm mr-2">
                        Follow
                    </button> --}}


            <!-- Friend Request Button -->
        </div>

        @endif

        @endif
        </div>
