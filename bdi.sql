-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 09:39 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(100) NOT NULL,
  `id_jenis_artikel` int(100) DEFAULT NULL,
  `tanggal_artikel` date DEFAULT NULL,
  `judul` text,
  `isi` text,
  `penulis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `id_jenis_artikel`, `tanggal_artikel`, `judul`, `isi`, `penulis`) VALUES
(1, 2, '2019-03-28', 'keutamaan 2', '<p>Saudaraku, Inilah Keutamaan Puasa Ramadhan Pada pembahasan kali ini, kita akan mengkaji bersama mengenai keutamaan Ramadhan dan puasa di dalamnya. Semoga Allah selalu memberikan kita ilmu yang bermanfaat dan amal yang saleh. Keutamaan Bulan Ramadhan Ramadhan adalah Bulan Diturunkannya Al-Qur&rsquo;an Bulan Ramadhan adalah bulan yang mulia. Bulan ini dipilih sebagai bulan untuk berpuasa dan pada bulan ini pula Al-Qur&rsquo;an diturunkan. Sebagaimana Allah ta&rsquo;ala berfirman, :</p>\r\n\r\n<p>&ldquo;(Beberapa hari yang ditentukan itu ialah) bulan Ramadhan, bulan yang di dalamnya diturunkan (permulaan) Al Quran sebagai petunjuk bagi manusia dan penjelasan-penjelasan mengenai petunjuk itu dan pembeda (antara yang hak dan yang bathil). Karena itu, barangsiapa di antara kamu hadir (di negeri tempat tinggalnya) di bulan itu, maka hendaklah ia berpuasa pada bulan itu.&rdquo; (QS. Al Baqarah [2] : 185)</p>\r\n', 'admin'),
(2, 2, '2019-03-27', 'Muhasabah 2', 'Tanpa terasa saudara-saudaraku, kita terus dimakan oleh waktu, bukan tambah usia tapi semakin tua dan semakin mendekati titik akhir. Siapkah kita untuk menghadapinya.\r\n\r\nKurang beberapa hari lagi kita akan masuk bulan suci romadhon, bulan seribu berkah, bulan yang agung, karena Alloh dan rosululloh yang mengabarkan kepada kita. Kita yakin kabar dari Rosululloh tidak pernah salah, Nabi Muhammad adalah orang yang jujur dengan gelar al aamiin. Baik teman sahabat bahkan musuh-musuhnya pun tetap mengakui bahwa Nabi Muhammad adala manusia yang jujur.\r\n\r\nBeliau mengabarkan bahwa BARANG SIAPA HATINYA GEMBIRA DENGAN DATANGNYA BULAN SUCI ROMADHON, MAKA NABI MENGGARANSI TERHADAP ORANG TERSEBUT AKAN TERBEBAS ADARI NERAKA. Mari bersuka cita, mari bergembira dengan datang bulan romdhon tahun 1434 H ini, sembari kita muhasabah diri, sambil kita introspeksi diri, apakah senangnya kita senang yang EMAS atau senang yang LOYANG.\r\n\r\nBila kita senang dan diikuti oleh pelaksanaan semua rangkaian kegiatan romadhon dengan tuntas berarti kita memang EMAS, tetapi sebaliknya bila kita senangnya hanya diawal bulan saja atau di akhir bulan saja dengan tidak diikuti oleh action amal sholih sholihah selama romadhon beararti kita memang berkualitas LOYANG.\r\n\r\nPara hamba Alloh,\r\n\r\nKita sering berbuat dosa, lidah bilang tobat tetapi dosa tak kunjung tamat. Kita sering membentak ibu, kita sering membentak ayah, kita sering iri kepada teman, kita sering tidak hormat kepada guru, sering lupa mengambil barang orang lain, sering berdosa dan sering-sering yang lain. Sudahkah kita menyadari dan mentaubatinya ?\r\n\r\nPara hamba Allah,\r\n\r\nSeandainya ditampakkan sorga yang dalam al qur an digambarkan dibawahnya mengalir sungai-sungai, bantal yang bersusun-susun, tempat tidur yang bertatakan emas dan permata, anak-anak muda yang selalu belia, bidadari-bidadari yang bermata jeli laksana mutiara yang tersimpang rapi, didalamnya tidak terdapat perkataan yang sia-sia kasur-kasur yang tebal dan empuk, pohon pisang yang bersusun-susun, pohon bidara yang tidak berduri, naungan yang terbentang luas, air yang tercurah, serta buah-buahan yang banyak. Niscaya kita-kita akan selalu sujud kepada Allah SWT.\r\n\r\nSaudara-saudaraku,\r\n\r\nSeandainya engkau tahu panasnya neraka yang rosululloh katakan setitik api yang ditempatkan dibawah telapak kaki manusia, sudah cukup untuk mendidihkan otaknya. Dan seandainya engkau tahu pula bahwa bahan bakar neraka yang Allah firmankan berasal dari batu dan manusia yang panasnya tiada terbandingkan dijagad raya ini, niscaya kita tidak akan pernah dapat tersenyum, mata kita akan tertutup oleh airmata yang menghiba kepada kemurhan Alloh SWT.\r\n\r\nMari kita isi romadhon dengan amal sholeh yang nyata.\r\n\r\nBila ada sumur diladang bolehlah kita menumpang mandi,\r\n\r\nBila ada perawan yang rambutnya panjang, silahkan sering diajak ngaji.', 'admin'),
(3, 1, '2019-03-28', 'Muhasabah 3', 'Tanpa terasa saudara-saudaraku, kita terus dimakan oleh waktu, bukan tambah usia tapi semakin tua dan semakin mendekati titik akhir. Siapkah kita untuk menghadapinya.\r\n\r\nKurang beberapa hari lagi kita akan masuk bulan suci romadhon, bulan seribu berkah, bulan yang agung, karena Alloh dan rosululloh yang mengabarkan kepada kita. Kita yakin kabar dari Rosululloh tidak pernah salah, Nabi Muhammad adalah orang yang jujur dengan gelar al aamiin. Baik teman sahabat bahkan musuh-musuhnya pun tetap mengakui bahwa Nabi Muhammad adala manusia yang jujur.\r\n\r\nBeliau mengabarkan bahwa BARANG SIAPA HATINYA GEMBIRA DENGAN DATANGNYA BULAN SUCI ROMADHON, MAKA NABI MENGGARANSI TERHADAP ORANG TERSEBUT AKAN TERBEBAS ADARI NERAKA. Mari bersuka cita, mari bergembira dengan datang bulan romdhon tahun 1434 H ini, sembari kita muhasabah diri, sambil kita introspeksi diri, apakah senangnya kita senang yang EMAS atau senang yang LOYANG.\r\n\r\nBila kita senang dan diikuti oleh pelaksanaan semua rangkaian kegiatan romadhon dengan tuntas berarti kita memang EMAS, tetapi sebaliknya bila kita senangnya hanya diawal bulan saja atau di akhir bulan saja dengan tidak diikuti oleh action amal sholih sholihah selama romadhon beararti kita memang berkualitas LOYANG.\r\n\r\nPara hamba Alloh,\r\n\r\nKita sering berbuat dosa, lidah bilang tobat tetapi dosa tak kunjung tamat. Kita sering membentak ibu, kita sering membentak ayah, kita sering iri kepada teman, kita sering tidak hormat kepada guru, sering lupa mengambil barang orang lain, sering berdosa dan sering-sering yang lain. Sudahkah kita menyadari dan mentaubatinya ?\r\n\r\nPara hamba Allah,\r\n\r\nSeandainya ditampakkan sorga yang dalam al qur an digambarkan dibawahnya mengalir sungai-sungai, bantal yang bersusun-susun, tempat tidur yang bertatakan emas dan permata, anak-anak muda yang selalu belia, bidadari-bidadari yang bermata jeli laksana mutiara yang tersimpang rapi, didalamnya tidak terdapat perkataan yang sia-sia kasur-kasur yang tebal dan empuk, pohon pisang yang bersusun-susun, pohon bidara yang tidak berduri, naungan yang terbentang luas, air yang tercurah, serta buah-buahan yang banyak. Niscaya kita-kita akan selalu sujud kepada Allah SWT.\r\n\r\nSaudara-saudaraku,\r\n\r\nSeandainya engkau tahu panasnya neraka yang rosululloh katakan setitik api yang ditempatkan dibawah telapak kaki manusia, sudah cukup untuk mendidihkan otaknya. Dan seandainya engkau tahu pula bahwa bahan bakar neraka yang Allah firmankan berasal dari batu dan manusia yang panasnya tiada terbandingkan dijagad raya ini, niscaya kita tidak akan pernah dapat tersenyum, mata kita akan tertutup oleh airmata yang menghiba kepada kemurhan Alloh SWT.\r\n\r\nMari kita isi romadhon dengan amal sholeh yang nyata.\r\n\r\nBila ada sumur diladang bolehlah kita menumpang mandi,\r\n\r\nBila ada perawan yang rambutnya panjang, silahkan sering diajak ngaji.', 'takmir'),
(4, 1, '2019-04-30', 'Keutamaan Adzan dan Muadzin', '<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">Di antara syiar-syiar Islam adalah kumandang adzan untuk sholat 5 waktu. Adzan memiliki keutamaan melimpah yang disebutkan dalam hadits-hadits Nabi, di antaranya;</span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Disebutkan dalam hadits Muawiyah bin Abi Sufyan -Radhiyallahu anhu- berkata; &ldquo;Aku mendengar Rasulullah &ndash; Shalallahu &lsquo;alaihi wasalam- Bersabda,</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">&ldquo;Seorang muazin memiliki leher yang panjang di antara manusia pada hari Kiamat.&rdquo; (HR. Muslim)</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"2\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Adzan akan mengusir Setan</span></span></span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Dalam hadits Abu Hurairah -Radhiyallahu anhu- bahwasannya Rasulullah -Shalallahu &lsquo;alaihi Wasalam- Bersabda,</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">&ldquo;Jika dikumandangkan adzan untuk shalat, maka setan lari dan ia memiliki suara kentut sampai ia tidak mendengar adzan. Jika selesai adzan, maka ia datang kembali, sampai jika diiqamahkan untuk shalat, maka ia akan lari lagi hingga ketika iqamah selesai, maka ia datang kembali sehingga membisikkan antara seseorang dengan hatinya; setan berkata,&rdquo;Ingatlah ini dan itu,&rdquo; untuk sesuatu yang belum pernah ia ingat sebelumnya, sehingga seseorang itu berada dalam keadaan tidak tahu jumlah rakaat shalatnya.&rdquo; (HR. al-Bukhari dan Muslim)</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"3\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Jikalau Manusia Mengetahui apa yang ada di dalam Adzan, niscaya mereka akan saling berundi</span></span></span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Dari hadits Abu Hurairah -Radhiyallahu anhu- bahwasannya Rasulullah -Shalallahu &lsquo;alaihi Wasalam- Bersabda,</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;&ldquo;Jikalau manusia mengetahui apa yang ada di dalam adzan dan shaf pertama, kemudian mereka tidak mendapatkan hal itu kecuali dengan berundi atasnya, maka niscaya mereka akan berundi, jikalau mereka mengetahui apa yang ada di dalam bersegera pergi ke masjid, maka niscaya mereka akan berlomba-lomba kepadanya, jikalau mereka mengetahui apa yang ada di dalam shalat isya&rsquo; dan shalat shubuh maka niscaya mereka akan mendatangi keduanya walau dalam keadaan merangkak.&rdquo; (HR. al-Bukhari dan Muslim)</span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"4\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Tidaklah suara Muadzin didengar oleh segala sesuatu melainkan itu semua akan menjadi saksi</span></span></span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Abu Said al Khudri -Radhiyallahu anhu- berkata kepada Abdullah bin Abdirrahman bin Abi Sho&rsquo;sho&rsquo;ah al-Anshari:</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">&ldquo;Sesungguhnya saya melihat kamu menyukai kambing dan daerah pedalaman, maka jika kamu berada di antara kambing-kambingmu atau di pedalaman lalu engkau mengumandangkan adzan, maka keraskan suaramu dengan adzan tersebut, karena sesungguhnya tidaklah mendengar suara muadzin baik itu jin, tidak pula manusia dan tidak pula sesuatu apapun kecuali akan bersaksi untuknya pada hari Kiamat. Abu Sa&rsquo;id berkata: Saya mendengar hal ini dari Rasulullah Shalallahu &lsquo;alaihi wasallam&rdquo;.(HR. Al-Bukhari)</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"5\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Muadzin akan diampuni dosanya sesuai suaranya dan mendapatkan pahala seperti pahala orang-orang yang shalat bersamanya</span></span></span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Dari Al-Barra&rsquo; bin &lsquo;Azib -Radhiallahu anhu- bahwasanya Nabi -shalallahu alaihi wa alihi wasallam- bersabda:</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">&ldquo;Sesungguhnya Allah dan para malaikat-Nya akan bershalawat untuk orang-orang yang berada di shaf yang terdepan. Muadzin akan diampuni dosanya sepanjang suaranya, dan dia akan dibenarkan oleh segala sesuatu yang mendengarkannya, baik benda basah maupun benda kering, dan dia akan mendapatkan pahala seperti pahala orang-orang yang shalat bersamanya&rdquo;. (HR. An-Nasai dan Ahmad dinyatakan shahih oleh Al-Albani dalam Shahih At-Targhib wa At-Tarhib)</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"6\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Nabi -Shalallahu a&rsquo;laihi wasalam- mendoakan ampunan kepada para Muadzin</span></span></span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Abu Hurairah -Radhiyallahu &lsquo;anhu- berkata; Rasulullah -Shalallahu &lsquo;alaihi wasalam bersabda,</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">&ldquo;Imam adalah penanggung jawab dan Muadzin adalah yang diberi amanah, Ya Allah berilah petunjuk kepada para imam dan ampunilah para muadzin.&rdquo; (HR. Abu Dawud, at-Tirmidzi dan Ibnu Khuzaimah dishahihkan oleh Syaikh al-Albani dalam Shahih at-Targhib wa Tarhib)</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"7\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Muadzin diampuni oleh Allah dan dimasukkan dalam Surga kelak</span></span></span></span></strong></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Dari &lsquo;Uqbah bin &lsquo;Amir, ia berkata bahwa ia mendengar Rasulullah shallallahu &lsquo;alaihi wa sallam bersabda,</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">&ldquo;Rabb kalian begitu takjub terhadap si pengembala kambing di atas puncak gunung yang mengumandangkan adzan untuk shalat dan ia menegakkan shalat. Allah pun berfirman, &ldquo;Perhatikanlah hamba-Ku ini, ia beradzan dan menegakkan shalat (karena) takut kepada-Ku. Oleh karenanya, Aku telah mengampuni dosa hamba-Ku ini dan aku masukkan ia ke dalam Surga.&rdquo; (HR. Abu Daud dan An-Nasai dishahihkan oleh Syaikh al-Albani dalam Shahih at-Targhib wa Tarhib))</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Demikianlah beberapa keutamaan Adzan dan Muadzin. Semoga bermanfaat.</span></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:38px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"background-color:white\"><span style=\"font-family:&quot;Arial&quot;,&quot;sans-serif&quot;\"><span style=\"color:#333333\">Disadur dari kitab Shalatul Mukmin oleh Syaikh Said bin Ali bin Wahf Al-Qahtani oleh Arif Ardiansyah, Lc</span></span></span></span></span></span></p>\r\n', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `hak_akses` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`hak_akses`, `keterangan`) VALUES
(0, 'takmir'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_tarawih`
--

