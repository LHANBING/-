@extends('homes.lcr')

@section('title','忘记密码')


@section('content')

    <div class="login-box">
    <div class="am-tabs" id="doc-my-tabs">
        <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
            <li>
                <a href="">
                    修改密码
                </a>
            </li>
        </ul>
        <div class="am-tab-panel">
        <form action="" method="post">
            <div class="user-phone">
                <label for="user">
                    <i class="am-icon-mobile-phone am-icon-md">
                    </i>
                </label>
                <input type="text" name="tel" id="phone" placeholder="请输入手机号">
            </div>
                <div id="phonemsg" class="yanzheng">

                </div>
            <div class="verification">
                    <label for="code">
                        <i class="am-icon-code-fork">
                        </i>
                    </label>
                    <input type="text" name="code" id="code" placeholder="请输入验证码">
                    <a class="btn" href="javascript:void(0)" id="sendMobileCode">
                        <span id="dyMobileButton">
                            获取
                        </span>
                    </a>
                </div>
                <div id="codemsg" class="yanzheng">

                </div>
            <div class="user-pass">
                <label for="password">
                    <i class="am-icon-lock">
                    </i>
                </label>
                <input type="password" name="password" id="newpassword" placeholder="请输入新密码">
            </div>
            <div id="newpasswordmsg" class="yanzheng">

                </div>
             <div class="user-pass">
                    <label for="password">
                        <i class="am-icon-lock">
                        </i>
                    </label>
                    <input type="password" name="password" id="passwordRepeat" placeholder="确认新密码">
                </div>
                <div id="confirmpasswordmsg" class="yanzheng">

                </div>
    </div>
    <div class="login-links">
        
        <a href="/home/login" class="zcnext am-fr am-btn-default">
            登录
        </a>
               
      
    </div>
    
    </form>
    <div class="am-cf">
        {{ csrf_field()}}
        <input type="submit" name="submit" value="修改" class="am-btn am-btn-primary am-btn-sm">
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    

        $('#phone').blur(function() 
        {       

             checkTel($(this),$('#phonemsg'));

             
        })

        $('#sendMobileCode').click(function() 
            {   
                // 获取手机号
                var phone = $('#phone').val();
                // 发送ajax
                $.post("/home/change/phone",{tel:phone,'_token':'{{csrf_token()}}'},function(data) {
                        
                        alert(data);
                    /*if (data) 
                    {
                        alert('短信已发送！');

                    }else
                    {
                        alert ('短信发送失败！请重新操作！');
                    }*/

                })
                //消除默认设置 
                return false;
            })

        $('#code').blur(function() 
        {       

            checkVerifyCode($(this), $('#codemsg'), 6);
                            
        })

          
        $('#newpassword').blur(function() 
        {       
            checkNewPassword($(this),$('#newpasswordmsg'), 6);

             
        })
        

        $('#passwordRepeat').blur(function() 
        {       
             checkRelPassword($('#newpassword'), $(this), $('#confirmpasswordmsg'), 6);
        })

        $('#submit').click(function() 
        {   
            // 获取手机号
            var phone = $('#phone').val();
            // 获取输入的验证码
            var code = $('#code').val();
            // 获取输入的新密码和确认密码
            var password = $('#newpassword').val();
            
            // 发送ajax
            $.post("{{url('/home/change')}}",{tel:phone,code:code,password:password,'_token':'{{csrf_token()}}'},function(data) {
                
                if(data)
                {
                    alert('修改成功！');
                    
                }

                // console.log(data);

                })
            
            //消除默认设置
            return false;

         })
    
</script>
@endsection