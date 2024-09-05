<x-layout>
    <section class="p-4 sm:ml-64 md:mt-14">
        <div class="container mx-auto">
            <div class="flex justify-between ">
                <h3 class="text-2xl md:text-xl lg:text-3xl font-bold ">Manage Account</h3>
                <a href="{{ route('payment.create') }}" class="flex flex-row  items-center font-semibold
                text-blue-400">create accounts <i class='bx
                bx-chevron-right'
                    ></i></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                @foreach($user->payments as $account)
                    <div class="account p-4 bg-white rounded-lg shadow-md">
                        <form action="{{ route('payment.record', $account->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="mb-4">
                                <label for="name-{{ $account->id }}" class="block text-gray-700">Account Name</label>
                                <input type="text" id="name-{{ $account->id }}" name="name" value="{{ $account->name
                                }}" class="form-input font-bold text-xl md:text-3xl mt-1 block w-full" disabled>
                            </div>

                            <div class="mb-4">
                                <label for="balance-{{ $account->id }}" class="block text-gray-700">Current Balance:
                                    GH₵ {{ number_format($account->balance, 2) }}</label>
                                <input type="number" id="balance" name="balance" class="form-input border border-gray-200 p-2 w-full rounded" placeholder="Enter amount to add" required>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Amount</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
