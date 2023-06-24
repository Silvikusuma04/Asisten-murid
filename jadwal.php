<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Sekolah</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 0.5px solid #ccc;
            padding: 80px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Jadwal Sekolah</h1>
    <table>
        <tr>
            <th>Hari</th>
            <th>Mata Pelajaran</th>
            <th>Jam</th>
        </tr>
        <?php
        $jadwal = array(
            'Senin' => array(
                array('Matematika', '08:00 - 09:00'),
                array('Bahasa Inggris', '09:00 - 10:00'),
                array('Fisika', '10:00 - 11:00'),
                array('Kimia', '11:00 - 12:00'),
                array('Sejarah', '13:00 - 14:00'),
                array('Seni Budaya', '14:00 - 15:00'),
                array('Pulang', '15:00')
            ),
            'Selasa' => array(
                array('Biologi', '08:00 - 09:00'),
                array('Bahasa Indonesia', '09:00 - 10:00'),
                array('Pendidikan Jasmani', '10:00 - 11:00'),
                array('Sejarah', '11:00 - 12:00'),
                array('Geografi', '13:00 - 14:00'),
                array('Bahasa Jepang', '14:00 - 15:00'),
                array('Pulang', '15:00')
            ),
            'Rabu' => array(
                array('Agama', '08:00 - 09:00'),
                array('Sosiologi', '09:00 - 10:00'),
                array('Kewarganegaraan', '10:00 - 11:00'),
                array('Komputer', '11:00 - 12:00'),
                array('Ekonomi', '13:00 - 14:00'),
                array('Pulang', '14:00')
            ),
            'Kamis' => array(
                array('Bimbingan Konseling', '08:00 - 09:00'),
                array('Prakarya', '09:00 - 10:00'),
                array('Bahasa Indonesia', '10:00 - 11:00'),
                array('Filsafat', '11:00 - 12:00'),
                array('Peminatan', '13:00 - 14:00'),
                array('Pulang', '14:00')
            ),
            'Jumat' => array(
                array('Kebudayaan Daerah', '08:00 - 09:00'),
                array('Pendidikan Lingkungan Hidup', '09:00 - 10:00'),
                array('Pendidikan Pancasila', '10:00 - 11:00'),
                array('Pulang', '11:00')
            ),
            'Sabtu' => array(
                array('Olahraga', '08:00 - 09:00'),
                array('Wirausaha ', '09:00 - 10:00'),
                array('Pramuka', '10:00 - 11:00'),
                array('Bahasa Inggris', '11:00 - 12:00'),
                array('Pulang', '12:00')
            )
        );

        foreach ($jadwal as $hari => $mataPelajaran) {
            $jumlahPelajaran = count($mataPelajaran) - 1; // Mengurangi 1 untuk keterangan pulang

            echo "<tr>";
            echo "<td rowspan='$jumlahPelajaran'>$hari</td>";

            $isFirst = true;
            foreach ($mataPelajaran as $jadwalPelajaran) {
                if ($isFirst) {
                    $isFirst = false;
                } else {
                    echo "<tr>";
                }

                echo "<td>{$jadwalPelajaran[0]}</td>";
                echo "<td>{$jadwalPelajaran[1]}</td>";

                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
