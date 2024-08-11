<x-layout>
    <section class="p-4 sm:ml-64 mt-14">
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                @if($user->profile_image)
                                    <img class="h-12 w-12 rounded-full"
                                         src="{{ asset('storage/profile_images') }}/{{
                                                $user->profile_image }}" alt="profile picture"
                                    >
                                @else
                                    <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                                <label for="profile_image" class="">
                                    <span class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change
                                    </span>
                                    <input type="file" id="profile_image"
                                           hidden=""
                                           accept="image/png, image/jpeg, image/jpg"
                                           name="profile_image"
                                    >
                                </label>
                                    @error('profile_image')
                                    <p class="text-red-500 text-xs mt-1">
                                        {{ $message }}
                                    </p>
                                    @enderror
                            </div>
                            <p class="text-sm font-bold">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>

                    </div>
                </div>

                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full
                                name</label>
                            <div class="mt-2">
                                <input type="text" name="name" id="name" autocomplete="given-name" class="block
                                w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset
                                ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset
                                focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" value="{{ $user->name }}">
                            </div>
                        </div>


                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" class="block w-full
                                rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300
                                placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600
                                sm:text-sm sm:leading-6 p-2" value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">

                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Password</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">
                forgotten your password, update your password?
                <a href="{{ route('newPassword') }}">
                    <button class="text-md font-bold text-indigo-500">click here</button>
                </a>
            </p>
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Delete Account</h2>
            <p class="mt-1 text-sm text-red-500 leading-6 text-gray-600">
                Kindly note that this action is permanent!
            </p>
{{--            TODO--}}
            <div class="sm:col-span-3">
                <div class="mt-2">
                    <form action="{{ route('user.delete', $user->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button class="rounded-md mt-2 bg-red-600 px-3 py-2 text-sm font-semibold
                        text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        >
                            DELETE ACCOUNT
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </section>
</x-layout>
