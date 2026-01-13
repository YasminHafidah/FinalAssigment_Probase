<x-layout>
    @section('title', 'Profile - ProBase')
    <div class="flex flex-col items-center justify-center bg-[#E8F1F2]">
        <div class="w-full">
            <h1 class="text-6xl font-extrabold text-[#0B132B] text-center">Edit Profile</h1>
            <div class="mt-5 items-center">
                <form class="grid grid-cols-[auto_1fr] gap-y-6 items-center" action="{{ route('profile.update') }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <span class="justify-center bg-[#8093F1] rounded-full shrink-0 p-3 text-[#0B132B] font-bold text-lg">
                        Nama Lengkap
                    </span>
                    <input type="nama" name="nama" id="nama" autocomplete="nama" placeholder="Nama Lengkap"
                        required
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

                    <div class="col-span-2">
                        <button type="submit"
                            class="flex w-full justify-center rounded-2xl bg-[#0B132B] px-3 py-1.5 text-2xl font-bold text-white shadow-lg hover:bg-[#8093F1] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan
                            Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
