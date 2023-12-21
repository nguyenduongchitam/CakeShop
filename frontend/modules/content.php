<?php
include("../../Database/Config/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from news where news_id=$id";
    $result = mysqli_query($mysqli, $sql);
}
while ($row = mysqli_fetch_array($result)) {
?>
    <div class="menubody">
        <div class="wrapper">
            <h1><?php echo $row['title'] ?></h1>
            <div class="content">
                <?php echo $row['content']; ?>
            </div>
        </div>
    <?php
} ?>
    </div>