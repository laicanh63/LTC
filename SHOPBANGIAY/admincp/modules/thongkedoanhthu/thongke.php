<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>Document</title>
</head>
<body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                   thongke();
                                   var char = new Morris.Bar({
                                   
                                   element: 'chart',
                                   
                                   xkey: 'date',
                                   
                                   ykeys: ['date','sales'],
                                   
                                   labels: ['Ngày bán','Doanh thu']
                                   });

                                   $('.select-date').change(function(){
                                    var thoigian = $(this).val();
                                    if(thoigian=='7ngay') {
                                        var text = '7 ngày qua';
                                    } else if(thoigian=='30ngay') {
                                        var text = '30 ngày qua';
                                    } else if(thoigian=='90ngay') {
                                        var text = '90 ngày qua';
                                    } else {
                                        var text = '365 ngày qua';
                                    }

                                    $.ajax({
                                        url:"modules/thongkedoanhthu/xuly.php",
                                        method:"POST",
                                        dataType:"JSON",
                                        data:{thoigian:thoigian},
                                        success:function(data) {
                                            char.setData(data);
                                            $('#text-date').text(text);
                                        }
                                    });
                                   })

                                   function thongke() {
                                    var text = '7 ngày qua';
                                    $('#text-date').text(text);
                                    $.ajax({
                                        url:"modules/thongkedoanhthu/xuly.php",
                                        method:"POST",
                                        dataType:"JSON",
                                        success:function(data) {
                                            char.setData(data);
                                            $('#text-date').text(text);
                                        }
                                    });
                                   }
                                });
                                </script>
</body>
</html>