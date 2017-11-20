@extends('homes.lcr')

@section('title','登录')


@section('content')

	<div class="login-box">
    <h3 class="title">
        登录商城
    </h3>
    <br>
    <div class="clear">
    </div>
    <div class="login-form">
        <form action="/home/login" method="post">
            <div class="user-name">
                <label for="user">
                    <i class="am-icon-user">
                    </i>
                </label>
                <input type="text" name="username"   id="phone" placeholder="请输入手机号">
            </div>
             <div id="phonemsg" class="yanzheng">

             </div>
            <br>
            <div class="user-pass">
                <label for="password">
                    <i class="am-icon-lock">
                    </i>
                </label>
                <input type="password" name="password" id="password" placeholder="请输入密码">
            </div>
            <div id="passwordmsg" class="yanzheng">

            </div>
    </div>
    <div class="login-links">
        <a href="/home/change" class="am-fr">
            忘记密码
        </a>
        <a href="/home/register" class="zcnext am-fr am-btn-default">
            注册
        </a>
        <br />
    </div>
    <div class="am-cf">

        {{ csrf_field() }} 

        <input type="submit" name="" id="submit" value="登 录" class="am-btn am-btn-primary am-btn-sm">


            <div class="partner">
              @if (session('status'))
              <p style="color:red">
                {{ session('status') }}
              @endif
              </p>
            </div>
    </div>
    </form>
</div>
@endsection

@section('js')
	<script type="text/javascript">
		$('#phone').blur(function() 
		{		

			 checkTel($(this),$('#phonemsg'));

			 
		})
		$('#password').blur(function() 
				{		
					checkPassword($(this),$('#passwordmsg'), 6);

					 
				})
	</script>

@endsection