
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/Disperazione/Administrasi_guru.git

Switch to the repo folder

    cd Administrasi_guru

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Disperazione/Administrasi_guru.git
    cd Administrasi_guru
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
    
## role & account
** Account login info in this table**


| #  |  **role**           | **username**      | **password** |
| :- |:--------------- |:------------- | :------- |
| 1  | admin           | Admin         | password |
| 2  | kepala sekolah   | KepalaSekolah | password |
| 3  | litbang         | Litbang       | password |
| 4  | tata usaha / tu | BidangTU      | password |
| 5  | kepala program / Kaprog        | BidangKaprog  | password |
| 6  | bkk             | BidangBkk     | password |
| 7  | hubin           | Hubin   | password |
| 8  | kurikulum       | Kurikulum     | password |
| 9  | Sarpras       | Sarpras     | password |
| 10  | kesiswaan       | Kesiswaan     | password |
| 11 | Guru             | guru          | password |
| 11  | siswa       | Siswa 1 - 5     | password |

## credit
- [Stisla Template](https://getstisla.com/)
- [framework laravel](https://laravel.com/)
- [bootstrap](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- [SweetAlert](https://sweetalert2.github.io/)


