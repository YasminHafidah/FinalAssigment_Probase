<x-layoutMasuk>
    @section('title', 'Daftar - ProBase')
    <div class="grid min-h-screen grid-cols-1 grid-rows-[auto_1fr] md:grid-cols-2 md:grid-rows-none">

        <div class="items-center justify-center bg-[#0B132B] p-5 md:flex md:p-12 md:order-last">
            <div class="text-center">
                <h1 class="font-erica text-8xl font-bold text-[#E8F1F2]">ProBase</h1>
                <p class="mx-auto mt-4 max-w-md text-lg font-semibold text-[#E49273]">
                    “E-Learning berbasis fase Database Design untuk pembelajaran Perancangan Basis Data”
                </p>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center p-8 md:p-12 bg-[#E8F1F2] md:order-first">
            <div class="w-full max-w-md">
                <h1 class="text-6xl font-extrabold text-[#0B132B] text-center">Daftar Akun</h1>
                <h2 class="text-lg text-[#0B132B] text-center mt-3">Masukkan data-data yang diperlukan untuk
                    membuat akun dengan benar</h2>
                <div class="mt-5 items-center">
                    <form class="grid grid-cols-[auto_1fr] gap-y-6 items-center" action="{{ route('user.register') }}"
                        method="POST">
                        @csrf
                        <span
                            class="justify-center bg-[#8093F1] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-lg">
                            Nama Lengkap
                        </span>
                        <input type="nama" name="nama" id="nama" autocomplete="nama"
                            placeholder="Nama Lengkap" required
                            class="w-full p-3 text-lg text-[#0B132B] placeholder-gray-500 border-none focus:ring-0  rounded-3xl bg-[#E49273] shadow-lg">

                        <span
                            class="justify-center bg-[#8093F1] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-lg">
                            Kelas
                        </span>
                        <select type="kelas" name="kelas" id="kelas" autocomplete="kelas" required
                            class="w-full p-3 text-lg text-[#0B132B] placeholder-[#8093F1] border-none focus:ring-0  rounded-3xl bg-[#E49273] shadow-lg">
                            <option value="" disabled selected>Pilih kelas kamu</option>
                            <option value="XI RPL A">XI RPL A</option>
                            <option value="XI RPL B">XI RPL B</option>
                        </select>
                        <span
                            class="justify-center bg-[#8093F1] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-lg">
                            Email
                        </span>
                        <input type="email" name="email" id="email" autocomplete="email" required
                            placeholder="email@gmail.com"
                            class="w-full p-3 text-lg text-[#0B132B] placeholder-gray-500 border-none focus:ring-0  rounded-3xl bg-[#E49273] shadow-lg">

                        <span
                            class="justify-center bg-[#8093F1] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-lg">
                            Username
                        </span>
                        <input type="username" name="username" id="username" autocomplete="username" required
                            placeholder="username"
                            class="w-full p-3 text-lg text-[#0B132B] placeholder-gray-500 border-none focus:ring-0  rounded-3xl bg-[#E49273] shadow-lg">

                        <span
                            class="justify-center bg-[#8093F1] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-lg">
                            Password
                        </span>
                        <input type="password" name="password" id="password" autocomplete="password" required
                            placeholder="Masukkan 8 karakter" minlength="8"
                            class="w-full p-3 text-lg text-[#0B132B] placeholder-gray-500 border-none focus:ring-0  rounded-3xl bg-[#E49273] shadow-lg">

                        <div class="col-span-2">
                            <button type="submit"
                                class="flex w-full justify-center rounded-2xl bg-[#0B132B] px-3 py-1.5 text-2xl font-bold text-white shadow-lg hover:bg-[#8093F1] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar
                            </button>
                        </div>
                    </form>

                    <div>
                        <p class="mt-6 text-center text-sm text-[#0B132B]">
                            Sudah punya akun?
                            <a href="/" class="font-semibold text-[#8093F1] hover:text-indigo-500">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>


</x-layoutMasuk>

{{-- <h2 class="mt-2 mb-2 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Daftarkan akun Anda</h2>
    <form class="space-y-6" action="{{ route('user.register') }}" method="POST">
        @csrf
        <div>
            <label for="nama" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap</label>
            <div class="mt-2">
                <input type="nama" name="nama" id="nama" autocomplete="nama" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
        <div>
            <label for="kelas" class="block text-sm/6 font-medium text-gray-900">Kelas</label>
            <div class="mt-2">
                <input type="kelas" name="kelas" id="kelas" autocomplete="kelas" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
            <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
        <div>
            <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
            <div class="mt-2">
                <input type="username" name="username" id="username" autocomplete="username" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
        <div>
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
            <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="password" required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
        <div>
            <button type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar
            </button>
        </div>
    </form>
</x-layoutMasuk> --}}
