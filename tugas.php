<?php

if (isset($_POST['simpan'])) {
    $tanggal=$_POST['tanggal'];
    $jam=$_POST['jam'];
    $mapel=$_POST['mapel'];
    $tugass=$_POST['jenis_tugas'];
    $catatan=$_POST['catatan'];
    
    $file="file/".$nik."-".$nama.".txt";
    $fh=fopen($file, "a");
    $cek_baris=fopen($file, "r");
    $baris=fgets($cek_baris);
    if ($baris) {
        $file="\n".$tanggal."|".$jam."|".$mapel."|".$tugass."|".$catatan;
    }
    else{
        $file=$tanggal."|".$jam."|".$mapel."|".$tugass."|".$catatan;
    }
    fwrite($fh, $file);
    fclose($fh);
}

?>
<div class="card">
    <div class="card-header bg-primary text-white">
        FORM AGENDA SISWA
    </div>
    <div class="card-body py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php echo @$alert;?>
                <form action="" method="POST">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control mt-2 mb-4" required>
                    <label for="">Jam</label>
                    <input type="time" name="jam" class="form-control mt-2 mb-4" required>
                    <label for="">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control mt-2 mb-4" required>
                    <label for="">Tugas</label>
                    <label for="">Jenis Tugas</label>
                    <div class="form-check">
                        <input type="radio" name="jenis_tugas" value="PR" id="PR" class="form-check-input" required>
                        <label for="PR" class="form-check-label">PR</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jenis_tugas" value="Tugas_kelompok" id="Tugas_kelompok" class="form-check-input" required>
                        <label for="Tugas_kelompok" class="form-check-label">Tugas Kelompok</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jenis_tugas" value="Latihan_soal" id="Latihan_soal" class="form-check-input" required>
                        <label for="Latihan_soal" class="form-check-label">Latihan Soal</label>
                    </div>
                    <label for="">Catatan Agenda Hari ini</label>
                    <input type="text" name="catatan" class="form-control mt-2 mb-4" required>
                    <div class="form-inline">
                        <button name="simpan" class="btn btn-primary">Simpan</button>
                        <button name="reset" type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>