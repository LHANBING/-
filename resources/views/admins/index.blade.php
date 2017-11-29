@extends('admins.layout.admins')

@section('title','后台首页')

@section('content')


  <span id="dvs"></span>

@endsection()


@section('js')
<style> 
#dvs1{
    float: right;
}
</style>
    
     <script type="text/javascript">
            var dvs = document.getElementById('dvs');
            //定时器
            setInterval(function(){

            //获取当前时间
            var d = new Date();
            //自定义时间
            // var d = new Date('2017-09-22 12:12:12');
            // console.log(d);
            //获取年份
            var y = d.getFullYear();
            //获取月份
            var m = d.getMonth()+1;    //0-11 月份是
            if(m<10){
                m = "0" + m;
            }
            //获取天
            var t = d.getDate();
            if(t<10){
                t = "0" + t;
            }
            //获取小时
            var h = d.getHours();       //24时制
            if(h<10){
                h = "0" + h;
            }
            //获取分钟
            var i = d.getMinutes();
            if(i<10){
                i = "0" + i;
            }
            //获取秒
            var s = d.getSeconds();
            if(s<10){
                s = "0" + s;
            }
            //获取星期
            var w = d.getDay();
            switch(w){
                case 1:
                    w = 'Monday';
                break;
                case 2:
                    w = 'Tuesday';
                break;
                case 3:
                    w = 'Wednesday';
                break;
                case 4:
                    w = 'THursday';
                break;
                case 5:
                    w = 'Friday';
                break;
                case 6:
                    w = 'Saturday';
                break;
                case 0:
                    w = 'Sunday';
                break;

            }
            dvs.innerHTML = '现在时间 : '+y+'-'+m+'-'+t+' '+h+':'+i+':'+s+' '+w ; 
            },1000)
        </script>

@endsection()