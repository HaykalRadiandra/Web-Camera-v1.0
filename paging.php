<?php
require "inc.koneksi.php";

$dataPerPage = 6;
$noPage = max(1, (int)($_GET['page'] ?? 1));
$offset = ($noPage - 1) * $dataPerPage;

// Query jumlah data
$queryCount = "SELECT COUNT(*) AS jumData FROM gambar WHERE onview=1 ORDER BY tglupload DESC";

$result = mysqli_query($conn, $queryCount);
$jumData = mysqli_fetch_assoc($result)['jumData'];
$jumPage = max(1, ceil($jumData / $dataPerPage));

// Tampilkan pagination Bootstrap 5.3
echo "<nav><ul class='pagination pagination-sm justify-content-end'>";

// Tombol Previous
$prevDisabled = ($noPage == 1) ? "disabled" : "";
echo "<li class='page-item $prevDisabled'>
        <a class='page-link' href='javascript:void(0)' onClick=\"showImages(" . ($noPage - 1) . ")\">&laquo; Previous</a>
    </li>";

// Halaman numerik
$range = 2;
for ($page = 1; $page <= $jumPage; $page++) {
    if ($page == 1 || $page == $jumPage || ($page >= $noPage - $range && $page <= $noPage + $range)) {
        if ($page == $noPage) {
            echo "<li class='page-item active'><a class='page-link' href='#'>$page</a></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href='javascript:void(0)' onClick=\"showImages($page)\">$page</a></li>";
        }
    } elseif ($page == 2 || $page == $jumPage - 1) {
        echo "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>";
    }
}

// Tombol Next
$nextDisabled = ($noPage == $jumPage) ? "disabled" : "";
echo "<li class='page-item $nextDisabled'>
        <a class='page-link' href='javascript:void(0)' onClick=\"showImages(" . ($noPage + 1) . ")\">Next &raquo;</a>
    </li>";

echo "</ul>
    </nav>";
?>
