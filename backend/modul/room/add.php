<div class="mt-4">
    <h2 class="mb-4">Tambah Kamar</h2>
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Nomor Kamar</label>
            <input type="text" class="form-control" name="no" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Gambar Kamar</label>
            <input type="file" class="form-control" name="img" accept="image/*" required>
        </div>
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Tipe Kamar</label>
            <input type="text" class="form-control" name="tipe" required>
        </div>
        <div class="mb-4">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" required>
        </div>
        <div class="mb-6">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" name="desk" required>
        </div>

        <div class="mb-6">
            <button type="submit" class="btn btn-success" name="btn">Input Kamar</button>
        </div>

    </form>

    <?php
    if (isset($_POST['btn'])) {
        $path = '../gbrroom/';
        $no = $_POST['no'];
        $img = $_FILES['img']['name'];
        $tipe = $_POST['tipe'];
        $harga = $_POST['harga'];
        $status = $_POST['status'];
        $desk = $_POST['desk'];
        move_uploaded_file($_FILES['img']['tmp_name'], $path . $img);
        $sqlInp = $conn->prepare('INSERT INTO rooms(room_number,image,type,price,status,description)VALUES(:no,:img,:tipe,:harga,:status,:desk)');
        $sqlInp->bindParam(':no', $no);
        $sqlInp->bindParam(':img', $img);
        $sqlInp->bindParam(':tipe', $tipe);
        $sqlInp->bindParam(':harga', $harga);
        $sqlInp->bindParam(':status', $status);
        $sqlInp->bindParam(':desk', $desk);
        if ($sqlInp->execute()) {
            header('location:?page=room'); //nanti buat data.php
        } else {
            echo "gagal menambahkan kamar: " . $sqlInp->errorInfo()[2];
        }
    }
    ?>
</div>