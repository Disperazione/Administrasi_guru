<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lembar kerja 4 - {{ $target->mapel }}</title>
    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ribeye&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Martel:wght@300&display=swap" rel="stylesheet">

</head>

<style>
    .logo {
        width: 90px;
        height: 90px;
        margin-top: -30px;
        margin-left: -20px;
        float: left;

    }

    .font1 {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
    }

    .font2 {
        font-family: 'Ribeye', cursive;
    }

    .font3 {
        font-family: sans-serif
    }

    .font4 {
        font-family: 'Bowlby One SC', cursive;
    }

    .font5 {
        font-family: 'Noto Sans', sans-serif;
    }

    .font6 {
        font-family: 'Martel', serif;
    }

</style>

<body>
    <div>
        <div>
            <img class="logo" src="https://pbs.twimg.com/profile_images/753761871300218880/OC5yL5QZ.jpg" alt="">
        </div>
        <div style="margin-left: 20px">
            <i class="" style="margin-top: -10px;margin-left:20px;font-size:14px;">Dokumen Administrasi Guru</i>
            <p class="" style="margin-top: -2px;">SMK TARUNA BHAKTI DEPOK</p>
        </div>

        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight:bold;">LK.04. MATERI BAHAN AJAR</p>
        </div>
        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Bagian 1: Materi Bahan Ajar Mata Pelajaran</p>
            <p class="font5" style="font-size: 14px">Pada bagian ini, guru pengampu mata pelajaran rincian berkaitan
                materi bahan ajar yang akan diterapkan disetiap kompetensi dasar serta
                memberikan deskripsi dari setiap bahan ajar yang digunakan.</p>
        </div>

        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">a. Data mata Pelajaran</p>
        </div>
        <div style="margin-left: 30px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="padding:10px;">Bidang Studi Keahlian</th>
                        <th style="padding:10px;">:</th>
                        <th style="padding:10px;">Teknologi Informasi dan Komunikasi</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    <tr>
                        <td>Kompetensi Keahlian</td>
                        <td>:</td>
                        <td>{{ $jurusan }}</td>
                    </tr>
                    <tr>
                        <td>Mata pelajaran</td>
                        <td> :</td>
                        <td>{{ $target->mapel .' '.$target->kelas }}</td>
                    </tr>
                    <tr>
                        <td>Jam Pelajaran</td>
                        <td> :</td>
                        <td style="">{{ $target->total_waktu_jam_pelajaran .'{'.$target->jam_pelajaran.'}' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-left: -10px; margin-top:50px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">b. Indikator Ketercapaian Mata Pelajaran</p>
        </div>
        {{-- <div style="margin-left: 15px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Semester Ganjil</p>
        </div> --}}

        <div style="margin-left: 20px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;">
                <thead>
                    {{-- <tr style="background-color: rgb(182, 208, 211);">
                        <th colspan="7">Semester Ganjil</th>
                    </tr> --}}
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;" rowspan="2">No.</th>
                        <th style="padding:10px;" rowspan="2" colspan="2">Kompetensi Dasar</th>
                        <th style="padding:10px; " colspan="2">Jenis bahan ajar</th>
                        <th style="padding:10px;" rowspan="2">Deskripsi bahan ajar</th>
                        <th style="padding:10px;" rowspan="2">Keterangan</th>
                    </tr>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;">Modul</th>
                        <th style="padding:10px;">Video Pembelajaran</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;font-size:10px;">
                    @foreach ($m_bahan_ajar as $materi)
                    <tr>
                        <td rowspan="2">{{ $loop->iteration }}</td>
                        <td>{{ $materi->kd_pengetahuan }}</td>
                        <td>{{ $materi->keterangan_pengetahuan }}</td>
                        <td rowspan="2">{{ $materi->materi_bahan_ajar->modul }}</td>
                        <td rowspan="2">{{ $materi->materi_bahan_ajar->vidio_pembelajaran }}</td>
                        <td rowspan="2">{{ $materi->materi_bahan_ajar->deskripsi_bahan_ajar }}</td>
                        <td rowspan="2">{{  $materi->materi_bahan_ajar->keterangan  }}</td>
                    </tr>
                    <tr>
                        <td>{{ $materi->kd_ketrampilan }}</td>
                        <td>{{ $materi->keterangan_ketrampilan }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


        {{-- <div style="margin-left: 15px; margin-top:50px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Semester Genap</p>
        </div>

        <div style="margin-left: 20px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr style="background-color: rgb(182, 208, 211);">
                        <th colspan="6">Semester Genap</th>
                    </tr>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;" rowspan="2">No.</th>
                        <th style="padding:10px; " rowspan="2">Kompetensi Dasar</th>
                        <th style="padding:10px; " colspan="2">Jenis bahan ajar</th>
                        <th style="padding:10px;" rowspan="2">Deskripsi bahan ajar</th>
                        <th style="padding:10px;" rowspan="2">Keterangan</th>
                    </tr>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;">Modul</th>
                        <th style="padding:10px;">Video Pembelajaran</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;font-size:10px;">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div> --}}
        <br><br><br><br><br><br><br><br><br><br>

        <div>
            <img class="logo" src="https://pbs.twimg.com/profile_images/753761871300218880/OC5yL5QZ.jpg" alt="">
        </div>
        <div style="margin-left: 20px">
            <i class="" style="margin-top: -10px;margin-left:20px;font-size:14px;">Dokumen Administrasi Guru</i>
            <p class="" style="margin-top: -2px;">SMK TARUNA BHAKTI DEPOK</p>
        </div>

        <div style="margin-left: 10px;margin-top:20px;">
            <table class="font5" border="1"
                style="border-collapse:collapse;font-weight:light;font-size:14px;width:700px;">
                <tbody>
                    <tr>
                        <td style="padding:5px;">Disahkan Oleh: <br> Kepala SMK Taruna Bhakti <br><br><br><br>
                            <u>Ramadin Tarigan, ST</u></td>

                        <td style="">Diperiksa Oleh: <br>Waka Kurikulum <br><br><br><br><br>
                            <u>Verra Rousmawati,M.Sc</u></td>

                        <td style="padding:5px;">Dibuat oleh: <br> Guru Mata Pelajaran <br><br><br><br><br>
                            <u>{{ $target->guru->name }}</u></td>

                        <td style="padding:5px;">Tanggal: <br>........................ <br><br><br><br><br><br></td>
                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</body>

</html>
