@extends('homes.layout.center')
@section('title','账单明细')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/bilstyle.css" rel="stylesheet" type="text/css">

		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

@endsection()

@section('content')


					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账单明细</strong> / <small>Electronic&nbsp;bill</small></div>
					</div>
					<hr>

					<!--交易时间	-->

					<div class="order-time">
						<label class="form-label">交易时间：</label>
						<div class="show-input">
							<select data-am-selected="" class="am-selected" style="display: none;">
								<option value="today">今天</option>
								<option selected="" value="sevenDays">最近一周</option>
								<option value="oneMonth">最近一个月</option>
								<option value="threeMonths">最近三个月</option>
								<option class="date-trigger">自定义时间</option>
							</select><div data-am-dropdown="" id="am-selected-kjum8" class="am-selected am-dropdown ">  <button class="am-selected-btn am-btn am-dropdown-toggle am-btn-default" type="button">    <span class="am-selected-status am-fl">最近一周</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li data-value="today" data-group="0" data-index="0" class="">         <span class="am-selected-text">今天</span>         <i class="am-icon-check"></i></li>                                 <li data-value="sevenDays" data-group="0" data-index="1" class="am-checked">         <span class="am-selected-text">最近一周</span>         <i class="am-icon-check"></i></li>                                 <li data-value="oneMonth" data-group="0" data-index="2" class="">         <span class="am-selected-text">最近一个月</span>         <i class="am-icon-check"></i></li>                                 <li data-value="threeMonths" data-group="0" data-index="3" class="">         <span class="am-selected-text">最近三个月</span>         <i class="am-icon-check"></i></li>                                 <li data-value="自定义时间" data-group="0" data-index="4" class="">         <span class="am-selected-text">自定义时间</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
						</div>
                          <div class="clear"></div>
					</div>

					<table width="100%">

						<thead>
							<tr>
								<th class="memo"></th>
								<th class="time">创建时间</th>
								<th class="name">名称</th>
								<th class="amount">金额</th>
								<th class="action">操作</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td class="img">
									<i><img src="/homes/images/songzi.jpg"></i>
								</td>
								<td class="time">
									<p> 2016-01-28
									</p>
									<p class="text-muted"> 10:58
									</p>
								</td>
								<td class="title name">
									<p class="content">
										良品铺子精选松子，即开即食全国包邮
									</p>
								</td>

								<td class="amount">
									<span class="amount-pay">- 11.90</span>
								</td>
								<td class="operation">
									删除
								</td>
							</tr>

							<tr>

								<td class="img">
									<i><img src="/homes/images/songzi.jpg"></i>
								</td>
								<td class="time">
									<p> 2016-01-28
									</p>
									<p class="text-muted"> 10:58
									</p>
								</td>
								<td class="title name">
									<p class="content">
										良品铺子精选松子，即开即食全国包邮
									</p>
								</td>

								<td class="amount">
									<span class="amount-pay">- 11.90</span>
								</td>
								<td class="operation">
									删除
								</td>
							</tr>
						</tbody>
					</table>
				
					<script type="text/javascript">
						$(document).ready(function() {
							$(".date-trigger").click(function() {
								$(".show-input").css("display", "none");
							});
							
						 })
					</script>					
					
				
			

@endsection()