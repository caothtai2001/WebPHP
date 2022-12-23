-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: mysql-server
-- Thời gian đã tạo: Th1 15, 2022 lúc 08:47 AM
-- Phiên bản máy phục vụ: 8.0.1-dmr
-- Phiên bản PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quantrivien`
--
CREATE DATABASE IF NOT EXISTS `quantrivien` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `quantrivien`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(5, '', '', ''),
(6, '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duan`
--

CREATE TABLE `duan` (
  `mada` int(11) NOT NULL,
  `tenda` text COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaynop` datetime NOT NULL,
  `tennv` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New',
  `phongban` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `duan`
--

INSERT INTO `duan` (`mada`, `tenda`, `mota`, `ngaytao`, `ngaynop`, `tennv`, `trangthai`, `phongban`) VALUES
(14, 'Làm việc nhà', 'PHỤ TRÁCH MẢNG TÀI CHÍNH CÔNG TY', '2022-01-04 19:56:00', '2022-01-19 19:56:00', 'Trần Thị Anh', 'success', 'Nhân sự'),
(15, 'Làm việc nhà', 'PHỤ TRÁCH MẢNG TÀI CHÍNH CÔNG TY', '2022-01-03 19:59:00', '2022-01-22 19:59:00', 'Nguyễn Văn A', 'success', 'Nhân sự'),
(16, 'Làm việc nhà', 'Tiếp nhận và xử lý các công việc nội bộ trong doanh nghiệp.', '2021-12-29 20:13:00', '2022-01-11 08:13:00', 'Trần Thị Anh', 'New', 'Nhân sự'),
(17, 'Làm việc nhà', 'Tiếp nhận và xử lý các công việc nội bộ trong doanh nghiệp.', '2021-12-27 20:14:00', '2022-01-23 20:14:00', 'Trần Văn Bang', 'waiting', 'Nhân sự'),
(19, 'Làm việc nhà1', 'Nhận mọi thông tin về khiếu nại của khách hàng, đưa ra phương hướng xử lý, trình cấp trên xin ý kiến và thảo luận tại cuộc họp giao ban.', '2022-01-05 20:24:00', '2022-01-16 20:24:00', 'Trần Văn Bang', 'in process', 'Nhân sự'),
(20, 'Làm việc nhà1', 'Nhận mọi thông tin về khiếu nại của khách hàng, đưa ra phương hướng xử lý, trình cấp trên xin ý kiến và thảo luận tại cuộc họp giao ban.', '2022-01-05 20:24:00', '2022-01-16 20:24:00', 'Trần Văn Bang', 'New', 'Nhân sự'),
(21, 'Làm việc nhà1', 'Nhận mọi thông tin về khiếu nại của khách hàng, đưa ra phương hướng xử lý, trình cấp trên xin ý kiến và thảo luận tại cuộc họp giao ban.', '2022-01-05 20:24:00', '2022-01-16 20:24:00', 'Trần Văn Bang', 'New', 'Nhân sự'),
(22, 'sadsad', 'ádasd', '2022-01-13 13:58:00', '2022-01-05 13:58:00', 'Nguyễn Hoài Bảo', 'success', 'Công nghệ thông tin'),
(23, 'sadas', 'sadasd', '2022-01-12 14:05:00', '2022-01-05 14:05:00', 'Lê Đức Thọ', 'New', 'Công nghệ thông tin'),
(24, 'dự án 1', 'hoàn thành càng sớm càng tốt', '2022-01-15 14:18:00', '2022-01-19 14:18:00', 'Nguyễn Thị  Lan', 'waiting', 'Nhân sự'),
(25, 'học tiếp', 'học cho công ty ', '2022-01-21 14:25:00', '2022-01-29 14:25:00', 'Nguyễn Hoài Bảo', 'New', 'Công nghệ thông tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(128) COLLATE utf8_unicode_ci DEFAULT 'pending',
  `permission` int(11) NOT NULL,
  `phongban` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `user`, `pass`, `lastname`, `firstname`, `trangthai`, `permission`, `phongban`) VALUES
(1, 'admin', '$2y$10$yryoLx9ISXzkjsWygsPXved9K77rl6YlodC0YzFRP8iMBYtb3IkRu', 'Quản Trị', 'Viên', 'active', 2, 'Giám đốc'),
(20, '234567890134', '$2y$10$hn6Vruj1Yt7bQ6eAdPXVSuXm.BHvyqn/MgMW/n8TH4xS1e2b.B3yW', 'Nguyễn Hoài', 'Bảo', 'active', 1, 'Công nghệ thông tin'),
(21, '301737334', '$2y$10$879fZUEf3xpwX3DFRaA94eQ1GvqCrpQwGTKxQRYeRI9dceKlYj98C', 'Cao Thành', 'Tài', 'active', 0, 'Nhân sự'),
(22, '1637952695621', '$2y$10$bDFXol.GxUFtlfXtrHIJpOp8F.p7CYoZf6B6poB2HEHvJwJyOSpT.', 'Lê Đức', 'Thọ', 'pending', 0, 'Công nghệ thông tin'),
(23, '801000111012', '$2y$10$hVFb40Iynyu.H0.CXiodzuLC5hT7iYkwP7iN0d6x/eifw9cnxjhJi', 'Nguyễn Thị', 'Hoa', 'pending', 0, 'Quan hệ quốc tế'),
(24, '801900012389', '$2y$10$Yk.i03eLDjdKgRc3SpHk2e5SjltHRvwLBqBiVH2dfsA3GePMQ3WSC', 'Nguyễn Thị ', 'Lan', 'active', 1, 'Nhân sự'),
(25, '312461474723', '$2y$10$13HVsQ1dBx5DwrSM94O8dulnvHkZfW3eu1IiasFZpMeApMhesJBEq', 'Lưu Nguyễn Quốc', 'Khang', 'active', 0, 'Marketting'),
(26, '801978000134', '$2y$10$oWorXfVkIVTrDNU3lX4qjeRrBQMuQOMDtK31nIZcxT6s2i6bWGg9G', 'Trần Thị ', 'Hạnh', 'pending', 0, 'Kinh doanh'),
(27, '8019993837174', '$2y$10$iTq.7bfsHq.fNgcP2qcSOeKwY4bU9yA5/peIVJOT5is4etxCmiLy.', 'Trần Thị Mỹ', 'Anh', 'pending', 0, 'Hành chính'),
(28, '456348759065', '$2y$10$cJRzqWRivh3khIf67UReaepn1yPkwiYTgcQ4NGMTVjqmE6Va0/Kq6', 'Huỳnh Nguyễn Như', 'Mai', 'pending', 0, 'Chăm sóc khách hàng'),
(29, '3254522223', '$2y$10$gFz6rTxxlhGu9RZYU/VG0.cA9aUPC.F/YyHWTcYQfIKLjLyzi6qFa', 'Nguyễn Thị Hoài', 'Phương', 'pending', 0, 'Nghiên cứu và phát triển Sản phẩm'),
(30, '234567842', '$2y$10$Q0sNaWtSsoMU3FtG.Q0WGOvpijlOUhOUmZau/er97svqhBOKTh2vq', 'Nguyễn Nhật ', 'Thiên', 'pending', 0, 'Thu mua'),
(31, '34311233', '$2y$10$SxnRW7qBj1FYqTmLHos/Tue.ooATnCBGHrJhzJ5gc989kK95smTMW', 'Nguyễn Thị Yến ', 'Như', 'pending', 1, 'Kế toán'),
(32, '49365324', '$2y$10$hrgq476lcLdtOVFpVFS7m.10MBFnzAtxlUZsBGWnW0YqO4J.p0DVa', 'Lương Diễm Thúy', 'Phương', 'pending', 0, 'Kiểm toán'),
(33, '04551522', '$2y$10$jBA40CFU4lNGRuqqJXfk4.TRneooz9DVe3sq97C3wLsfMxVEhrjUS', 'Thái', 'Nguyễn Nho ', 'pending', 0, 'Nhân sự'),
(34, '54983748', '$2y$10$NJsMrG5zgR.nOAkOKvscTORgeg55DFKwe0YjU1BaoiXI6ijyT6Nge', 'Linh', 'Nguyễn Thị', 'pending', 0, 'Marketting');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `stt` int(11) NOT NULL,
  `avatar` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucvu` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phongban` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gender` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cccd` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ngaycap` date DEFAULT NULL,
  `noicap` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quoctich` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dantoc` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tongiao` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noisinh` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuongtru` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` bigint(20) DEFAULT NULL,
  `sdtkc` bigint(20) DEFAULT NULL,
  `quanhe` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duoiemail` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stk` bigint(20) DEFAULT NULL,
  `nganhang` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`stt`, `avatar`, `chucvu`, `phongban`, `lastname`, `firstname`, `ngaysinh`, `gender`, `cccd`, `ngaycap`, `noicap`, `quoctich`, `dantoc`, `tongiao`, `noisinh`, `thuongtru`, `sdt`, `sdtkc`, `quanhe`, `email`, `duoiemail`, `stk`, `nganhang`) VALUES
