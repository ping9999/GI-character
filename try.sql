-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 26, 2023 lúc 04:17 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `try`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `title`, `image_name`) VALUES
(14, 'Mondstar', 'Food_area_844.png'),
(15, 'Liyue', 'Food_area_498.png'),
(16, 'Inazuma', 'Food_area_475.png'),
(17, 'Sumeru', 'Food_area_824.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_char`
--

CREATE TABLE `tbl_char` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `W_image_name` varchar(255) NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_char`
--

INSERT INTO `tbl_char` (`id`, `title`, `description`, `image_name`, `W_image_name`, `area_id`) VALUES
(9, 'Zhongli', 'Zhongli là một người đàn ông sang trọng, điềm đạm và lịch thiệp. Anh biết mọi thứ về lịch sử, văn hoá của Liyue bởi vì anh đã sống trong suốt quãng thời gian tồn tại của Liyue. Zhongli có những tư tưởng triết học về tiền bạc và rất tôn trọng những truyền thống của Liyue, kể cả những truyền thông đã dần mai mọt và bị lãng quên của Liyue. Zhongli có xu hướng khiêm tốn, lo lắng rằng mình bị coi là \"ký sinh trùng tư sản\".\r\n\r\nZhongli thường quên Mora trong các giao dịch mua bán, đồng ý chi số tiền lớn mà không có bất cứ Mora nào trong tay, thậm chỉ nhận \"chiết khấu\" như đã thoả thuận mặc dù rõ ràng đây là một vụ lừa đảo. Vì vậy, Zhongli thường dựa vào những người quen biết của mình để được hỗ trợ tài chính, chẳng hạn như Nhà Tang Lễ Vãng Sinh Đường hoặc Childe. Mặc dù anh ấy làm việc cho Hu Tao, đường chủ Vãng Sinh Đường, anh không thích hành vi trẻ con của cô ấy.\r\n\r\nNguyên nhân của việc đó chính là bắt nguồn từ việc tạo ra Mora. Với Gnosis cho phép Zhongli tạo ra Mora vô hạn, anh không bao giờ lo lắng về việc cạn kiệt tài chính cá nhân của mình. Tuy nhiên khi anh chọn sống cùng nhân loại, anh đã nhận thấy sự sai lầm của mình. Kết quả là Zhongli tiêu Mora của người khác một cách không biết xấu hổ.', 'char-Name-4986.png', 'W-char-Name-3010.png', 15),
(10, 'amber', 'à một Kỵ sĩ trinh thám cho Đội Kỵ Sĩ Tây Phong, Amber được Kaeya mô tả là \"hình mẫu cho công lý\". Cô luôn hoàn thành nhiệm vụ được giao một cách chăm chỉ, mặc dù là người duy nhất còn lại trong đội. Cô luôn làm theo đúng những quy định và chuẩn mực, ngoại trừ việc sử dụng Phong Chi Dực, bị thu hồi bằng bay lượn nhiều lần.\r\n\r\nLuôn vui vẻ và thân thiện, Amber không có bất kì khó khăn nào khi nói chuyện với người lạ, cô cư xử như là đã gặp họ từ trước. Cô đam mê và dành tất cả tâm huyết vào bất cứ việc gì cô làm, ví dụ như giúp đỡ người dân với tư cách là một Kỵ sĩ trinh thám hay dọn dẹp doanh trại hilichurl,... tất cả đều là sự cố gắng của Amber để trở thành một người kỵ sĩ tốt như ông nội cô, người từng là một cận vệ trung thành bảo vệ Mondstadt. Ngay cả khi ông bất ngờ biến mất, cô cũng cố gắng thay thế ông mình bảo vệ vùng đất.', 'char-Name-7516.png', 'W-char-Name-8008.png', 14),
(11, 'raiden shogun', 'Raiden Shogun tin rằng chỉ có \"vĩnh hằng\" mới có thể khiến tất cả ngừng lại, khiến cho Inazuma trường sinh bất diệt. Cô được người dân kính trọng, uy danh của cô đã sớm thoát khỏi phàm trần, trở thành tín ngưỡng được thờ phụng tại Inazuma.\r\n\r\nRaiden Shogun tồn tại ở hai dạng - Ei, danh tính thực sự của cô, và Shogun, con rối do Ei tạo ra, đóng vai trò là người cai trị Inazuma khi cô thiền định trong Nhất Tâm Tịnh Thổ. Con rối này tuyệt đối tuân theo mệnh lệnh có sẵn, được Ei lập trình để ngay cả cô cũng khó có thể sửa đổi. Shogun là người có tính cách lạnh lùng, thậm chí nhẫn tâm; ít biểu lộ cảm xúc, không thích và ghét một thứ gì và không có nhu cầu giải trí nào hết[2]. Shogun tự cho mình là trợ thủ của Ei[3], cô luôn hành động chính xác theo ý chí của Ei, không hơn không kém; thiếu đi nó thì không được phép đưa ra quyết định. Một khi các chức năng thông thường bị Ei vô hiệu hóa, cô sẽ không thể làm bất cứ điều gì. Do hạn chế về giao thức truyền đạt thông tin cùng sự thờ ơ của Ei trước đó với bất cứ điều gì ngoài \"vĩnh hằng\", Shogun có thể dễ dàng bị thao túng bởi các thế lực bên ngoài, như khi Nhà Kujou và Fatui thao túng Shogun để bắt đầu và duy trì Lệnh Truy Lùng Vision.', 'char-Name-2800.png', 'W-char-Name-5902.png', 16),
(12, 'keqing', 'Keqing là một người nghiện công việc, đòi hỏi bản thân phải làm việc \"chăm chỉ gấp mười lần so với người bình thường\" và tiến bộ một cách bất thường trong các vấn đề liên quan đến công việc. Cô ấy cũng có tinh thần trách nhiệm cao và sẽ không dừng lại cho đến khi một nhiệm vụ được hoàn thành một cách hoàn hảo - và theo tiêu chuẩn của cô ấy,điều này không có gì ngạc nhiên khi nhân viên của cô ấy có tỷ lệ bỏ việc cao. Mặc dù tuổi còn trẻ, Keqing không ngại làm việc trong điều kiện gian khổ như một phần nhiệm vụ của cô với tư cách là Ngọc Hành Tinh.\r\n\r\nTrước khi Đế Quân rời khỏi Liyue, Keqing là một người luôn hoài nghi các vị thần, tin rằng con người nên tự giải quyết vấn đề của mình.Tuy nhiên, khi Thất Tinh Liyue đảm nhận công việc của Đế Quân, cô ấy bắt đầu tôn trọng cho Đế Quân sau khi nhận ra anh đã làm nhiều công việc cho Liyue, nhưng chính vì cô ấy là người công khai thách thức các vị thần,cô ấy che giấu sự thật rằng cô ấy bắt đầu tôn trọng Đế Quân.Cô ấy giữ cả tủ toàn món đồ chơi về Đế Quân để tự \"kiểm điểm\".Tương tự như vậy, ban đầu cô ấy nghi ngờ về Mắt Thần;khi có được của mình,cô ấy coi đó là mốt sự thách thức và xúc phạm,cố gắng phá hủy nó một cách tuyệt vọng.Sau cùng, cô ấy nhận ra sai lầm của mình và bắt đầu đánh giá cao vì nhiều công dụng của nó.', 'char-Name-645.png', 'W-char-Name-4178.png', 15),
(13, 'Tighnari', 'Người không may gặp nạn trong rừng Avidya, nếu như được đội trưởng kiểm lâm tên Tighnari giúp đỡ, thì đó là một chuyện may mắn.\r\n\r\nNhưng nếu là bản thân mắc lỗi và rơi vào rắc rối, thì e rằng sẽ có nhiều cảm xúc lẫn lộn lắm.\r\n\r\nTighnari sẽ dùng phương pháp chuyên nghiệp nhất để nhanh chóng giải quyết vấn đề, đồng thời, cũng sẽ dùng thái độ nghiêm khắc nhất để chỉ dẫn đối phương.\r\n\r\nNhững người đánh giá thấp khu rừng mưa ắt sẽ phải vật lộn trong đó, và những người đánh giá thấp kiểm lâm cuối cùng sẽ phải đối mặt với \"lớp học kỹ năng sinh tồn nơi hoang dã\".\r\n\r\nTrên đây đều là những lời đồn đại, nhưng trên thực tế, giao tiếp với Tighnari không có gì phải căng thẳng cả. Chỉ cần là người đầu óc tỉnh táo, là sẽ có thể hiểu được những lời giải thích dễ hiểu của Tighnari.\r\n\r\nCòn những người đã dạy dỗ nhiều lần vẫn không thay đổi ấy mà...\r\n\r\n\"Thật tiếc quá, tôi học về thực vật học, còn giúp mọi người phát triển não bộ không phải là chuyên môn của tôi rồi.\"', 'char-Name-2435.png', 'W-char-Name-1543.png', 17),
(14, 'Kokomi', 'Là Thánh Pháp Sư của đảo Watatsumi, Kokomi tự mình xử lý hầu hết mọi chuyện trên đảo. Với mong muốn trở thành một nhà quân sự thì cô không bằng lòng với trách nhiệm như vậy nhưng vẫn lấy lớp vỏ bọc đó để giúp cho người dân của mình có được niềm hy vọng và hạnh phúc mà họ xứng đáng có được. Giống như Jean, Kokomi dễ \"cháy hết mình\" khi làm việc và cố gắng giấu điều đó với mọi người để tránh làm họ lo lắng.\r\n\r\nCùng với việc giải quyết công việc, Kokomi còn là một chiến lược gia tài giỏi, có thể nghĩ ra được các tình huống có thể xảy ra và cách đối phó nhờ việc đọc nhiều sách quân sự, mặc dù cô cũng thích đọc những cuốn sách bình thường. Kujou Sara nhận xét rằng kế hoạch của cô đã ngăn cản Hiệp Hội Tenryou tuyên bố chiến thắng hoàn toàn trước Quân Watatsumi. Cô vẫn giữ thói quen này ngay cả khi không chỉ huy quân đội. Nhờ vai diễn này, cô được người dân yêu quý bởi người dân của mình.', 'char-Name-2471.png', 'W-char-Name-2138.png', 16);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_char`
--
ALTER TABLE `tbl_char`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_char`
--
ALTER TABLE `tbl_char`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
