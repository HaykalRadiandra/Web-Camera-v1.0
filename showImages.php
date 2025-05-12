<?php
require "inc.koneksi.php";

$dataPerPage = 6;
$noPage = max(1, (int)($_GET['page'] ?? 1));
$offset = ($noPage - 1) * $dataPerPage;

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

$gambar = query("SELECT kodegambar, path, tglupload FROM gambar WHERE onview=1 ORDER BY tglupload DESC LIMIT $dataPerPage OFFSET $offset");
$chunked = array_chunk($gambar, 2);
?>
<?php foreach ($chunked as $kolom) : ?>
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <?php foreach ($kolom as $row) : ?>
            <img
                src="<?= $row['path']; ?>"
                class="w-100 shadow-1-strong rounded mb-4"
                alt="Gambar <?= $row['kodegambar']; ?>" />
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
