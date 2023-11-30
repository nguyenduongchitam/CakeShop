<?php
include("../../Database/Config/config.php");
$sql1 = "select * from tintuc";
$result1 = mysqli_query($mysqli, $sql1);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="menubody">
        <div class="wrapper">
            <h1>Tin tức</h1>
            <div class="main">
                <ul>
                    <?php
                    while ($row = mysqli_fetch_array($result1)) {
                    ?>
                        <li>
                            <a href="index.php?action=content&query=none&id=<?php echo $row['tintuc_id'] ?>">
                                <img src="../../Database/images/<?php echo $row['anh'] ?>" height="300px" width="300px" alt="image">
                                <p class="product_list"><?php echo $row['title'] ?> </p>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>