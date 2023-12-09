<?php 
require('../carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
  


?>
<p>Thống kê doanh thu theo : <span id="text-date"></span></p>

<div id="chart" style="height: 250px;"></div>

<script type="text/javascript">    
 $(document).ready(function(){
    thongke();
   var char = new Morris.Bar({

  element: 'chart',

  xkey: 'date',

  ykeys: ['order','sales','quantity'],

  labels: ['Đơn hàng','Doanh thu','Số lượng bán ra']
});

function thongke(){
var text='365 ngày qua';
  $.ajax(
    {
        url:"thongke.php",
        method:"POST",
        dataType: "json",
        success:function(data)
        { 
             char.setData(data);
            $('#text-date').text(text);
        }
    }); 
}
 })

</script>