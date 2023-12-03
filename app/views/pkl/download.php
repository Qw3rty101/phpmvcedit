<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data PKL.xls");
?>

<table border=1>
    <thead>
        <tr>
            <th>Tempat PKL</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>No WhatsApp</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['pkl'] as $pklData) {
            echo "<tr>";
            echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["title_info"] . "</td>";
            echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["name_siswa"] . "</td>";
            echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["rombel_siswa"] . "</td>";
            echo "<td style='padding-right:10px;padding-left:10px;'>" . $pklData["noWA_siswa"] . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>