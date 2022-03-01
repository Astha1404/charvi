$(document).ready(function(){
    $(document).on("blur","#cartqty",function (){
        let qty = $('#cartqty').val();
        let pid = $('#cartqty').attr('name');
        pid = pid.split('qty')[1];
        $.ajax({
            type: "POST",
            url: "cartUpdate.php",
            data: {'qty':qty, 'productId':pid},
            success: function (data) {
                if(data=='success')
                {
                    window.location.href="cart.php";
                }
            }
        });
    })
});