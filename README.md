# xPEPE_Leaderboard

Join us in our Discord [HERE](https://discord.gg/HAG5Qe79wK)

Turns an image into a dynamic top 15 Leaderboard for your holders!
(What is a Dynamic Image? Well, simply put anytime someone refreshes the page/image the data is automatically updated LIVE!)

Disclaimer: Please note all data is pulled via the XRP Ledger and we take no responsibility for incorrect data or issues you may experience.

With this code you can turn your own image into a Top 15 (OR MORE!) Leaderboard with the Data we have submitted to our MySQL Database found in the Repo [xPEPE_Token_Tool](https://github.com/xPEPENFT/xPEPE_Token_Tool)

xPEPE Top 15 Leaderboard (example)

![image](https://user-images.githubusercontent.com/98682121/151692495-10837904-e3eb-42b5-804e-3f5645b34a99.png)


First things first, you must own a webspace to host the files.

File Structure Is

```
- Fonts
 -- AldotheApache.ttf
- Images
 -- Leaderboard.png
- Leaderboard.png.php
```

Two things you need to change in the Leaderboard.png.php file.

1: MySQL Server Settings (Line 6-9)

```
$servername = "localhost";
$username = "USERNAME"; // Insert Username Here
$password = "PASSWORD"; // Insert Password Here
$dbname = "DATABASE"; // Insert Database Name Here
```

2: Table name for the richlist data (Line 16)

```
$stmt = $conn->prepare("SELECT Wallet, Balance FROM *TABLENAME*"); // Change to richlist or whatever you named your Table
```

To reference the image you must label it as a .PNG.PHP so the code can execute.