(67, NULL, 'Nhân viên', 'Nhân sự', 'Nguyễn Nho ', 'Thái', '1993-06-18', 'Nam', '04551522', '2022-01-04', 'Long An', 'Việt Nam', 'Kinh', 'Không', 'Đồng Nai', 'Đồng Tháp', 3515156, 3265515, 'Người thân', 'jfkdhhs334', '@gmail.com', 151515, 'BIDV'),
(56, NULL, 'Nhân viên', 'Công nghệ thông tin', 'Lê Đức', 'Thọ', '1999-06-08', 'Nam', '1637952695621', '2022-01-13', 'Cần Thơ', 'Việt Nam', 'Kinh', 'Không', 'Cần Thơ', 'Cần Thơ', 932116500, 921165221, 'Người thân', 'nguyenvanx', '@gmail.com', 100422215555, 'Vietcombank'),
(64, NULL, 'Nhân viên', 'Thu mua', 'Nguyễn Nhật ', 'Thiên', '2002-06-04', 'Nam', '234567842', '2021-12-30', 'Long An', 'Việt Nam', 'Kinh', 'Không', 'Long An', 'Long An', 23764232, 426473643, 'Người thân', 'ntt123', '@gmail.com', 1244433232, 'Vietcombank'),
(54, NULL, 'Trưởng phòng', 'Công nghệ thông tin', 'Nguyễn Hoài', 'Bảo', '2002-06-04', 'Nam', '234567890134', '2022-01-12', 'Long An', 'Việt Nam', 'Kinh', 'Không', 'Long An', 'Long An', 384584548, 903651682, 'Người thân', 'garenazawa', '@gmail.com', 2134253464, 'BIDV'),
(55, NULL, 'Nhân viên', 'Nhân sự', 'Cao Thành', 'Tài', '2001-06-12', 'Nam', '301737334', '2022-01-05', 'Long An', 'Việt Nam', 'Kinh', 'Không', 'Long An', 'Long An', 366821907, 2723592854, 'Người thân', 'leopard479579@gmail.com', '@gmail.com', 1014653610, 'Vietcombank'),
(59, NULL, 'Nhân viên', 'Marketting', 'Lưu Nguyễn Quốc', 'Khang', '1997-06-15', 'Nam', '312461474723', '2022-01-12', 'Tiền Giang', 'Việt Nam', 'Kinh', 'Không', 'Tiền Giang', 'Tiền Giang', 347922348, 373032329, 'Người thân', 'nguyenquockhanh', '@gmail.com', 3124675323, 'Saccombank'),
(63, NULL, 'Nhân viên', 'Nghiên cứu và phát triển Sản phẩm', 'Nguyễn Thị Hoài', 'Phương', '2001-05-26', 'Nữ', '3254522223', '2019-02-08', 'Tiền Giang', 'Việt Nam', 'Kinh', 'Không', 'Tiền Giang', 'Tiền Giang', 564489810, 366812907, 'Bạn bè', 'nthp123', '@gmail.com', 2154525623, 'Vietcombank'),
(65, NULL, 'Trưởng phòng', 'Kế toán', 'Nguyễn Thị Yến ', 'Như', '2002-06-05', 'Nữ', '34311233', '2021-12-08', 'Long An', 'Việt Nam', 'Kinh', 'Không', 'Bình Phước', 'Bình Phước', 374652323, 23864237, 'Người thân', 'ntyn333', '@gmail.com', 3286463, 'Viettinbank'),
(62, NULL, 'Nhân viên', 'Chăm sóc khách hàng', 'Huỳnh Nguyễn Như', 'Mai', '1994-07-13', 'Nữ', '456348759065', '2018-02-08', 'Nam Định', 'Việt Nam', 'Kinh', 'Không', 'Nam Định', 'Nam Định', 765456732, 987667878, 'Bạn bè', 'nguyenhuynhnhumai', '@gmail.com', 233303567843, 'BIDV'),
(66, NULL, 'Nhân viên', 'Kiểm toán', 'Lương Diễm Thúy', 'Phương', '2002-06-12', 'Nữ', '49365324', '2020-01-28', 'Long An', 'Việt Nam', 'Kinh', 'Không', 'Long An', 'Long An', 38647343, 47363523, 'Người thân', 'ldtppp', '@gmail.com', 438632536, 'HDbank'),
(68, NULL, 'Nhân viên', 'Marketting', 'Nguyễn Thị', 'Linh', '1986-07-15', 'Nam', '54983748', '2021-12-31', 'Cục cảnh sát', 'Việt Nam', 'Kinh', 'Không', 'Điện Biên', 'Điện Biên', 3151512, 545150, 'Người thân', 'sjdiwhsh223', '@gmail.com', 25545, 'Vietcombank'),
(57, NULL, 'Nhân viên', 'Quan hệ quốc tế', 'Nguyễn Thị', 'Hoa', '2001-07-19', 'Nữ', '801000111012', '2021-06-15', 'Cục cảnh sát', 'Việt Nam', 'Kinh', 'Phật giáo', 'TP Hồ Chí Minh', 'TP Hồ Chí Minh', 987463145, 943567891, 'Bạn bè', 'ttth12345', '@gmail.com', 1189456045, 'Vietcombank'),
(58, NULL, 'Trưởng phòng', 'Nhân sự', 'Nguyễn Thị ', 'Lan', '2001-06-06', 'Nữ', '801900012389', '2022-01-05', 'TPHCM', 'Việt Nam', 'Kinh', 'Cao đài', 'TP Hồ Chí Minh', 'TP Hồ Chí Minh', 987463145, 943567891, 'Bạn bè', 'nguyenthilan', '@gmail.com', 11123897100121, 'Viettinbank'),
(60, NULL, 'Nhân viên', 'Kinh doanh', 'Trần Thị ', 'Hạnh', '1994-07-06', 'Nữ', '801978000134', '2013-10-15', 'Cục cảnh sát', 'Việt Nam', 'Kinh', 'Không', 'Bà Rịa – Vũng Tàu', 'Bà Rịa – Vũng Tàu', 843589123, 857894412, 'Người thân', 'tranthihanh', '@gmail.com', 2322234455, 'BIDV'),
(61, NULL, 'Nhân viên', 'Hành chính', 'Trần Thị Mỹ', 'Anh', '1990-07-04', 'Nam', '8019993837174', '2022-01-06', 'Hà Nội', 'Việt Nam', 'Kinh', 'Không', 'Hà Nội', 'Hà Nội', 945689133, 934478121, 'Người thân', 'tranthimyanh', '@gmail.com', 11890344557231, 'Techcombank'),
(1, NULL, 'Tổng giám đốc', 'Giám đốc', 'Quản Trị', 'Viên', '2022-01-01', 'Nam', 'admin', '2022-01-01', 'admin', 'admin', 'Kinh', 'Không', 'An Giang', 'An Giang', 123123123, 12341234, 'Người thân', 'tonggiamdoc', '@gmail.com', 123456789, 'VCB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongban`
--

CREATE TABLE `phongban` (
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `sophong` int(11) NOT NULL,
  `mapb` int(11) NOT NULL,
  `phongban` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongban`
--

INSERT INTO `phongban` (`mota`, `sophong`, `mapb`, `phongban`) VALUES
('Lập kế hoạch và triển khai công tác tuyển dụng nhằm đáp ứng nhu cầu hoạt động của doanh nghiệp; Thông báo các quy định, chính sách của công ty cho nhân viên: Ca làm việc, tài khoản cá nhân, chính sách lương thưởng, chế độ bảo hiểm, nghỉ phép…', 5, 1, 'Nhân sự'),
('Thực hiện công việc về nghiệp vụ chuyên môn tài chính kế toán theo quy định của Nhà nước\nTheo dõi sự vận động vốn kinh doanh của doanh nghiệp dưới mọi hình thái và cố vấn cho Ban lãnh đạo về các vấn đề liên quan.\nTham mưu cho Ban Tổng Giám đốc về chế độ kế toán và những thay đổi qua từng thời kỳ trong hoạt động kinh doanh.\nCùng với các bộ phận khác tạo nên mạng lưới thông tin quản lý nhân sự, tài chính,…', 6, 2, 'Kế toán'),
('Thiết kế chương trình khuyến mãi và bảo hành sản phẩm cho khách hàng; Tham mưu cho Ban Giám đốc các vấn đề liên quan đến phát triển thương hiệu, phát triển kênh phân phối.', 7, 3, 'Marketting'),
('Lên kế hoạch tổ chức và thực hiện các hoạt động kinh doanh cũng như tính toán báo cáo về giá thành để tạo hợp đồng với khách.\n', 20, 4, 'Kinh doanh'),
('Tiếp nhận và xử lý các công việc nội bộ trong doanh nghiệp; Tổ chức sắp xếp hội thảo, hội nghị cho công ty; Lưu trữ, phát hành văn bản, con dấu và chịu trách nhiệm trước ban giám đốc và pháp luật về tính pháp lý.', 5, 5, 'Hành chính'),
('Công việc của phòng kiểm toán là kiểm tra, xác minh tính trung thực của những báo cáo tài chính từ đó cung cấp những thông tin chính xác về tình hình tài chính của doanh nghiệp. ', 7, 6, 'Kiểm toán'),
('Nhận mọi thông tin về khiếu nại của khách hàng, đưa ra phương hướng xử lý, trình cấp trên xin ý kiến và thảo luận tại cuộc họp giao ban.', 15, 7, 'Chăm sóc khách hàng'),
('Xây dựng chiến lược và kế hoạch phát triển CNTT trong từng giai đoạn phát triển của doanh nghiệp; Chịu trách nhiệm điều hành và quản lý hoạt động CNTT.', 20, 8, 'Công nghệ thông tin'),
('Tổ chức đàm phán, ký kết các văn bản hợp tác với các đối tác quốc tế; Xây dựng chiến lược hợp tác quốc tế trung và dài hạn.', 7, 9, 'Quan hệ quốc tế'),
('Nghiên cứu và thay thế dần các vật liệu và công nghệ nhằm nâng cao chất lượng sản phẩm; Nghiên cứu nội địa hóa một số nguyên liệu nhằm tăng giá trị và chủ động trong sản xuất với chi phí hợp lý hơn.', 30, 10, 'Nghiên cứu và phát triển Sản phẩm'),
('Liên hệ, đàm phán, trao đổi với các nhà cung ứng để tìm ra nguồn cung phù hợp với mức giá tốt nhất; Tìm kiếm và phát triển thêm nhiều nguồn cung ứng khác cho công ty', 10, 11, 'Thu mua');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xinnghiphep`
--

CREATE TABLE `xinnghiphep` (
  `madonxnp` int(11) NOT NULL,
  `cccd` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ngaynghi` date NOT NULL,
  `songay` int(11) NOT NULL,
  `lydo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'waiting',
  `machucvu` int(11) NOT NULL,
  `phongban` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tongngayduocnghi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xinnghiphep`
--

INSERT INTO `xinnghiphep` (`madonxnp`, `cccd`, `ten`, `ngaynghi`, `songay`, `lydo`, `trangthai`, `machucvu`, `phongban`, `tongngayduocnghi`) VALUES
(42, '234567890134', 'Nguyễn Hoài Bảo', '2022-01-06', 2, 'đi chơi ', 'approved', 1, 'Công nghệ thông tin', 15),
(43, '801900012389', 'Nguyễn Thị  Lan', '2022-01-16', 3, 'đi chơi ', 'approved', 0, 'Nhân sự', 12),
(44, '301737334', 'Cao Thành Tài', '2022-01-17', 23, 'đi chơi ', 'waiting', 1, 'Nhân sự', 15),
(45, '301737334', 'Cao Thành Tài', '2022-02-05', 2, 'thích', 'refused', 1, 'Nhân sự', 15),
(46, '801900012389', 'Nguyễn Thị  Lan', '2022-02-05', 12, 'đi chơi ', 'waiting', 0, 'Nhân sự', 12),
(47, '234567890134', 'Nguyễn Hoài Bảo', '2022-01-27', 2, 'thích', 'waiting', 1, 'Công nghệ thông tin', 15),
(48, '234567890134', 'Nguyễn Hoài Bảo', '2022-02-24', 3, 'đám cưới', 'waiting', 1, 'Công nghệ thông tin', 15),
(49, '801900012389', 'Nguyễn Thị  Lan', '2022-01-27', 12, 'đi chơi ', 'waiting', 0, 'Nhân sự', 12),
(50, '312461474723', 'Lưu Nguyễn Quốc Khang', '2022-01-23', 12, 'đi chơi ', 'waiting', 0, 'Marketting', 12);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `duan`
--
ALTER TABLE `duan`
  ADD PRIMARY KEY (`mada`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`cccd`),
  ADD UNIQUE KEY `stt` (`stt`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`mapb`);

--
-- Chỉ mục cho bảng `xinnghiphep`
--
ALTER TABLE `xinnghiphep`
  ADD PRIMARY KEY (`madonxnp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `duan`
--
ALTER TABLE `duan`
  MODIFY `mada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `phongban`
--
ALTER TABLE `phongban`
  MODIFY `mapb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `xinnghiphep`
--
ALTER TABLE `xinnghiphep`
  MODIFY `madonxnp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
