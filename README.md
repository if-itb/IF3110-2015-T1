# StackExchange Website

Membuat Website tanya jawab seperti Stack Exchange.

	### Penjelasan Teknis

##### Validasi pada client-side.
Validasi dilakukan menggunakan Javascript dengan membuat function yang dipanggil pada html melalui onSubmit pada form. Tahap awal validasi dilakukan melalui pengecekan isi dari semua kotak input. Jika validasi lolos, dilakukan validasi email menggunakan regex.

##### AJAX pada Vote Feature 
Proses AJAX meliputi proses sejak tombol vote diklik sampai angka vote berubah. Ketika tombol vote diklik, akan dipanggil function vote yang ada pada Javascript dengan parameter id, vType, dan conType. Parameter id merupakan id dari pertanyaan/jawaban, vType merepresentasikan jenis vote up/down, dan conType merepresentasikan function dipanggil pertanyaan/jawaban. Di dalam function ini, AJAX akan memanggil file vote.php yang menerima parameter seperti function vote melalui GET. Di dalam file php, akan dibuka koneksi ke MySQL dan melakukan UPDATE sesuai dengan parameter yang diterima. Setelah UPDATE dilakukan, value dari vote yang baru akan diambil dan dikeluarkan (echo). Keluaran ditampilkan melalui getElementById.innerHTML.

### About

Assignment of IF 3110 2015
Making a StackOverflow-like Website

Author: Ghazwan Sihamudin Muhammad
Code: PHP(without framework), JS and CSS(without libralies)