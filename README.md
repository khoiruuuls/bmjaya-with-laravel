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
