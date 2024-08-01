<?php
include '../config/layout.php';
include '../config/database.php';
include '../object/penerbit.php';

$database = new database();
$db = $database->getConnection();

$penerbit = new penerbit($db);

//ambil data anggota
$result = $penerbit->readAll();
$num = $result->rowCount();
?>

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">
        <h2 class="text-4xl font-extrabold text-red-500">Data Penerbit</h2>
        <a href="form-tambah.php">
            <button type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-3 shadow-md">Tambah</button>
        </a>
        <div class="relative overflow-x-auto mt-3 shadow-md">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 border border-gray-300 uppercase bg-gray-50 dark:bg-gray-50 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Penerbit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No telepon
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                ?>
                    <tbody>
                        <tr class="bg-white border-gray-700 dark:bg-white dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-300">
                                <?= $no ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $NamaPenerbit ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $Alamat ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $NoTelp ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="inline-flex rounded-md shadow-sm">
                                    <a href="form-ubah.php?ID=<?= $ID ?>" aria-current="page" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        Ubah
                                    </a>
                                    <a onclick="confirmDelete(<?= $ID ?>)" href="#" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                        Hapus
                                    </a>
                                </div>

                            </td>
                        </tr>
                    <?php
                    $no += 1;
                }
                    ?>
                    </tbody>
            </table>
        </div>
        <?php
        if ($num > 0) {
        }
        ?>
    </div>
</div>
<script>
    function confirmDelete(id) {
        var confirmation = confirm("Anda yakin ingin menghapus data?");

        if(confirmation) {
            window.location.href = "proses-hapus.php?ID=" + id
        }
    }
</script>

</body>
</html>