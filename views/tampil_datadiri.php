<html>
    <head>
        <title>Data Diri</title>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="2">DATA DIRI</td>
            </tr>
            <tr>
                <td>Nim:</td>
                <td>
                    <?= $nim; ?>
                </td>
            </tr>
            <tr>
                <td>Nama:</td>
                <td>
                    <?= $nama; ?>
                </td>
            </tr>
            <tr>
                <td>Kode Prodi :</td>
                <td>
                    <?= $kode_prodi; ?>
                </td>
            </tr>
            <tr>
                <td>Prodi :</td>
                <td>
                    <?= $prodi; ?>
                </td>
            </tr>
            <tr>
                <td>Alamat:</td>
                <td>
                    <?= $alamat; ?>
                </td>
            </tr>
        </table>
        <a href="<?= base_url('datadiri') ?>">Input lagi?</a>
    </body>
</html>
