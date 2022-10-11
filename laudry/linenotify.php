<?php
isset($_POST['contact']) ? $contact = $_POST['contact'] : $contact = "";

//// $contact ตอนนี้ยังเป็น mock-up data อยู่ ตามรูปแบบจะต้องเป็นรูปแบบ token จึงสามารถเชื่อมกับระบบ notify ของ line ///

$sToken = "j8SkspLB1sWq4kmSVx2VoZDZI6LSkb9UH7";
$sMessage = "คำสั่งซักของคุณกำลังจะเสร็จสิ้นภายใน 1 นาที";

$chOne = curl_init();
curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($chOne, CURLOPT_POST, 1);
curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($chOne);

//Result error 
// if (curl_error($chOne)) {
//   echo 'error:' . curl_error($chOne);
// } else {
//   $result_ = json_decode($result, true);
//   echo "status : " . $result_['status'];
//   echo "message : " . $result_['message'];
// }
// curl_close($chOne);
