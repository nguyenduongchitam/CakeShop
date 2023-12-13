<?php
include("../../Database/Config/config.php");
$sql1 = "select * from tintuc";
$result1 = mysqli_query($mysqli, $sql1);
?>
<body>
    <div class="newbody">
        <div class="wrapper">
            <h1>Tin tức</h1>
            <div class="main">
                <ul>
                    <?php
                    while ($row = mysqli_fetch_array($result1)) {
                    ?>
                    <div class="back">
                            <a href="index.php?action=content&query=none&id=<?php echo $row['tintuc_id'] ?>">
                                <img src="../../Database/images/<?php echo $row['anh'] ?>" height="350px" width="350px" alt="image">
                                <p class="product_list"><?php echo $row['title'] ?> </p>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $(window).scroll(function(){
      if($(this).scrollTop()){
        $('.clickk').fadeIn();
      }else{
        $(".clickk").fadeOut();
      }
    });
    $(".clickk").click(function(){
      $('html,body').animate({scrollTop: 0}, 500);
    });
  });
</script>