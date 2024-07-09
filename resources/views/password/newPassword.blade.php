<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 p-6 ">
            <h1 class="text-center font-bold text-xl">Create an account</h1>
            <p class="text-sm font-md text-center">Enter your credentials to sign up for this app</p>
            <form method="POST" action="{{ route('password.update', Auth::user()->id) }}" class="mt-10 space-y-6">
                @csrf
                @method('PATCH')
                <div>
                    <label for="old_password" class="col-md-4 col-form-label text-md-right">Old Password</label>

                    <div class="mt-2">
                        <input id="old_password" type="password" class="border border-gray-400 rounded-lg p-2 w-full @error('old_password') is-invalid @enderror" name="old_password" required autofocus>

                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                    <div class="mt-2">
                        <input id="password" type="password" class="border border-gray-400 rounded-lg p-2 w-full @error('password') is-invalid @enderror" name="password" required>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div >
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>

                    <div class="mt-2">
                        <input id="password-confirm" type="password" class="border border-gray-400 rounded-lg p-2 w-full" name="password_confirmation" required>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-black text-white rounded-lg w-full py-2 px-4 hover:bg-blue-800 cursor-pointer">
                        Change Password
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
