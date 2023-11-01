require jetstream :

-   composer require laravel/jetstream
-   php artisan jetstream:install livewire

udah jadi

-   login pake employee_id
-   register hanya oleh admin
-   admin bisa liat semua order
-   sales bisa liat order hanya yang sesuai id
-   crud order gramature, coresta, ukuran dan date order

to do list

sales side :

-   register buat employee id 8 int random
-   setelah order pilih jadwal
-   crud belum sesuai ketentuan
    gramature int (12-40)
    coresta int 15- 85
    ukuran 10 angka depan koma, 2 angka belakang koma

note :

-   kapasitas perminggu 800 kg, kalo lebih sisanya akan otomatis ke minggu selanjutnya
-   misal

gramature 12 - 25 dan coresta 15 - 30 cuman bisa di minggu ke 1 jadi dia gak bisa klik minggu yang lain

    logika dasar

    alokasi perminggu = 800 ton (semua hitugan dalam ton)

    user masukin quantity dan milih minggu
    cek dengan tanggal sekarang, valid lanjut

    order untuk minggu ke 1, September

    tanggal 6, adi mesen  600
    tanggal 7, budi mesen 300
    --------------------- 800 ----- lebih dari alokasi perminggu

    order untuk minggu ke 2, September
    tanggal 8, budi mesen  100
    tanggal 10, caca mesen 400
    tanggal 14, deni mesen 300
    ---------------------- 800 ---- memenuhi alokasi perminggu

    order untuk minggu ke 3, September
    tanggal 20, budi mesen 500
    ---------------------- 500 ---- tidak melebihi alokasi perminggu

    order untuk minggu ke 4, September
    note : setiap akhir bulan kita gak tau sampe tanggal berapa, karena ada bulan yang sampai tanggal 28, 29, 30, atau 31

    tanggal 1 - 7 => minggu ke 1
    tanggal 8 - 14 => minggu ke 2
    tanggal 15 - 21 => minggu ke 3
    tanggal 22 - 28, 29, 30, 31 => minggu ke 4
