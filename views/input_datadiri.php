<html>
    <head>
        <title>Form Data Diri</title>
    </head>
    <body>
        <form action="<?=base_url('datadiri/tampil')?>"  method="post">
            <table>
                <tr>
                    <td colspan="2">FORM DATA DIRI</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>
                        <input type="text" name="nim">
                    </td>
                </tr>
                <tr>
                    <td>NAMA</td>
                    <td>
                        <input type="text" name="nama">
                    </td>
                </tr>
                <tr>
                    <td>Kode Prodi</td>
                    <td>
                        <select name="prodi" id="">
                            <option value=""></option>
                            <option value="Sistem Informasi">SI</option>
                            <option value="Teknologi Informasi">TI</option>
                            <option value="Ilmu Komputer">IK</option>
                            <option value="Akutansi">AK</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td>
                        <textarea name="alamat" id="" cols="25" rows="5"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" value="submit">
        </form>
    </body>
</html>