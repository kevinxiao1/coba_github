<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "connection.php";
        include "adminNavbar.php";
        include "function.php";

        if (isset($_REQUEST['action'])) 
        {
            if ($_REQUEST['action'] == "register") {
                $iJurusan = $_REQUEST['jurusan'];
                $iNama = $_REQUEST['nama'];
                $iPassword = $_REQUEST['password'];
                executeNonQuery($mysqli,"insert into mahasiswa (jurusan,nama,password) values('','$iNama','$iPassword')");
            }    
        }
    ?>
</head>
<body>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <div class="row">
        <?php include "adminDashboard.php" ?>
        <div class="col s10">
        <div style="text-align: center">
            <h1>Register Mahasiswa</h1>
            <?php
            if (isset($message)) {
                echo ("<a class='collection-item'>Alan</a>");
            }
            ?>
            <form action="" method="post">
                <div class="container">
                    <div class="input-field" name="jurusan">
                        <select>
                        <option value="" disabled selected>Pilih Jurusan</option>
                        <option value="1">SIB</option>
                        <option value="2">Informatika</option>
                        <option value="3">Elektro</option>
                        </select>
                        <label>Pilih Jurusan</label>
                    </div>
                    <div class="input-field">
                    <input id="nama" type="text" class="validate" name="nama">
                    <label for="Nama">Nama</label>
                    </div>
                    <div class="input-field">
                    <input id="password" type="text" class="validate" name="password">
                    <label for="Password">Password</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit" name="action" value="register">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>
    
</body>

</html>