<x-layout>
    @if ($errors->any())
        <div class="mt-4 p-4 bg-red-500 text-white rounded-md">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="mt-4 p-4 bg-green-500 text-white rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mt-4 p-4 bg-red-500 text-white rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/formtest">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10">
                <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                <input id="email" type="email" name="email" placeholder="juandelacruz@umindanao.edu.ph" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                            </div>
                            <div class="mt-3 flex items-center gap-x-6 justify-end">
                                <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="mt-3 p-5">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-white">Emails</h2>
            <span class="text-sm text-gray-400">{{ count($emails) }} / 5</span>
        </div>
        @if (count($emails) >= 5)
            <p class="text-sm text-yellow-400 mt-2">Warning: Email limit reached.</p>
        @endif
        <ul class="mt-4">
            @foreach ($emails as $email)
                <li class="text-sm p-2 bg-gray-700 rounded-md mb-2 flex justify-between items-center">
                    <span>{{ $email }}</span>
                    <form method="POST" action="/delete-email" class="inline">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <button type="submit" class="text-red-400 hover:text-red-600 text-xs font-semibold">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
        @if (count($emails) > 0)
            <form method="GET" action="/delete-emails" class="mt-4">
                <button type="submit" class="text-red-400 hover:text-red-600 text-sm font-semibold">Clear All</button>
            </form>
        @endif
    </div>
</x-layout>
