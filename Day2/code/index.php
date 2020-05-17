<?php
    require 'idcard.php';
    $idCard = new IDCard();
    $back = $idCard->getBack();
    $face = $idCard->getFace();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    

    <div class="container">
        <br>
        <div class="row">
            <div class="col-6-md">
                <div class="alert alert-primary" role="alert">
                    ps:为了省钱，俺没有开文件上传的
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3-sm">
                <img style="width:80%;height:auto;" src="/images/2F.jpg" alt="">
            </div>
            <div class="col-3-sm">
                <img style="width:80%;height:auto;" src="/images/1F.png" alt="">
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-3-sm" id="face">

            </div>

            <div class="col-3-sm" id="back">

            </div>
        </div>
    </div>

    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script>
        var Name = "<?php echo $face['FrontResult']['Name']; ?>";
        var Gender = "<?php echo $face['FrontResult']['Gender']; ?>";
        var Nationality = "<?php echo $face['FrontResult']['Nationality']; ?>";
        var BirthDate = "<?php echo $face['FrontResult']['BirthDate']; ?>";
        var Address = "<?php echo $face['FrontResult']['Address']; ?>";
        var IDNumber = "<?php echo $face['FrontResult']['IDNumber']; ?>";

        var StartDate = "<?php echo $back['BackResult']['StartDate']; ?>";
        var Issue = "<?php echo $back['BackResult']['Issue']; ?>";
        var EndDate = "<?php echo $back['BackResult']['EndDate']; ?>";
        console.log(Issue)
        $("#face").append("<p>姓名:"+Name+"</p>"+
        "<p>性别："+Gender+"</p>"+
        "<p>民族："+Nationality+"</p>"+
        "<p>生日："+BirthDate+"</p>"+
        "<p>地址："+Address+"</p>"+
        "<p>身份证号："+IDNumber+"</p>"
        )

        $("#back").append("<p>签发机关："+Issue+"</p>"+
        "<p>有效期限："+StartDate+"-"+EndDate+"</p>")
    </script>
</body>
</html>