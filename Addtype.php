<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
$date_y=(date("Y")+543);
if (!$_SESSION['login']) {
    header("location: /qnumber/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddDocument</title>

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
                        // echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
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


                    <form action="saveaddtype.php" method="POST" enctype="multipart/form-data">
                        <h1>เพิ่มประเภทเอกสาร</h1> <br>
                        <div class="inputdoc">
                            <label for="name">ชื่อประเภท:</label>
                            <input type="text" id="name" name="name" required><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="num">เลข อว:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="num" name="num" placeholder=".xxx" required><br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="startnum">เลขเริ่มต้น:</label>
                            <input type="number" id="startnum" name="startnum" value="0" required> <br><br><br>
                        </div>
                        <div class="inputdoc">
                            <label for="year">ปีปัจจุบัน:&nbsp;&nbsp;</label>
                            <input type="text" id="year" name="year" placeholder="โปรดใส่ปี พ.ศ. ปัจจุบัน" value="<?php echo $date_y ?>" required><br><br><br>
                        </div>

                        <div class="addsub">
                            <input type="submit" class="submit" name="submit" value="ตกลง">
                            <a href="Booktype.php" class="cancel">ยกเลิก</a>
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