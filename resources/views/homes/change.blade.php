@extends('homes.lcr')

@section('title','找回密码')


@section('content')

    <div class="login-box">
    <div class="am-tabs" id="doc-my-tabs">
        <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
            <li>
                <a href="">
                    找回密码
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
        <input type="submit" name="submit" id="submit"value="确定" class="am-btn am-btn-primary am-btn-sm">
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
          // 手机号，验证码，密码，确认密码进行判断的初始值
          var checktel = false;
          var checkverifyCode = false;
          var checkpassword = false;
          var checkrelpassword = false;

          // 检测手机号
          $('#phone').blur(function() 
          {      
             //调用checkTel函数检测手机号
             checktel = checkTel($(this),$('#phonemsg'));
          })

          // 点击获取按钮发送ajax获取验证码
        $('#sendMobileCode').click(function() 
            {   
                // 获取手机号
                var phone = $('#phone').val();
                //判断手机号格式是否正确
                if(checktel == 100)
                {
                // 发送ajax
                    $.post("/home/change/phone",{tel:phone,'_token':'{{csrf_token()}}'},function(data) 
                    {                        
                         // 通过判断data的值,得到信息  
                        if (data == "1") 
                        {
                            layer.open({                             
                              content: '短信已发送！'
                            });                            
                            
                        }else
                        {   
                            layer.open({                              
                              content: '短信发送失败！请重新操作！'
                            });                           
                        }

                    })
                }else
                {
                    layer.open({                              
                          content:'您输入的手机号码格式不正确，无法获取验证码！'
                        });
                }
                //消除默认设置 
                return false;
            })

        // 检测验证码
        $('#code').blur(function() 
        {       
            //调用checkVerifyCode函数检测验证码
           checkverifyCode = checkVerifyCode($(this), $('#codemsg'), 6);
             checktel = 100;               
        })
          
        // 检测新密码
        $('#newpassword').blur(function() 
        {       
           //调用checkNewPassword函数检测新密码
           checkpassword = checkNewPassword($(this),$('#newpasswordmsg'), 6);

             
        })
                
        // 检测确认密码
        $('#passwordRepeat').blur(function() 
        {      
             //调用checkRelPassword函数检测确认密码 
             checkrelpassword = checkRelPassword($('#newpassword'), $(this), $('#confirmpasswordmsg'), 6);
        })

        // 点击确定按钮，发送ajax
        $('#submit').click(function() 
        {   
            // 获取手机号
            var phone = $('#phone').val();
            // 获取输入的验证码
            var code = $('#code').val();
            // 获取输入的新密码
            var password = $('#newpassword').val();
            // 判断手机号，验证码，密码和确认密码输入值是否符合格式
            if(checktel == 100 && checkverifyCode == 100 && checkpassword == 100 && checkrelpassword == 100)
            {
            // 发送ajax
            $.post("{{url('/home/change')}}",{tel:phone,code:code,password:password,'_token':'{{csrf_token()}}'},function(data) 
               {      
                    // 通过判断data的值,得到信息         
                    if(data == "1")
                    {   
                        
                       layer.open({  
                        content: '修改成功,赶快去登陆吧！',  
                        btn: ['确认'],  
                        yes: function(index, layero) {  
                            window.location.href='/home/login';  
                        },cancel: function() {  
                            //右上角关闭回调  
  
                        }  
                    });
                                           
                    }else
                    {
                        layer.open({                         
                              content: '修改失败！'
                            });
                    }
              })
             }else
              {
                layer.open({
                          
                          content:'请填写正确的修改信息！'
                        });
              }
            //消除默认设置
            return false;

         })
    
</script>
@endsection