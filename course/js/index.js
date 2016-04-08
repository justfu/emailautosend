/**
 * Created by 宏 on 2016/3/31.
 */
$().ready(function(){
    $('#sub').bind('click',function(event){
        var name=$('#name').val();
        var email=$('#email').val();
        var class_=$('#class_').val();
        if(CheckMail(email)==false){
            event.preventDefault();
            return;
        }
        $('#butt').attr('disabled','disabled');
        $('#butt').css('backgroundColor','white');
        $('#butt').html('<img src=./img/loading.gif />');
        yuyue(name,email,class_);
        event.preventDefault();
    });


    function yuyue(name,email,class_){
        $.ajax({
            url:'./yuyue_ajax.php',
            data:'name='+name+'&email='+email+'&class='+class_,
            type:'post',
            success:function(msg){
                $('#butt').removeAttr('disabled');
                $('#butt').css('backgroundColor','aqua');
                $('#butt').html('预约');
                alert(msg);
            }
        })
    }

    function CheckMail(mail) {
        var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (filter.test(mail)) return true;
        else {
            alert('您的电子邮件格式不正确');
            return false;
        }
    }

});