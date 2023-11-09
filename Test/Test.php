<?php 
     
     $date = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh')); 
     $pastDate = new DateTime('2023-11-09 18:00:00'); // Tạo đối tượng DateTime cho một thời điểm trong quá khứ
     
    echo $date->format('Y-m-d H:i:s');
    echo $pastDate->format('Y-m-d H:i:s');

        $currentDate = new DateTime($date->format('Y-m-d H:i:s'));

     $interval = $currentDate->diff($pastDate); // Tính khoảng thời gian giữa hai ngày
     
     // Lấy kết quả
     $years = $interval->y;
     $months = $interval->m;
     $days = $interval->d;
     $hours = $interval->h;
     $minutes = $interval->i;
     $seconds = $interval->s;
     
     // In kết quả
     echo "Khoảng thời gian giữa hiện tại và ngày quá khứ là: ";
     echo "$years năm, $months tháng, $days ngày, $hours giờ, $minutes phút, $seconds giây.";
            
?>