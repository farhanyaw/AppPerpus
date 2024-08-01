<?php
include '../config/layout.php'
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-black">Tambah Kategori baru</h2>
        <form action="proses-tambah.php" method="post">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="NamaKategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama Kategori</label>
                    <input type="text" name="NamaKategori" id="NamaKategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-700 white white:border-gray-600 white:placeholder-gray-400 dark:text-black white:focus:ring-primary-500 white:focus:border-primary-500" placeholder="Masukkan NamaKategori" required="">
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-3 shadow-md">Simpan</button>
                    <button type="button" onclick="history.back()" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>

</html>