CREATE TABLE `tbl_jadwal_tarawih` (
  `id_tarawih` int(100) NOT NULL,
  `hari` text,
  `tanggal_tarawih` date DEFAULT NULL,
  `imam_penceramah` text,
  `hp` varchar(15) DEFAULT NULL,
  `tema` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal_tarawih`
--

INSERT INTO `tbl_jadwal_tarawih` (`id_tarawih`, `hari`, `tanggal_tarawih`, `imam_penceramah`, `hp`, `tema`) VALUES
(1, 'Minggu', '2019-04-21', 'Imam A', '123', 'Tema A'),
(2, 'Senin', '2019-04-22', 'Imam B', '321', 'Imam B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_artikel`
--

CREATE TABLE `tbl_jenis_artikel` (
  `id_jenis_artikel` int(100) NOT NULL,
  `jenis_artikel` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_artikel`
--

INSERT INTO `tbl_jenis_artikel` (`id_jenis_artikel`, `jenis_artikel`) VALUES
(1, 'kajian'),
(2, 'artikel romadhon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_kegiatan`
--

CREATE TABLE `tbl_kategori_kegiatan` (
  `id_kategori_kegiatan` int(100) NOT NULL,
  `jenis_kegiatan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_kegiatan`
--

INSERT INTO `tbl_kategori_kegiatan` (`id_kategori_kegiatan`, `jenis_kegiatan`) VALUES
(1, 'Santunan Yatim Piatu'),
(2, 'Distribusi ZIS'),
(3, 'Dokumentasi'),
(4, 'Dokumentasi Romadhon'),
(5, 'Jadwal Imsakiyah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(100) NOT NULL,
  `id_kategori_kegiatan` int(11) DEFAULT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `gambar` text,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `id_kategori_kegiatan`, `tanggal_kegiatan`, `gambar`, `keterangan`) VALUES
(1, 1, '2013-07-02', 'santunan1.jpg', 'Foto Bersama Ibu GM FRM Region V Surabaya dengan Anak Yatim Piatu Putri'),
(2, 1, '2013-07-02', 'santunan2.jpg', 'Foto Bersama Team Management dengan Anak Yatim Piatu Putra'),
(3, 1, '2013-07-02', 'santunan3.jpg', 'Foto Bersama dan Ramah Tamah 02'),
(4, 1, '2013-07-02', 'santunan4.jpg', 'Foto Bersama dan Ramah Tamah 04'),
(5, 1, '2013-07-02', 'santunan5.jpg', 'Prosesi Santunan kepada anak yatim piatu putri yang disampaikan oleh Ibu GM FRM Region V Surabaya'),
(6, 1, '2013-07-02', 'santunan6.jpg', 'Prosesi Santunan kepada anak yatim piatu putra yang disampaikan oleh Bapak GM FRM Region V Surabaya'),
(7, 1, '2013-07-02', 'santunan7.jpg', 'Foto Bersama dan Ramah Tamah 03'),
(8, 1, '2013-07-02', 'santunan8.jpg', 'Foto Bersama dan Ramah Tamah 01'),
(9, 2, '2013-07-08', '1.jpg', 'Bakti sosial bagi sembako kepada warga kurang mampu di Desa Giripurno Kec. Kawedanan Kab. Magetan'),
(10, 2, '2013-07-08', '2.jpg', 'Bakti Sosial di Desa Sampung Kec. Kawedanan Kab. Magetan'),
(11, 2, '2013-07-08', '3.jpg', 'Bapak H. Afandi, GM  Marketing Operation Region V, menanda tangani prasasti peresmian Masjid Miftahul Jannah di Desa Ngadirenggo Kec. Wlingi Kab. Blitar'),
(12, 2, '2013-07-08', '4.jpg', 'Buka puasa anak anak TPA di Desa Klepu Kec. Sooko Kab. Ponorogo'),
(13, 2, '2013-07-08', '5.jpg', 'Buka puasa bersama di Masjid Desa Pagerukir Kec. Sampung Kab. Ponorogo'),
(14, 2, '2013-07-08', '6.jpg', 'Buka puasa dengan 1000 anak yatim Romadhon 1432 H di Masjid Wal Ashri'),
(15, 2, '2013-07-08', '7.jpg', 'Buka puasa di desa Sumbermangku kec. Kesamben Blitar'),
(16, 2, '2013-07-08', '8.jpg', 'Dalam rangka mengakrabkan antar keluarga dai, diadakan silaturohim keluarga dai BDI'),
(17, 2, '2013-07-08', '9.jpg', 'DDi Masjid Wal Ashri  Pemberian santunan Rp. 150.000.000, untuk 1000  anak yatim masing-masing Rp.150.000 per anak'),
(18, 2, '2013-07-08', '10.jpg', 'Jamaah putri, peserta Qiyamul Lail di Masjid Wal Ashri  setiap hari Jumat kedua malam Sabtu, rutin setiap bulan sekali'),
(19, 2, '2013-07-08', '11.jpg', 'Jamah putra, peserta Qiyamul Lail di Masjid Wal Ashri setiap hari Jumat kedua malam Sabtu, rutin setiap bulan sekali'),
(20, 2, '2013-07-08', '12.jpg', 'Kajian bakda tarweh di Pagerukir,Kec. Sampung  Kab. Ponorogo'),
(21, 2, '2013-07-08', '13.jpg', 'Kajian Lailatul Qodal di Resapombo Kec. Doko Kab. Blitar'),
(22, 2, '2013-07-08', '14.jpg', 'Kajian Lailatul Qodal di Resapombo Kec. Doko Kab. Blitar'),
(23, 2, '2013-07-08', '15.jpg', 'Kegiatan Romadhon di Masjid Attaqwa Desa Slorok Kec. Doko Kab. Blitar'),
(24, 2, '2013-07-08', '16.jpg', 'Ketua Hiswana Migas, Ketua BDI, Turut hadir dalam acara peletakan batu pertama pembangunan masjid Desa Ngembat Kec. Gondang Kab. Mojokerto'),
(25, 2, '2013-07-08', '17.jpg', 'Masjid Desa Ngadirenggo Blitar yang diresmikan oleh Bp. H. Afandi GM  Marketing Operation Region V'),
(26, 2, '2013-07-08', '18.jpg', 'MPada acara persemian masjid tersebut juga diadakan baktisosial pembagian 300 paket sembako'),
(27, 2, '2013-07-08', '19.jpg', 'MPada acara persemian masjid tersebut juga diadakan baktisosial pembagian 300 paket sembako'),
(28, 2, '2013-07-08', '20.jpg', 'Proses pembangunan Masjid di Desa Ngembat Kec. Gondang Kab. Mojokerto'),
(29, 2, '2013-07-08', '21.jpg', 'Renovasi perbaikan tempat wudu dan toilet di Desa Parang  Kec. Banyakan Kab. Kediri'),
(30, 2, '2013-07-08', '22.jpg', 'Sebanyak 14 orang  dai yang kita tugaskan ke Desa Binaan yang setiap bulan mendapat honor dari BAZMA sebesar Rp. 1 jt perbulan'),
(31, 5, '2013-07-02', 'Imsakiyah01.jpg', 'Jadwal Imsakiyah Romadhon 1434 H'),
(32, 3, '2019-04-02', 'dokumentasi_cover.jpg', 'dokumentasi'),
(33, 4, '2019-04-02', 'romadhon_cover.jpg', 'romadhon_cover'),
(34, 1, '2019-04-30', 'logo3.png', 'coba');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan_keuangan`
--

CREATE TABLE `tbl_laporan_keuangan` (
  `id_laporan_keuangan` int(100) NOT NULL,
  `tanggal_pembukuan` date DEFAULT NULL,
  `uraian` text,
  `penerimaan` int(11) DEFAULT NULL,
  `pengeluaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_laporan_keuangan`
--

INSERT INTO `tbl_laporan_keuangan` (`id_laporan_keuangan`, `tanggal_pembukuan`, `uraian`, `penerimaan`, `pengeluaran`) VALUES
(1, '2019-04-29', 'Penerimaan kas', 500000, 0),
(2, '2019-04-29', 'Pengeluaran kas', 0, 175000),
(3, '2019-04-30', 'beli', 0, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(100) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `tanggal`, `waktu`, `nama`, `email`, `pesan`) VALUES
(1, '2019-04-29', '08:18:16', 'Nadiyah', 'nadiyahnes@gmail.com', 'Isi pesan (kritik dan saran)'),
(2, '2019-04-30', '01:53:23', 'dinda', 'dinda@gmail.com', 'isi ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(100) NOT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `hak_akses`, `username`, `password`) VALUES
(1, 0, 'takmir', 'takmir'),
(2, 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id_video` int(100) NOT NULL,
  `tanggal_video` date DEFAULT NULL,
  `judul` text,
  `deskripsi` text,
  `video` text,
  `diupload_oleh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id_video`, `tanggal_video`, `judul`, `deskripsi`, `video`, `diupload_oleh`) VALUES
(1, '2019-03-28', 'Kisah Ajaib Orang yang Ikhlas', 'Instagram : https://www.instagram.com/hanan_attaki<br>\r\nLine@, Twitter, Telegram: @pemudahijrah <br>\r\nFacebook: Pemuda Hijrah <br> \r\nWebsite & Streaming: https://pemudahijrah.id/ <br>\r\nYouTube: https://www.youtube.com/hananattaki', 'video_kajian_1.mp4', 'admin'),
(2, '2019-03-27', 'DOA SAKIT HATI - Ustadz Hanan Attaki', 'Instagram : https://www.instagram.com/hanan_attaki<br>\r\nLine@, Twitter: @pemudahijrah<br>\r\nFacebook: Pemuda Hijrah <br>\r\nWebsite & Streaming: https://pemudahijrah.id/ <br>\r\nYouTube: https://www.youtube.com/hananattaki', 'video_kajian_2.mp4', 'takmir'),
(3, '2019-04-30', 'coba', 'coba', 'video.mp4', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `FK_reference_2` (`id_jenis_artikel`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`hak_akses`);

--
-- Indexes for table `tbl_jadwal_tarawih`
--
ALTER TABLE `tbl_jadwal_tarawih`
  ADD PRIMARY KEY (`id_tarawih`);

--
-- Indexes for table `tbl_jenis_artikel`
--
ALTER TABLE `tbl_jenis_artikel`
  ADD PRIMARY KEY (`id_jenis_artikel`);

--
-- Indexes for table `tbl_kategori_kegiatan`
--
ALTER TABLE `tbl_kategori_kegiatan`
  ADD PRIMARY KEY (`id_kategori_kegiatan`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `FK_reference_1` (`id_kategori_kegiatan`);

--
-- Indexes for table `tbl_laporan_keuangan`
--
ALTER TABLE `tbl_laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan_keuangan`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_reference_3` (`hak_akses`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jadwal_tarawih`
--
ALTER TABLE `tbl_jadwal_tarawih`
  MODIFY `id_tarawih` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jenis_artikel`
--
ALTER TABLE `tbl_jenis_artikel`
  MODIFY `id_jenis_artikel` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori_kegiatan`
--
ALTER TABLE `tbl_kategori_kegiatan`
  MODIFY `id_kategori_kegiatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_laporan_keuangan`
--
ALTER TABLE `tbl_laporan_keuangan`
  MODIFY `id_laporan_keuangan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id_video` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD CONSTRAINT `FK_reference_2` FOREIGN KEY (`id_jenis_artikel`) REFERENCES `tbl_jenis_artikel` (`id_jenis_artikel`);

--
-- Constraints for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD CONSTRAINT `FK_reference_1` FOREIGN KEY (`id_kategori_kegiatan`) REFERENCES `tbl_kategori_kegiatan` (`id_kategori_kegiatan`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `FK_reference_3` FOREIGN KEY (`hak_akses`) REFERENCES `tbl_hak_akses` (`hak_akses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
