<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lembar kerja 1 - {{ $target->mapel->nama_mapel }}</title>
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
            <p class="font5" style="font-weight:bold;">LK.01 TARGET PEMBELAJARAN MATA PELAJARAN</p>
        </div>
        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Bagian 1: Data Tenaga Pendidik</p>
            <p class="font5" style="font-size: 14px">Pada bagian ini, cantumkan data pribadi tenaga pendidik serta
                mencantumkan matapelajaran
                yang di ampu.</p>
        </div>
        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">a. Data Tenaga Pendidik</p>
        </div>
        <div style="margin-left: 25px;font-size:14px;">
            <p class="font5" style="">
                Nama Tenaga Pendidik<span style="margin-left: 63px;">
                    :&nbsp;
                    {{ $target->guru->name }}
                </span>
            </p>
            <p class="font5" style="">
                Mata Pelajaran<span style="margin-left: 117px;">
                    :&nbsp;
                    {{ $target->mapel->nama_mapel }}
                </span>
            </p>
            <p class="font5" style="">
                Alamat<span style="margin-left: 170px;">
                    :&nbsp;
                    {{ $target->guru->alamat }}
                </span>
            </p>
            <p class="font5" style="">
                No.Telp/Fax/E-mail<span style="margin-left: 91px;">
                    :&nbsp; Telp:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>__________</u>&nbsp;&nbsp;&nbsp;
                    Fax:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>__________</u> <br>
                    <div style="margin-left: 240px">
                        HP:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u> @{{ $target->guru->no_telp }}</u></div>

                </span>
            </p>
        </div>


        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Bagian 2: Data Mata Pelajaran</p>
        </div>
        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">a. Data mata Pelajaran</p>
        </div>
        <div style="margin-left: 80px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th style="padding:10px;">Bidang Study Keahlian</th>
                        <th style="padding:10px;">:</th>
                        <th style="padding:10px;">Teknologi Informasi dan Komunikasi</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    <tr>
                        <td>Kompetensi Keahlian</td>
                        <td>:</td>
                        <td>{{ $target->kompetensi_keahlian }}</td>
                    </tr>
                    <tr>
                        <td>Mata pelajaran</td>
                        <td> :</td>
                        <td>{{ $target->mapel->nama_mapel .' '.$target->kelas }}</td>
                    </tr>
                    <tr>
                        <td>Jam Pelajaran</td>
                        <td> :</td>
                        <td>{{ $target->total_waktu_jam_pelajaran .'{'.$target->jam_pelajaran.'}' }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div style="margin-left: 10px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Daftar Kompetensi Inti</p>
        </div>
        <div style="margin-left: 30px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;width:10ch" >
                <thead>
                    <tr style="background-color: rgb(182, 208, 211);">
                        <th style="padding:5px;">KI.</th>
                        <th style="">Kompetensi Inti</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">

                @foreach ($target->target_pembelajaran->kompetensi_inti as  $item)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <p style="font-size: 10px">
                                {{ $item->konpetensi }}
                            </p>
                        </td>
                    </tr>
                @endforeach

                    {{-- <tr>
                        <td>2</td>
                        <td>
                            <p style="font-size: 10px">
                                Mengolah, menalar, dan menyaji dalam ranah konkret dan ranah abstrak terkait dengan
                                pengembangan dari yang
                                dipelajarinya di sekolah secara mandiri, bertindak secara efektif dan kreatif, serta
                                mampu menggunakan metoda sesuai
                                kaidah keilmuan
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <p style="font-size: 10px">
                                Memahami, menerapkan, dan menganalisis pengetahuan faktual, konseptual, prosedural, dan
                                metakognitif berdasarkan rasa
                                ingin tahunya tentang ilmu pengetahuan, teknologi, seni, budaya, dan humaniora dengan
                                wawasan kemanusiaan,
                                kebangsaan, kenegaraan, dan peradaban terkait penyebab fenomena dan kejadian, serta
                                menerapkan pengetahuan
                                prosedural pada bidang kajian yang spesifik sesuai dengan bakat dan minatnya untuk
                                memecahkan masalah
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            <p style="font-size: 10px">
                                Melaksanakan tugas spesifik, dengan menggunakan alat, informasi, dan prosedur kerja yang
                                lazim dilakukan serta
                                kinerja mandiri dengan mutu dan kuantitas yang terukur sesuai dengan standar kompetensi
                                kerja.Menunjukkan keterampilan
                                menalar, mengolah, dan menyaji secara efektif, kreatif, produktif, kritis, mandiri,
                                kolaboratif, komunikatif, dan solutif dalam
                                ranah abstrak terkait dengan pengembangan dari yang dipelajarinya di sekolah, serta
                                mampu melaksanakan tugas spesifik
                                dibawah pengawasan langsung.Menunjukkan keterampilan mempersepsi, kesiapan, meniru,
                                membiasakan gerak mahir,
                                menjadikan gerak alami, sampai dengan tindakan orisinal dalam ranah konkret terkait
                                dengan pengembangan dari yang
                                dipelajarinya di sekolah, serta mampu melaksanakan tugas spesifik dibawah pengawasan
                                langsung.
                                menyelesaikan masalah sederhana sesuai dengan bidang dan lingkup kerja Teknik Komputer
                                dan Informatika. Menampilkan
                            </p>
                        </td> --}}
                    </tr>

                </tbody>
            </table>
        </div>




        <div style="margin-left: -10px; margin-top:50px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Daftar Kompetensi Ganjil</p>
        </div>

        <div style="margin-left: -20px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr style="background-color: rgb(182, 208, 211);">
                        <th colspan="10">Semester Ganjil</th>
                    </tr>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                          <th style="padding:10px;">no</th>
                        <th style="padding:10px;">KD</th>
                        <th style="padding:10px;">Kompetensi Dasar (Pengetahuan)</th>
                        <th style="padding:10px;">KD</th>
                        <th style="padding:10px;">Kompetensi Dasar (Keahlian)</th>
                        <th style="padding:10px;">Materi Inti</th>
                        <th style="padding:10px;">Durasi</th>
                        <th style="padding:10px;">Pertemuan</th>
                        <th style="padding:10px;">Semester</th>
                        <th style="padding:10px;">Jumlah Jam</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;font-size:10px;">
                    @foreach ($target->kompetensi_dasar()->where('semester','genap')->get() as $key => $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kd_pengetahuan }}</td>
                        <td>{{ $item->keterangan_pengetahuan }}</td>
                        <td>{{ $item->kd_ketrampilan }}</td>
                        <td>{{ $item->keterangan_ketrampilan }}</td>
                        <td>{{ $item->materi_inti }}</td>
                        <td>{{ $item->durasi }}</td>
                        <td>{{ $item->pertemuan }}</td>
                        <td>{{ $item->semester_kd }}</td>
                        @if ($key == 0)
                            <td rowspan="{{ count($s_ganjil) }}">{{ explode(' ',$target->jam_pelajaran)[0] }}</td>
                        @endif
                    </tr>
                    @endforeach


                    {{-- <tr>
                        <td>1</td>
                        <td>dsfs</td>
                        <td>sdfs</td>
                        <td>sdfsd</td>
                        <td>fsdfs</td>
                        <td>sdfsd</td>
                        <td>sdfs</td>
                        <td>sdfs</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>dsfs</td>
                        <td>sdfs</td>
                        <td>sdfsd</td>
                        <td>fsdfs</td>
                        <td>sdfsd</td>
                        <td>sdfs</td>
                        <td>sdfs</td>

                    </tr> --}}

                </tbody>
            </table>
        </div>


        <div style="margin-left: -10px; margin-top:50px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Daftar Kompetensi Genap</p>
        </div>

        <div style="margin-left: -20px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr style="background-color: rgb(182, 208, 211);">
                        <th colspan="10">Semester Genap</th>
                    </tr>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;">no</th>
                        <th style="padding:10px;">KD</th>
                        <th style="padding:10px;">Kompetensi Dasar (Pengetahuan)</th>
                        <th style="padding:10px;">KD</th>
                        <th style="padding:10px;">Kompetensi Dasar (Keahlian)</th>
                        <th style="padding:10px;">Materi Inti</th>
                        <th style="padding:10px;">Durasi</th>
                        <th style="padding:10px;">Pertemuan</th>
                        <th style="padding:10px;">Semester</th>
                        <th style="padding:10px;">Jumlah Jam</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;font-size:10px;">
                    @foreach ($target->kompetensi_dasar()->where('semester','genap')->get() as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kd_pengetahuan }}</td>
                        <td>{{ $item->keterangan_pengetahuan }}</td>
                        <td>{{ $item->kd_ketrampilan }}</td>
                        <td>{{ $item->keterangan_ketrampilan }}</td>
                        <td>{{ $item->materi_inti }}</td>
                        <td>{{ $item->durasi }}</td>
                        <td>{{ $item->pertemuan }}</td>
                        <td>{{ $item->semester_kd }}</td>
                        @if ($key == 0)
                            <td rowspan="{{ count($s_genap) }}">{{  explode(' ',$target->jam_pelajaran)[0] }}</td>
                        @endif
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td>1</td>
                        <td>dsfs</td>
                        <td>sdfs</td>
                        <td>sdfsd</td>
                        <td>fsdfs</td>
                        <td>sdfsd</td>
                        <td>sdfs</td>
                        <td>sdfs</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>dsfs</td>
                        <td>sdfs</td>
                        <td>sdfsd</td>
                        <td>fsdfs</td>
                        <td>sdfsd</td>
                        <td>sdfs</td>
                        <td>sdfs</td>

                    </tr> --}}

                </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br>

        <div>
            <img class="logo" src="https://pbs.twimg.com/profile_images/753761871300218880/OC5yL5QZ.jpg" alt="">
        </div>
        <div style="margin-left: 20px">
            <i class="" style="margin-top: -10px;margin-left:20px;font-size:14px;">Dokumen Administrasi Guru</i>
            <p class="" style="margin-top: -2px;">SMK TARUNA BHAKTI DEPOK</p>
        </div>


        <div style="margin-left: -10px; margin-top:50px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">Bagian 3: Target Pembelajaran</p>
            <p class="font5" style="font-weight: bold;font-size:14px;">a. Target Pencapaian Mata Pelajaran</p>
        </div>

        <div style="margin-left: 10px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;width:700px;">
                <thead>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;">No</th>
                        <th style="padding:10px;">Target Mata Pelajaran</th>
                        <th style="padding:10px;">Ket</th>
                    </tr>
                </thead>
                <tbody style="font-size:14px;">
                    @foreach ($target->target_pembelajaran->target_pencapaian_mapel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->target }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td>1</td>
                        <td>Siswa dapat membuat User Interface studi kasus Soal UKK RPL</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Siswa dapat membuat aplikasi yang memutar file audio, maupun video dalam aplikasi web </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Siswa dapat membuat aplikasi berbasis web dengan framework MVC studi kasus soal UKK/Sistem
                            informasi sekolah</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Siswa dapat membuat aplikasi dengan reporting dengan format tabular dengan parameter inputan
                            seperti daily, montly ,by date
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Siswa dapat membuat Report tabel format excel</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Siswa dapat membuat Report tabel dalam format pdf</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Siswa dapat membuat solusi aplikasi dalam Studi kasus Soal penilaian UKK berbasis Web</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Siswa dapat membuat laporan/dokumentasi karya aplikasi dalam bentuk manual book/dokumentasi
                            software</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr> --}}


                </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


        <div>
            <img class="logo" src="https://pbs.twimg.com/profile_images/753761871300218880/OC5yL5QZ.jpg" alt="">
        </div>
        <div style="margin-left: 20px">
            <i class="" style="margin-top: -10px;margin-left:20px;font-size:14px;">Dokumen Administrasi Guru</i>
            <p class="" style="margin-top: -2px;">SMK TARUNA BHAKTI DEPOK</p>
        </div>


        <div style="margin-left: -10px; margin-top:50px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">b. Target Pencapaian KKID</p>
        </div>

        <div style="margin-left: 10px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;width:700px;">
                <thead>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;">No</th>
                        <th style="padding:10px;">Target Pencapaian KKID</th>
                        <th style="padding:10px;">Ket</th>
                    </tr>
                </thead>
                <tbody style="font-size:14px;">
                    @foreach ($target->target_pembelajaran->target_pencapaian_kkd as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->target }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                    @endforeach
                 {{--
                    <tr>
                        <td>2</td>
                        <td>Siswa dapat membuat aplikasi berbasis oop dan mvc yang dapat mengelola / view audio dan
                            video </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Siswa dapat membuat aplikasi sistem informasi studi kasus soal UKK RPL/sistem informasi
                            sekolah dengan framework MVC.</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>........................................................</td>
                        <td></td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <div>
            <img class="logo" src="https://pbs.twimg.com/profile_images/753761871300218880/OC5yL5QZ.jpg" alt="">
        </div>
        <div style="margin-left: 20px">
            <i class="" style="margin-top: -10px;margin-left:20px;font-size:14px;">Dokumen Administrasi Guru</i>
            <p class="" style="margin-top: -2px;">SMK TARUNA BHAKTI DEPOK</p>
        </div>


        <div style="margin-left: -10px; margin-top:50px;">
            <p class="font5" style="font-weight: bold;font-size:14px;">b. Target Pencapaian KKID</p>
        </div>

        <div style="margin-left: 10px;margin-top:20px;">
            <table class="font5" border="1" style="border-collapse:collapse;width:700px;">
                <thead>
                    <tr style="background-color: rgb(182, 208, 211);font-size:12px;">
                        <th style="padding:10px;">No</th>
                        <th style="padding:10px;">Rincian Bukti</th>
                    </tr>
                </thead>
                <tbody style="font-size:14px;">
                    @foreach ($target->target_pembelajaran->rincian_bukti as $item)
                     <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->rincian_bukti }}</td>
                    </tr>
                    @endforeach

                    {{-- <tr>
                        <td>2</td>
                        <td>Dokumentasi karya/laporan pembuatan karya/aplikasi</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Penilaian KD terpenuhi minimum sesuai KKM (rekap Nilai KD)</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>........................................................</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>........................................................</td>
                    </tr> --}}


                </tbody>
            </table>
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
