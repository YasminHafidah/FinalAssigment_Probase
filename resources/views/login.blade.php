<x-layoutMasuk>
    <h2 class="mt-2 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Masuk ke akun Anda</h2>
    <form class="space-y-6" action="{{ route('user.login') }}" method="POST">
        @csrf
        <div>
            <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
            <div class="mt-2">
                <input type="username" name="username" id="username" autocomplete="username" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                    <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa
                        password?</a>
                </div>
            </div>
            <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="current-password" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>

        <div>
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk
            </button>
        </div>
    </form>

    <p class="mt-10 text-center text-sm/6 text-gray-500">
        <a href="{{ route('google.redirect') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Login dengan akun Google</a>
    </p>
    <p class="mt-10 text-center text-sm/6 text-gray-500">
        Belum punya akun?
        <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Registrasi Akun</a>
    </p>
</x-layoutMasuk>
