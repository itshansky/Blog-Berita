-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 11:40 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbberita_1034`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `id_user`, `judul`, `isi_berita`, `gambar`, `tgl_posting`) VALUES
(1, 4, 1, 'Pengiriman Smartphone Google Pixel Tembus 7,2 Juta Unit', 'Meskipun belum cukup populer secara global, namun smartphone Google Pixel cukup patut diperhitungkan. Laporan terbaru dari firma riset IDC menyebut Google  mengirimkan 7,2 juta unit ponsel Pixel sepanjang tahun 2019. Volume pengiriman secara global ini disebut menjadi yang tertinggi untuk smartphone Pixel. Secara year-over-year (YoY), pengiriman Google Pixel di 2019 meningkat 52 persen. IDC mengklaim pengiriman ini bahkan melampaui pengiriman smartphone dari salah satu vendor asal China, OnePlus. Namun, tidak disebutkan berapa selisih pengiriman unit antara Google dan OnePlus.', 'Google-Pixel.jpg', '2020-06-19 14:19:05'),
(2, 3, 1, 'Laptop 5G Pertama di Dunia Hadir di AS', 'Lenovo Yoga 5G diluncurkan selama CES 2020. Lenovo mengklaim itu sebagai PC 5G pertama di dunia. Perangkat tersebut telah hadir di Amerika Serikat (AS) sebagai eksklusif Verizon. Lenovo Yoga 5G akan dipasarkan sebagai Lenovo Flex 5G di negeri Paman Sam. Tampaknya Lenovo Flex 5G ditargetkan untuk para profesional. Seperti yang dilansir dari Phone Arena, Rabu (17/6), konversi 2-in-1 juga merupakan komputer pertama di dunia yang memiliki chip Qualcomm Sapdragon 8cx 5G. Ini memiliki modem X55 5G dan slot kartu SIM nano.', 'Laptop-Lenovo-5G.jpg', '2020-06-17 05:17:36'),
(3, 1, 1, 'Google Cloud Luncurkan Pusat Data di Indonesia 24 Juni', 'Menkominfo Johnny G. Plate menyatakan Google Cloud akan meluncurkan pusat data di Indonesia pada 24 Juni. Hal itu dibahas bersama dengan Managing Director Google Cloud Kawasan Asia Pasifik Rick Harshman dan Head of Government Affairs Google Cloud Kawasan Asia Pasifik Barbara Navarro melalui virtual meeting (pertemuan virtual). Menurut Johnny, pembahasan pada pertemuan virtual itu memang secara khusus difokuskan pada pembangunan pusat data Google Cloud.', 'Google-Cloud.jpg', '2020-06-19 14:19:21'),
(4, 1, 1, '\"Google Meet\" Layanan Video Conference dari Google', 'Google telah mengumumkan platform Google Meet dimasukkan ke akan dalam aplikasi Gmail untuk perangkat Android dan iOS. Dengan ini tampaknya Google bermaksud untuk memenangkan perang konferensi video dengan platform lain. Masuk ke ponsel cerdas akhir-akhir ini terasa sulit untuk aplikasi baru, meskipun aplikasi itu dibuat oleh Google. Seperti yang dilansir dari Android Police, Rabu (17/6), satu-satunya hal terbesar yang dapat dilakukan Google untuk meningkatkan kesadaran akan Meet adalah mendaftarkan Meet ke Gmail. Selain itu ada beberapa alasan lainnya.', 'Google-Meet.jpg', '2020-06-17 05:44:50'),
(5, 2, 1, 'Resmi Diumumkan Sony, Ini Dia Penampakan PlayStation 5', 'Setelah serangkaian bocoran beredar di dunia maya, Sony akhirnya secara resmi memperkenalkan PlayStation 5 ( PS5) kepada publik. Suksesor PS4 tersebut dipamerkan dalam sebuah acara peluncuran yang digelar secara online, Jumat (12/6/2020) dinihari. Tak seperti pendahulunya yang mengusung cangkang berwarna hitam pekat, PS5 kini tampil dengan balutan warna putih dan hitam, serta bisa didirikan secara vertikal maupun horizontal. Wujud controller nirkabel DualSense milik PS5 juga mengadopsi bahasa desain yang sama. Tampil dengan kombinasi warna putih dan hitam yang membuat terlihat futuristik.', 'PlayStation-5.jpg', '2020-06-19 14:19:36'),
(6, 2, 2, 'Tips Beli Drone', 'Tips beli drone terbaru yang sesuai dengan kebutuhan ini penting supaya Anda bisa mengoptimalkan fungsi dari berbagai fitur canggih yang terdapat pada produk berteknologi tinggi tersebut. Sayang bukan jika Anda keliru memilih drone dan kurang memaksimalkan fungsinya hanya karena Anda tidak tahu. Cara memilih drone terbaik setidaknya mengacu pada beberapa hal mendasar dari drone itu sendiri sekaligus aspek fungsi dan manfaatnya untuk Anda. Apakah Anda membutuhkan drone yang jam terbangnya tinggi atau baterainya awet, drone yang lebih tahan angin dan goncangan, drone dengan kamera paling canggih, drone yang bisa disetting mengikuti perintah atau membuntuti suatu objek, atau drone yang murah?', 'Drone.jpg', '2020-06-19 16:42:01'),
(7, 4, 2, 'OnePlus Masuk Lima Besar \"Vendor\" Smartphone di AS', 'Pada kuartal terakhir 2018, OnePlus berhasil masuk ke jejeran lima besar (Top 5) vendor smartphone terkuat di Amerika Serikat, khususnya untuk produk dengan rentang harga di atas 500 dollar AS (Rp 7 jutaan). Menurut data firma riset pasar IDC, OnePlus berada di posisi kelima, di belakang LG, Google, Samsung, dan Apple. Pencapaian ini tak lepas dari upaya OnePlus dalam merilis smartphone berkualitas. Lini produk OnePlus 6 dan OnePlus 6T diganjar pujian bertubi-tubi dari media massa dan reviewer kawakan. OnePlus 6T bahkan dinobatkan sebagai produk rasa flagship tanpa bikin kantong bolong atau istilahnya flagship killer.', 'OnePlus.jpg', '2020-06-19 16:42:02'),
(8, 5, 2, 'Mulai 1 Juli, Beli Game Online akan Dikenai PPN 10%', 'Mulai tanggal 1 Juli 2020, pemerintah melalui Direktorat Jenderal (Ditjen) Pajak Kementerian Keuangan (Kemenkeu) siap menarik pajak pertambahan nilai (PPN) sebesar 10 persen dari nilai transaksi barang atau jasa digital yang termasuk dalam Perdagangan Melalui Sistem Elektronik (PMSE). Ketentuan ini berlaku bagi produk digital seperti langganan streaming musik, streaming film, aplikasi dan games digital, serta jasa online dari luar negeri. Salah satu dampak dari aturan ini adalah adanya PPN sebesar 10 persen yang harus dibayarkan oleh konsumen yang biasa membeli game digital atau online melalui platform Steam.', 'Steam.jpg', '2020-06-19 16:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'Internet', 'Berita seputar internet (dunia maya)'),
(2, 'Gadget', 'Berita seputar gadget'),
(3, 'Komputer/Laptop', 'Berita seputar komputer (PC) dan laptop'),
(4, 'Mobile', 'Berita seputar perangkat mobile'),
(5, 'Game', 'Berita seputar game');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_berita`, `nama`, `email`, `isi_komentar`, `tgl_komentar`) VALUES
(1, 5, 'Farhan', 'farhan@email', 'Ga sabar mau beli PS 5 :)', '2020-06-18 10:48:54'),
(2, 5, 'Putri', 'putri@email.com', 'Wah patut ditunggu juga ãƒ½(â€¢â€¿â€¢)ãƒŽ', '2020-06-18 11:08:22'),
(3, 5, 'Nauval', 'nauval@email.com', 'Ayo ngegame makai PS 5 ï¼¼ï¼ˆï¼´âˆ‡ï¼´ï¼‰ï¼', '2020-06-18 11:11:31'),
(4, 5, 'Huddatul', 'huddatul@email.com', 'Wajib bagi console gamers! â—ï¹â—', '2020-06-18 11:21:20'),
(5, 4, 'Ikhsan', 'ikhsan@gmail.com', 'Layanan Google mantul', '2020-06-18 11:22:47'),
(6, 4, 'Afrizal', 'afrizal@email.com', 'Mantab', '2020-06-18 11:26:31'),
(7, 3, 'Salman', 'salman@gmail.com', 'Kabar baik nih', '2020-06-18 11:34:10'),
(8, 3, 'Ifdal', 'ifdal@email.com', 'Bagus sekali!', '2020-06-18 11:34:47'),
(9, 2, 'Amelia', 'amelia@email.com', 'Laptop 5G', '2020-06-18 11:39:39'),
(10, 2, 'Puput', 'puput@email.com', 'Udah ketinggalan jaman laptop kentang ku', '2020-06-18 11:40:45'),
(11, 8, 'Farhan', 'farhan@email.com', 'Makin mahal beli game', '2020-06-19 16:49:01'),
(12, 8, 'Huddatul', 'huddatul@email.com', 'Mau bagaimana lagi', '2020-06-19 16:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'farhan', 'd1bbb2af69fd350b6d6bd88655757b47', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar` (`id_berita`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
