<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include 'templates/head.php';?>
<body>

<div class="body">
	<div class="form-group">
		<a href="/stock_list">股票列表</a>
	</div>
	<div class="form-group">
		<a href="/zui_xin">最新价列表</a>
	</div>
	<div class="form-group">
		<a href="/zhang_fu">涨幅列表</a>
	</div>
	<div class="form-group">
		<a href="/cheng_jiao">成交量列表</a>
	</div>
	<div class="form-group">
		<a href="/cheng_jiao30">30日成交量列表</a>
	</div>
	<div class="form-group">
		<a href="/tui_jian?day=3&chengjiao0=0.6&chengjiao1=1&zuidi=7&zuigao=25&zhangfu0=5&zhangfu2=8&zhangfu3=10">今日推荐</a>
	</div>
	<div class="form-group">
		<span>服务器通信状态：</span>
		<span id="server_status"></span>
	</div>
	<div class="form-group">
		<span>更新股票列表数据状态：</span>
		<span id="update_stock_status"></span>
	</div>
	<div class="form-group">
		<span>更新今日数据状态：</span>
		<span id="update_data_status"></span>
	</div>
	<div class="form-group">
		<span>备份数据状态：</span>
		<span id="backup_status"></span>
	</div>
	<div class="form-group">
		<button id="backup" class="btn btn-default">备份数据</button>
		<button id="update" class="btn btn-default">更新今日数据</button>
	</div>
	<div>
		<?php
//		echo '2' + '2';
		?>
	</div>
</div>
<script>
	$.ajax({
		url: '/stock_list/check_server_status',
		cache: false,
		timeout: 60 * 1000,
		success: function (data) {
			$('#server_status').html('与服务器通信正常！');
		},
		error: function () {
			$('#server_status').html('请求数据失败！');
		}
	});

	$.ajax({
		url: '/stock_list/check_update_stock_status',
		cache: false,
		timeout: 60 * 1000,
		success: function (data) {
			if (data == 'ok') {
				$('#update_stock_status').html('已完成！');
			} else {
				$('#update_stock_status').html('正在执行中！');
			}
		},
		error: function () {
			$('#server_status').html('请求数据失败！');
		}
	});

	$.ajax({
		url: '/stock_list/check_update_data_status',
		cache: false,
		timeout: 60 * 1000,
		success: function (data) {
			if (data == 'ok') {
				$('#update_data_status').html('已完成！');
			} else {
				$('#update_data_status').html('正在执行中！');
			}
		},
		error: function () {
			$('#server_status').html('请求数据失败！');
		}
	});

	$.ajax({
		url: '/stock_list/check_backup_status',
		cache: false,
		timeout: 60 * 1000,
		success: function (data) {
			if (data == 'ok') {
				$('#backup_status').html('已完成！');
			} else {
				$('#backup_status').html('正在执行中！');
			}
		},
		error: function () {
			$('#server_status').html('请求数据失败！');
		}
	});

	$('#backup').on('click', function () {
		if (confirm('确定要备份数据？')) {
			$.ajax({
				url: '/stock_list/back_up',
				cache: false,
				timeout: 10 * 60 * 1000,
				success: function (data) {
					window.location.reload();
				},
				error: function () {
					$('#server_status').html('请求数据失败！');
				}
			});
		}
	});
	$('#update').on('click', function () {
		if (confirm('确定要更新今日数据？')) {
			updateStockData();
		}
	});

	function updateStockData() {
		$.ajax({
			url: '/stock_list/update_stock_data',
			cache: false,
			timeout: 10 * 60 * 1000,
			success: function (data) {
				console.log(data);
				if (data == 0) {
					alert('更新股票代码数据成功！');
				}
			},
			error: function () {
				$('#server_status').html('请求数据失败！');
			}
		});
	}

	setTimeout(function () {
		window.location.reload();
	}, 10 * 60000);
</script>
</body>
</html>
