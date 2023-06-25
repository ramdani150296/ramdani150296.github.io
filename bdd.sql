-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 16.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akurasi_stock`
--

CREATE TABLE `tbl_akurasi_stock` (
  `id` int(11) NOT NULL,
  `cut_off` varchar(128) DEFAULT '0',
  `plant` varchar(128) DEFAULT '0',
  `sloc` varchar(128) DEFAULT '0',
  `type` varchar(128) DEFAULT '0',
  `group` varchar(128) DEFAULT '0',
  `pack_size` varchar(50) DEFAULT '0',
  `material` varchar(50) DEFAULT '0',
  `description` varchar(50) DEFAULT '0',
  `uom` varchar(50) DEFAULT '0',
  `batch` varchar(50) DEFAULT '0',
  `sled_bdd` varchar(50) DEFAULT '0',
  `valution_type` varchar(50) DEFAULT '0',
  `storage_type` varchar(50) DEFAULT '0',
  `storage_bin` varchar(50) DEFAULT '0',
  `total_stock` varchar(50) DEFAULT '0',
  `unposted` varchar(50) DEFAULT '0',
  `stock_onhand` varchar(50) DEFAULT '0',
  `stock_good` varchar(50) DEFAULT '0',
  `stock_bad` varchar(50) DEFAULT '0',
  `diff_qty` varchar(50) DEFAULT '0',
  `bin_accurasi` varchar(50) DEFAULT '0',
  `std_price` varchar(50) DEFAULT '0',
  `onhand_val` varchar(50) DEFAULT '0',
  `physic_val` varchar(50) DEFAULT '0',
  `dif_val` varchar(50) DEFAULT '0',
  `ed_fisik` varchar(50) DEFAULT '0',
  `keterangan` varchar(50) DEFAULT '0',
  `val_god` varchar(50) DEFAULT '0',
  `val_bad` varchar(50) DEFAULT '0',
  `akurasi` varchar(50) DEFAULT '0',
  `type_action` varchar(50) DEFAULT '0',
  `kode` varchar(128) DEFAULT '0',
  `bulan` varchar(128) DEFAULT '0',
  `total_fisik` varchar(125) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_akurasi_stock`
--

