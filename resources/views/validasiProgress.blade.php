<x-layoutProject>
    <h1 class="text-4xl  text-blue-950 font-bold">Validasi</h1>

    
    <p>{{ $validasi->question }}</p>
    <input type="radio">{{ $validasi->opsi1 }}</input><br>
    <input type="radio">{{ $validasi->opsi2 }}</input><br>
    <input type="radio">{{ $validasi->opsi3 }}</input><br>
    <input type="radio">{{ $validasi->opsi4 }}</input><br><br>

    <a href="#"
        class="rounded-md bg-indigo-600 px-2 py-3 text-xl font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">
        Lanjut
    </a>


</x-layoutProject>
