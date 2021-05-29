<?php
require("dbConn.php");
session_start();
date_default_timezone_set("Asia/Bangkok");
#print_r($_SESSION);
$userid = $_SESSION['AD_userid'];
if (!$_SESSION['login']) {
    header("location: /qnumber/index.php");
    exit;
}
$namearr = array('');
$selectuser = "select Name from type";
$reql = $db->query($selectuser);

while ($row = mysqli_fetch_array($reql)) {
    array_push($namearr, $row['Name']);
}

$nameadd = count($namearr);

$docid = $_GET["docid"];
//echo $nameadd;
$_SESSION['nameadd'] = $nameadd;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>

    <nav>
        <div class="container">
            <div class="nav-top">
                <div class="tital-logo">
                    <h1>KASETSART UNIVERSITY</h1>
                </div>

                <div class="nav-contact">
                    <p>
                        <?php
                        //echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                        echo  $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'];
                        ?>
                        <a href="logout.php" class="view">Logout</a>
                    </p>
                </div>

            </div>

            <div class="nav-buttom">
                <div class="namesystem">
                    <p>ระบบออกเลขหนังสือราชการ</p>
                </div>
                <div class="statususer">
                    <p>status : <?php echo $_SESSION['AD_status']; ?></p>
                </div>
            </div>

            <div class="navmenu">
                <li><a href="home.php">Home</a></li>
                <li><a href="requestadmin.php">กรอกขอเลข</a></li>
                <li><a href="activity.php">ดูประวัติทั้งหมด</a></li>
                <li><a href="Booktype.php">ประเภทเอกสาร</a></li>
                <li><a href="manage_user.php">จัดการ user</a></li>

            </div>

        </div>
    </nav>

    <section id="AddDocument">

        <div class="container">
            <div class="frameitemAddD">
                <div class="itemAddD">
                    <?php
                    $selecttypeuse = "select TypeUseID from permission where UserID = $userid";
                    $reqltype = $db->query($selecttypeuse);
                    $listusetype = array('');
                    while ($rowtypeuse = $reqltype->fetch_assoc()) {
                        array_push($listusetype, $rowtypeuse['TypeUseID']);
                    }
                    #print_r($listusetype);
                    $countlist = count($listusetype);

                    ?>


                    <form action="insert_document.php" method="POST">
                        <h1>แก้ไขเอกสาร</h1>
                        <div class="inputdoc">
                            <label for="fname">เลือกประเภท:</label>

                            <select name="type_id" required>
                                <option value="">---------กรุณาเลือกเอกสาร---------</option>
                                <?php
                                $loop = 1;
                                while ($loop < $countlist) {
                                    #print_r($listusetype);
                                    $selecttype = "select * from type where TypeID = '$listusetype[$loop]'";
                                    $reql = $db->query($selecttype);
                                    $rowtype = $reql->fetch_assoc();
                                    $namebook = $rowtype['Name'];
                                    print_r($namebook);
                                ?>
                                    <option name="drop<?php echo $loop ?>" value="<?php echo $listusetype[$loop] ?>"><?php print_r($namebook); ?></option>
                                <?php
                                    $loop += 1;
                                } ?>

                            </select>

                        </div>

                        <?php
                        // $date_d = date("d-m"); // วัน เดือน
                        // $date_y = (date("Y") + 543); // ปี
                        // $date_t = date("H:i:s"); // เวลา
                        // echo "<input type='text' name='date' value='$date_d-$date_y' required>";

                        $selectdoc = "select * from document where DocumentID = '" . $docid . "'";
                        $reql = $db->query($selectdoc);
                        $rowdoc = $reql->fetch_assoc();

                        ?>


                        <div class="inputdoc">
                            <label for="fname">ลงวันที่:</label>
                            <input type="text" name="date" value="<?php echo $rowdoc["Date"]; ?>">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">จาก:</label>
                            <input type="text" name="send" value="<?php echo $rowdoc["Sent_Name"]; ?>">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">ถึง:</label>
                            <input type="text" name="to" value="<?php echo $rowdoc["Receive_Name"]; ?>">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เรื่อง:</label>
                            <input type="text" name="story" value="<?php echo $rowdoc["Text"]; ?>">
                        </div>
                        <div class="inputdoc">
                            <label for="fname">เบอร์:</label>
                            <input type="text" name="phone" value="<?php echo $rowdoc["Phone"]; ?>">
                        </div>

                        <div class="addpdf">
                            <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;เอกสาร.pdf</a>
                            <a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;แนบไฟล์.pdf</a>
                        </div>


                        <div class="addsub">
                            <input type="submit" class="submit" name="submit" value="ตกลง">
                            <a href="insert_document.php" class="cancel">ยกเลิก</a>
                        </div>



                    </form>

                </div>


            </div>



        </div>




    </section>

    <footer id="footerAddD">
        <div class="container">
            <div class="footer1">
                <p>contact</p>
            </div>
        </div>


    </footer>

</body>

</html>