INSERT INTO `tbl_akurasi_stock` (`id`, `cut_off`, `plant`, `sloc`, `type`, `group`, `pack_size`, `material`, `description`, `uom`, `batch`, `sled_bdd`, `valution_type`, `storage_type`, `storage_bin`, `total_stock`, `unposted`, `stock_onhand`, `stock_good`, `stock_bad`, `diff_qty`, `bin_accurasi`, `std_price`, `onhand_val`, `physic_val`, `dif_val`, `ed_fisik`, `keterangan`, `val_god`, `val_bad`, `akurasi`, `type_action`, `kode`, `bulan`, `total_fisik`) VALUES
(1, '45043', 'SBY', 'TG01', 'ZTRD', 'BEGA', '12X1 KG', '20001067', 'CHEESE CHEDDAR PROCESS SLICE W/ BURGER', 'PAC', '2000094118', '45112', 'E12', 'C.06A.1.10', '47', NULL, '47', '47', '0', '0', '100,00%', '89505', '4206735', '4206735', '0', '45112', 'Akurat', '4206735', '0', 'Akurat', 'Cycle Count', 'A', 'Mei', '47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_critical_stock`
--

CREATE TABLE `tbl_critical_stock` (
  `id` int(11) NOT NULL,
  `plant` varchar(50) NOT NULL DEFAULT '0',
  `nama_area` varchar(50) NOT NULL DEFAULT '0',
  `storage_location` varchar(50) NOT NULL DEFAULT '0',
  `material_type` varchar(50) NOT NULL DEFAULT '0',
  `material_group` varchar(50) NOT NULL DEFAULT '0',
  `material_group_desc` varchar(50) NOT NULL DEFAULT '0',
  `pack_size_old` varchar(50) NOT NULL DEFAULT '0',
  `material` varchar(50) NOT NULL DEFAULT '0',
  `material_description` varchar(50) NOT NULL DEFAULT '0',
  `batch` varchar(50) NOT NULL DEFAULT '0',
  `tanggal_ed` date DEFAULT NULL,
  `valution_tipe` varchar(50) NOT NULL DEFAULT '0',
  `gr_date` date DEFAULT NULL,
  `mkt_categori3` varchar(50) NOT NULL DEFAULT '0',
  `total_stock_bu` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery_bu` varchar(50) NOT NULL DEFAULT '0',
  `available_stock_bu` varchar(50) NOT NULL DEFAULT '0',
  `base_unit` varchar(50) NOT NULL DEFAULT '0',
  `total_stock_ou` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery_ou` varchar(50) NOT NULL DEFAULT '0',
  `available_stock_ou` varchar(50) NOT NULL DEFAULT '0',
  `order_unit` varchar(50) NOT NULL DEFAULT '0',
  `total_stock_su` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery_su` varchar(50) NOT NULL DEFAULT '0',
  `available_su` varchar(50) NOT NULL DEFAULT '0',
  `sales_unit` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life_product` varchar(50) NOT NULL DEFAULT '0',
  `periode_shelf_life` varchar(50) NOT NULL DEFAULT '0',
  `cut_off_stock` date DEFAULT NULL,
  `storage_condition` varchar(50) NOT NULL DEFAULT '0',
  `total_self_life` varchar(50) NOT NULL DEFAULT '0',
  `mkt_category1` varchar(50) NOT NULL DEFAULT '0',
  `standard_price` varchar(50) NOT NULL DEFAULT '0',
  `total_value` varchar(50) NOT NULL DEFAULT '0',
  `time_to_expired` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life_present` varchar(50) NOT NULL DEFAULT '0',
  `ket_self_life` varchar(50) NOT NULL DEFAULT '0',
  `kategori_principal` varchar(50) NOT NULL DEFAULT '0',
  `status_inventory` varchar(50) NOT NULL DEFAULT '0',
  `sisa_sled` varchar(50) NOT NULL DEFAULT '0',
  `ket_mat_group` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life_month` varchar(50) NOT NULL DEFAULT '0',
  `create_et` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_monitoring_stock`
--

CREATE TABLE `tbl_monitoring_stock` (
  `id` int(11) NOT NULL,
  `periode` varchar(128) NOT NULL DEFAULT '0',
  `kode_plant` varchar(128) NOT NULL DEFAULT '0',
  `nama_plant` varchar(128) NOT NULL DEFAULT '0',
  `store_location` varchar(128) NOT NULL DEFAULT '0',
  `material_type` varchar(11) NOT NULL DEFAULT '0',
  `material_group` varchar(11) NOT NULL DEFAULT '0',
  `material_group_description` varchar(200) NOT NULL DEFAULT '0',
  `pack_size_old` varchar(200) NOT NULL DEFAULT '0',
  `material` varchar(50) NOT NULL DEFAULT '0',
  `material_description` varchar(50) NOT NULL DEFAULT '0',
  `batch` varchar(50) NOT NULL DEFAULT '0',
  `sledd_bdd` varchar(50) NOT NULL DEFAULT '0',
  `valution_type` varchar(50) NOT NULL DEFAULT '0',
  `gr_date` varchar(50) NOT NULL DEFAULT '0',
  `mkt_category3` varchar(50) NOT NULL DEFAULT '0',
  `total_stock` varchar(50) NOT NULL DEFAULT '0',
  `schedule_delivery` varchar(50) NOT NULL DEFAULT '0',
  `available_stock` varchar(50) NOT NULL DEFAULT '0',
  `base_unit` varchar(50) NOT NULL DEFAULT '0',
  `total_cost` varchar(50) NOT NULL DEFAULT '0',
  `total_value` varchar(50) NOT NULL DEFAULT '0',
  `keterangan_ed` varchar(50) NOT NULL DEFAULT '0',
  `kategori_principal` varchar(50) NOT NULL DEFAULT '0',
  `cut_off_stock` varchar(200) NOT NULL DEFAULT '0',
  `total_self_life` varchar(50) NOT NULL DEFAULT '0',
  `mkt_category1` varchar(50) NOT NULL DEFAULT '0',
  `standard_price` varchar(50) NOT NULL DEFAULT '0',
  `time_to_expired` varchar(50) NOT NULL DEFAULT '0',
  `shelf_life` varchar(50) NOT NULL DEFAULT '0',
  `ket_self_life` varchar(50) NOT NULL DEFAULT '0',
  `sisa_sled` varchar(50) NOT NULL DEFAULT '0',
  `ket_mat_group` varchar(50) NOT NULL DEFAULT '0',
  `status_inventory` varchar(50) NOT NULL DEFAULT '0',
  `claim_no_claim` varchar(150) NOT NULL DEFAULT '0',
  `sisa_total_shelf_life` varchar(250) NOT NULL DEFAULT '0',
  `create_et` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_monitoring_stock`
--

INSERT INTO `tbl_monitoring_stock` (`id`, `periode`, `kode_plant`, `nama_plant`, `store_location`, `material_type`, `material_group`, `material_group_description`, `pack_size_old`, `material`, `material_description`, `batch`, `sledd_bdd`, `valution_type`, `gr_date`, `mkt_category3`, `total_stock`, `schedule_delivery`, `available_stock`, `base_unit`, `total_cost`, `total_value`, `keterangan_ed`, `kategori_principal`, `cut_off_stock`) VALUES
(1, 'MEI 23', '3110', 'ANCOL', '9999', 'ZFGD', 'DIAMOND', 'DIAMOND', '30 PCS', '10000008', 'ICE CREAM STICK CHOCONUT VANILLA 50 ML', 'SOS', '0', '', '-', 'DIA', '29', '0', '29', 'PC', '3487', '101123', 'ED', 'No Claim', '45061');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perbandingan`
--

CREATE TABLE `tbl_perbandingan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(128) NOT NULL DEFAULT '0',
  `jenis_penyimpanan` varchar(128) NOT NULL DEFAULT '0',
  `plant` varchar(128) NOT NULL DEFAULT '0',
  `material` varchar(128) NOT NULL DEFAULT '0',
  `description` varchar(128) NOT NULL DEFAULT '0',
  `pack_size` varchar(128) NOT NULL DEFAULT '0',
  `valution_type` varchar(128) NOT NULL DEFAULT '0',
  `batch` varchar(128) NOT NULL DEFAULT '0',
  `sled_bdd` varchar(128) NOT NULL DEFAULT '0',
  `uom` varchar(128) NOT NULL DEFAULT '0',
  `system_cycle_count` varchar(128) NOT NULL DEFAULT '0',
  `system_stock_taking` varchar(128) NOT NULL DEFAULT '0',
  `fisik_cycle_count` varchar(128) NOT NULL DEFAULT '0',
  `fisik_stock_taking` varchar(128) NOT NULL DEFAULT '0',
  `akurasi_cc` varchar(128) NOT NULL DEFAULT '0',
  `akurasi_st` varchar(128) NOT NULL DEFAULT '0',
  `keterangan` varchar(128) NOT NULL DEFAULT '0',
  `gap_akurat` varchar(128) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `reaction` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role_id`, `is_active`, `date_created`, `reaction`) VALUES
(1, 'Deni ramdani', 'Rdeni9722@gmail.com', '$2y$10$/v4lENurQJhmOVFIkw3xwekCAoQ6rpAJkB/UgDedpAX.7dhF.Kz5y', 2, 1, 1684853743, NULL),
(2, 'yoga agustin', 'yogaagustin@gmail.com', '$2y$10$5C1f7dfeF11MM8deSF./t.hzTlajjFrsbKoxhhmthCkbbNTpCmnIu', 2, 1, 1684854680, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akurasi_stock`
--
ALTER TABLE `tbl_akurasi_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_critical_stock`
--
ALTER TABLE `tbl_critical_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_monitoring_stock`
--
ALTER TABLE `tbl_monitoring_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_perbandingan`
--
ALTER TABLE `tbl_perbandingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akurasi_stock`
--
ALTER TABLE `tbl_akurasi_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_critical_stock`
--
ALTER TABLE `tbl_critical_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79985;

--
-- AUTO_INCREMENT untuk tabel `tbl_monitoring_stock`
--
ALTER TABLE `tbl_monitoring_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_perbandingan`
--
ALTER TABLE `tbl_perbandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
