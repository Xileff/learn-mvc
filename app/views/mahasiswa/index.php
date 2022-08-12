<?php echo 1 ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <h3><?= $data['judul'] ?></h3>
            <?php foreach ($data['mhs'] as $mhs) : ?>
                <ul>
                    <li><?= $mhs['nama'] ?></li>
                    <li><?= $mhs['nim'] ?></li>
                    <li><?= $mhs['email'] ?></li>
                    <li><?= $mhs['jurusan'] ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>