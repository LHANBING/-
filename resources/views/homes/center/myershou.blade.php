@extends('homes.layout.center')
@section('title','订单管理')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		
		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	
@endsection()

@section('content')

    @if(session('xgcg'))
       <span id='xgcg'></span>           
    @endif
    @if(session('xgsb'))
       <span id='xgsb'></span>           
    @endif
   

	<div class="user-order">
    <!--标题 -->
    <div class="am-cf am-padding">
        <div class="am-fl am-cf">
            <strong class="am-text-danger am-text-lg">
                我在售的二手闲置物品
            </strong>
        </div>
    </div>
    <hr>
    <div data-am-tabs="" class="am-tabs am-tabs-d2 am-margin">
        <!-- <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs" id="uls">
            <li class="am-active">
                <a href="#tab1">
                    所有订单
                </a>
            </li>
            <li>
                <a href="#tab2">
                    待付款
                </a>
            </li>
            <li>
                <a href="#tab3">
                    待发货
                </a>
            </li>
            <li>
                <a href="#tab4">
                    待收货
                </a>
            </li>
            <li>
                <a href="#tab5">
                    待评价
                </a>
            </li>
        </ul> -->
        <div class="am-tabs-bd">
            <div id="tab1" class="am-tab-panel am-fade am-in am-active">
                <div class="order-top">
                    <div class="th th-item">
                        商品
                    </div>
                    <div class="th th-price">
                        价格
                    </div>
                    <div class="th" style='width:140px'>
                        合计
                    </div>
                    <div class="th" style='width:110px'>
                        状态
                    </div>
                    <div class="th" style='width:90px'>
                      	发布时间
                    </div>
                    <div class="th" style='width:150px'>
                        交易操作
                    </div>
                </div>
                <div class="order-main">
                    <div class="order-list">
                        <!--不同状态订单-->
                        <div class="order-status3">
                            <div class="order-content">
                                <div class="order-left">

                                	@foreach($res as $k => $v) 
                                    <ul class="item-list">
                                        <li class="td td-item">
                                            <div class="item-pic">
                                                <a class="J_MakePoint" href="#">
                                  <img class="itempic J_ItemImg" src="http://ozstangaz.bkt.clouddn.com/{{$arr[$v->goods_id]}}">
                                                </a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-basic-info">
                                                    <p>{{$v->title}}</p>
                                                    <p>商品编号：{{$v->goodsbianhao}}</p>	
                                                    <p>商品分类：{{$v->typename}}/{{$v->typechildname}}</p>    
                                                    <p>发布城市: {{$v->address}}</p>          
                                                </div>
                                            </div>
                                        </li>
                                        <li class="td td-price">
                                            <div class="item-price">
                                                <p>{{$v->newprice}} 元</p>
                                                <del>原价:{{$v->oldprice}}元</del>
                                            </div>
                                        </li>
                                       <!--  <li class="td td-number">
                                            <div class="item-number">
                                                10元
                                                   
                                            </div>
                                        </li> -->
                                        <li class="td td-operation">
                                            <div class="item-amount">
                                            合计：{{$v->newprice + $v->transprice}} 元
                                            <p>含运费：<span>{{$v->transprice}} 元</span></p>
                                              </div>   
                                         </li>
                                        <!--  <li class="td td-operation">
                                            <div class="item-amount">
                                            上架中
                                            </div> 
                                         </li> -->
                                         <li class="td td-price">
                                            <div class="item-price" id="item-price{{$ress[$k]->id}}">
                                              @if($ress[$k]->status)
                                               		<span>上架中</span>
                                              @else
                                               		<p>已下架</p>
                                              @endif
                                            </div>
                                       	 </li>
                                       	 <li class="td td-price">
                                            <div class="item-price">
                                               {{$ress[$k]->created_at}}
                                            </div>
                                       	 </li>
                                       	 <li class="td td-price">
                            <div class="item-price" style='width:150px'>

                        @if($ress[$k]->status) 
		                 <button class="am-btn am-btn-danger xia{{$ress[$k]->id}}" onclick="xia({{$ress[$k]->id}})">下架</button>
		                @else
		                 <button class="am-btn am-btn-danger xia{{$ress[$k]->id}}" onclick="shang({{$ress[$k]->id}})">上架</button>
		                @endif


		                    <a href="/home/center/xiugaidata/{{$ress[$k]->id}}/edit"><button class="am-btn am-btn-danger">修改</button></a>



		                    <button id='shanchu{{$ress[$k]->id}}' class="am-btn am-btn-danger" onclick="shan({{$ress[$k]->id}})" style='margin-top:3px;'>删除</button>




		                    <a href="/home/listdetail/{{$ress[$k]->id}}"><button class="am-btn am-btn-danger" style='margin-top:3px;'>详情</button></a>
                            </div>
                    
                                       	 </li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<script>
function xia(id){
   		if(confirm('确定此次操作么?')){
   			$.get('/home/center/myersho/xiajia/'+id,{}, function(data){
   				
   				if(data==1){
   					$('#item-price'+id).text('已下架');
   					$('.xia'+id).text('上架');
   					$('.xia'+id).attr('onclick','shang('+id+')');

   				}else{
   					alert('失败请重试');
   				}
   			})
   			return true;
   		}else{
   			return false;
   		}
}
function shang(id){
   		if(confirm('确定此次操作么?')){
   			$.get('/home/center/myersho/shangjia/'+id,{}, function(data){
   				// console.log(data);
   				if(data==1){
   					$('#item-price'+id).text('上架中');
   					$('.xia'+id).text('下架');
   					$('.xia'+id).attr('onclick','xia('+id+')');
   				}else{
   					alert('失败请重试');
   				}
   			})
   			return true;
   		}else{
   			return false;
   		}
}

function shan(id){

	if(confirm('确定删除么?')){
		$.post('/home/center/myershou/'+id,{ '_method':'delete','_token':"{{csrf_token()}}"},function(data){
			if(data['status'] == 1){
				// layer.msg(data.info);
				if(confirm('真的删除了啊')){
					$('#shanchu'+id).parents('.item-list').remove();
				}
				
			}else{

			}
		})


	}
}
</script>	

<script>
  $('#xgcg').click(function(){
     layer.msg('恭喜您,修改成功!');
  }).trigger('click');
   $('#xgsb').click(function(){
     layer.msg('抱歉,修改失败,请重试!');
  }).trigger('click');
</script>
			

@endsection()