<?php
Header('Content-type: image/jpeg');
Header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
Header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');
Header('Pragma: no-cache');
$servername = "localhost";
$username = "USERNAME"; // Insert Username Here
$password = "PASSWORD"; // Insert Password Here
$dbname = "DATABASE"; // Insert Database Name Here
$results = array();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$stmt = $conn->prepare("SELECT Wallet, Balance FROM *TABLENAME*"); // Change to richlist or whatever you named your Table
$stmt->execute();
$i = 0;
$stmt->bind_result($wallet, $balance);
while ($stmt->fetch()) {
    $i+= 1;
    $results[$i] = array('WALLETS' => $wallet, 'BALANCES' => $balance);
}
array_multisort(array_column($results, "BALANCES"), SORT_DESC, $results);
$font = '../Fonts/AldotheApache.ttf';
// for ($i = 0; $i < 60; $i++) { // Used to remove/ignore certain wallets if you so wish to
// if ($results[$i]['WALLETS'] != "INSERTWALLETHERE") {
// }
// else {
//          unset($results[$i]);
//     $results = array_values($results);
// }
// }
for ($i = 0;$i < 30;$i++) {
    $results[$i]['WALLETS'] = substr($results[$i]['WALLETS'], 26, 40);
}
$image = imageCreateFromPng('../XPEPELeaderboard/Images/Leaderboard.png'); // Place your image here
$cool = imagecolorallocate($image, 255, 153, 0);
$red = imagecolorallocate($image, 153, 102, 51);
$yellow = imagecolorallocate($image, 255, 255, 255);
ImageTTFText($image, 25, 0, 45, 472, $cool, $font, ".... " . $results[0]['WALLETS'] . ' ' . "- " . ' ' . $results[0]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 572, $cool, $font, ".... " . $results[1]['WALLETS'] . ' ' . "- " . ' ' . $results[1]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 672, $cool, $font, ".... " . $results[2]['WALLETS'] . ' ' . "- " . ' ' . $results[2]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 772, $cool, $font, ".... " . $results[3]['WALLETS'] . ' ' . "- " . ' ' . $results[3]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 872, $cool, $font, ".... " . $results[4]['WALLETS'] . ' ' . "- " . ' ' . $results[4]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 972, $cool, $font, ".... " . $results[5]['WALLETS'] . ' ' . "- " . ' ' . $results[5]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1072, $cool, $font, ".... " . $results[6]['WALLETS'] . ' ' . "- " . ' ' . $results[6]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1172, $cool, $font, ".... " . $results[7]['WALLETS'] . ' ' . "- " . ' ' . $results[7]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1272, $cool, $font, ".... " . $results[8]['WALLETS'] . ' ' . "- " . ' ' . $results[8]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1372, $cool, $font, ".... " . $results[9]['WALLETS'] . ' ' . "- " . ' ' . $results[9]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1472, $cool, $font, ".... " . $results[10]['WALLETS'] . ' ' . "- " . ' ' . $results[10]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1572, $cool, $font, ".... " . $results[11]['WALLETS'] . ' ' . "- " . ' ' . $results[11]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1672, $cool, $font, ".... " . $results[12]['WALLETS'] . ' ' . "- " . ' ' . $results[12]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1772, $cool, $font, ".... " . $results[13]['WALLETS'] . ' ' . "- " . ' ' . $results[13]['BALANCES']);
ImageTTFText($image, 25, 0, 45, 1872, $cool, $font, ".... " . $results[14]['WALLETS'] . ' ' . "- " . ' ' . $results[14]['BALANCES']);
$stmt = $conn->prepare("SELECT Time FROM lastupdate");
$stmt->execute();
$i = - 1;
$stmt->bind_result($time);
while ($stmt->fetch()) {
    $holdTime = $time;
}
ImageTTFText($image, 15, 0, 220, 425, $cool, $font, $holdTime . " - MTC");
imageAlphaBlending($image, true);
imageSaveAlpha($image, true);
imagePng($image);
// output and destroy
imagedestroy($image);
?>