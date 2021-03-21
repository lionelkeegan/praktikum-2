<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penilaian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style="background-color:#bbbbbb">
    <div class="bg-secondary p-2 mb-4">
        <h3 class="text-left text-white">Sistem Penilaian</h3>
    </div>
    <div class="container">    
        <form class="form-horizontal p-5 shadow" style="background-color:#e2d5d5;" method="GET" action="form_nilai.php">

            <div class="text-center">
                <h3 class="mb-5 text-secondary text-mg">Form Nilai Siswa</h3>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Nama</b></label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nim" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>NIM</b></label>
                <div class="col-sm-5">
                <input type="number" class="form-control" name="nim" required>
                </div>
            </div>
            <br>

            <!------------>
            <div class="form-group row">
                <label for="matakuliah" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Mata Kuliah</b></label>
                <div class="col-sm-7">
                <select name="mata_kuliah" class="form-control">
                    <option selected>Pilih Mata Kuliah :</option>
                    <option value="Dasar-Dasar Pemrograman">Dasar-Dasar Pemrograman</option>
                    <option value="Pemrograman Web Lanjutan">Pemrograman Web Lanjutan</option>
                    <option value="Basis Data">Basis Data</option>
                    <option value="Database">Database</option>
                    <option value="Statistika">Statistika</option>
                    <option value="PKN">PKN</option>
                    <option value="UI/UX">UI/UX</option>
                </select>
                </div>
            </div>
            <br>

            <!------------>
            <div class="form-group row">
                <label for="nilaiuts" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Nilai UTS</b></label>
                <div class="col-sm-5">
                <input type="number" class="form-control" name="nilai_uts" required>
                </div>
            </div>
            <br>

            <!------------>
            <div class="form-group row">
                <label for="nilaiuas" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Nilai UAS</b></label>
                <div class="col-sm-5">
                    <input type="number" class="form-control " name="nilai_uas" required>
                </div>
            </div>
            <br>

            <!------------>
            <div class="form-group row">
                <label for="nilaitugas" class="col-sm-3 col-form-label text-secondary" style="font-size:20px;"><b>Nilai Tugas/Praktikum</b></label>
                <div class="col-sm-5">
                <input type="number" class="form-control" name="nilai_tugas" required>
                </div>
            </div>
            <br>

            <!------------>
            <div class="text-center">
                <input class="btn btn-secondary" type="submit" value="Simpan" name="proses"/>
            </div>
        </form>
    </div>

    <?php
    if ($_GET)
    {
        $nama = $_GET['nama'];
        $nim = $_GET['nim'];
        $mata_kuliah = $_GET['mata_kuliah'];
        $nilai_uts = $_GET['nilai_uts'];
        $nilai_uas = $_GET['nilai_uas'];
        $nilai_tugas = $_GET['nilai_tugas'];
        $total_nilai = $nilai_uts + $nilai_uas + $nilai_tugas;
        $alphabet = $total_nilai / 3;
        if ($alphabet >= 85){
            $grade = "A (Sangat Memuaskan)";
        }elseif ($alphabet >= 70)
        {   $grade = "B (Memuaskan)";
        }elseif ($alphabet >= 56)
        {   $grade = "C (Cukup)";
        }elseif ($alphabet >= 36)
        {   $grade = "D (Kurang)";
        }else{
            $grade = "E (Sangat Kurang)";
        }

        if ($alphabet > 55){
            $lulus = "Lulus";
        }else {
            $lulus = "Tidak Lulus";
        }
        
        $ns1 = ['id'=>1,'nim'=>'01101','uts'=>80,'uas'=>84,'tugas'=>78];
        $ns2 = ['id'=>2,'nim'=>'01121','uts'=>70,'uas'=>50,'tugas'=>68];
        $ns3 = ['id'=>3,'nim'=>'01130','uts'=>60,'uas'=>86,'tugas'=>70];
        $ns4 = ['id'=>4,'nim'=>'01134','uts'=>90,'uas'=>91,'tugas'=>82];
        $ns5 = ['id'=>5,'nim'=> $nim,'uts'=>$nilai_uts,'uas'=>$nilai_uas,'tugas'=>$nilai_tugas];
        
        $ar_nilai = [$ns1, $ns2 , $ns3, $ns4, $ns5];

    }
    ?>
    <div class="container mt-5 mb-5 p-5 shadow" style="background-color:#e2d5d5;">
        <div class="row p-1 ">
            <div class="col-4 mt-3">
                <div class="card ml-5" style="width: 20rem;">
                    <div class="card-header bg-secondary text-white" style="font-weight: bold; font-size: 20px;">Hasil</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama : <?= @$nama ?></li>
                        <li class="list-group-item">Nim : <?= @$nim ?></li>
                        <li class="list-group-item">Mata Kuliah: <?= @$mata_kuliah ?></li>
                        <li class="list-group-item">Nilai UTS : <?=@$nilai_uts ?></li>
                        <li class="list-group-item">Nilai UAS: <?=@$nilai_uas ?></li>
                        <li class="list-group-item">Nilai Tugas: <?=@$nilai_tugas ?></li>
                        <li class="list-group-item">Total Nilai: <?=@$total_nilai ?></li>
                        <li class="list-group-item">Grade: <?=@$grade ?></li>
                        <li class="list-group-item">Dinyatakan: <?=@$lulus ?></li>
                    </ul>    
                </div>        
            </div>
            <div class="col-4 mt-3">
                <div class="card ml-5" style="width: 17rem;">
                    <div class="card-header bg-secondary text-white" style="font-weight: bold; font-size: 20px;"">Range Nilai</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">A : 85 - 100</li>
                        <li class="list-group-item">B : 70 -84</li>
                        <li class="list-group-item">C: 56-69</li>
                        <li class="list-group-item">D : 36 - 55 </li>
                        <li class="list-group-item">E : Kurang dari 35 </li>
                    </ul>
                </div>
            </div> 
            <div class="col-4 mt-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header bg-secondary text-white" style="font-weight: bold; font-size: 20px;"">Predikat</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Sangat Memuaskan</li>
                            <li class="list-group-item">Memuaskan</li>
                            <li class="list-group-item">Cukup</li>
                            <li class="list-group-item">Kurang</li>
                            <li class="list-group-item">Sangat Kurang</li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>     
    </div>        

    <div class="container shadow p-5 mt-5" style="background-color:#e2d5d5;">
        <div class="bg-secondary p-2 mb-2">
            <h3 class="text-center text-white">Daftar Nilai</h3>
        </div>
        <form action="form_nilai.php" method="GET">
        <table border="1" width="100%" class="m-auto">
            <thead class="text-center">
            <tr>
                <th>No</th><th>NIM</th><th>UTS</th>
                <th>UAS</th><th>Tugas</th><th>Nilai Akhir</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <?php
            $nomor = 1;
            foreach($ar_nilai as $ns) {
                echo '<tr><td>'.$nomor.'</td>';
                echo '<td>'.$ns['nim'].'</td>';
                echo '<td>'.$ns['uts'].'</td>';
                echo '<td>'.$ns['uas'].'</td>';
                echo '<td>'.$ns['tugas'].'</td>';
                $nilai_akhir = ($ns['uts'] + $ns['uas']+$ns['tugas'])/3;
                echo '<td>'.number_format($nilai_akhir,2,',','.').'</td>';
                echo '<tr/>';
                $nomor++;
            }
            ?>
            </tbody>
        </table>
        </form>
        
    </div>     
</body>
</html>