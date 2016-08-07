<?php include 'templates/head.php';?>
<div class="body">
    <h1>今日推荐列表</h1>
    <div class="form-group">
        <a href="/">首页</a>
    </div>
    <form class="form-group" method="get">
        <div class="row">
            <div class="form-group">
                <span class="">天数：</span>
                <select name="day" value="<?php echo $day ;?>">
                    <option value="2" <?php if($day == 2){ echo 'selected="selected"'; } ?>>2</option>
                    <option value="3" <?php if($day == 3){ echo 'selected="selected"'; } ?>>3</option>
                </select>
                <span class="">成交量0：</span>
                <select name="chengjiao0" value="<?php echo $chengjiao0 ;?>">
                    <option value="1.3" <?php if($chengjiao0 == 1.3){ echo 'selected="selected"'; } ?>>1.3</option>
                    <option value="1.2" <?php if($chengjiao0 == 1.2){ echo 'selected="selected"'; } ?>>1.2</option>
                    <option value="1.1" <?php if($chengjiao0 == 1.1){ echo 'selected="selected"'; } ?>>1.1</option>
                    <option value="1" <?php if($chengjiao0 == 1){ echo 'selected="selected"'; } ?>>1</option>
                    <option value="0.9" <?php if($chengjiao0 == 0.9){ echo 'selected="selected"'; } ?>>0.9</option>
                    <option value="0.8" <?php if($chengjiao0 == 0.8){ echo 'selected="selected"'; } ?>>0.8</option>
                    <option value="0.7" <?php if($chengjiao0 == 0.7){ echo 'selected="selected"'; } ?>>0.7</option>
                    <option value="0.6" <?php if($chengjiao0 == 0.6){ echo 'selected="selected"'; } ?>>0.6</option>
                </select>
                <span class="">成交量1：</span>
                <select name="chengjiao1" value="<?php echo $chengjiao1 ;?>">
                    <option value="1.6" <?php if($chengjiao1 == 1.6){ echo 'selected="selected"'; } ?>>1.6</option>
                    <option value="1.5" <?php if($chengjiao1 == 1.5){ echo 'selected="selected"'; } ?>>1.5</option>
                    <option value="1.4" <?php if($chengjiao1 == 1.4){ echo 'selected="selected"'; } ?>>1.4</option>
                    <option value="1.3" <?php if($chengjiao1 == 1.3){ echo 'selected="selected"'; } ?>>1.3</option>
                    <option value="1.2" <?php if($chengjiao1 == 1.2){ echo 'selected="selected"'; } ?>>1.2</option>
                    <option value="1.1" <?php if($chengjiao1 == 1.1){ echo 'selected="selected"'; } ?>>1.1</option>
                    <option value="1" <?php if($chengjiao1 == 1){ echo 'selected="selected"'; } ?>>1</option>
                </select>
            </div>
            <div class="form-group">
                <span class="">当日涨幅：</span>
                <select name="zhangfu0" value="<?php echo $zhangfu0 ;?>">
                    <option value="6" <?php if($zhangfu0 == 6){ echo 'selected="selected"'; } ?>>6</option>
                    <option value="5" <?php if($zhangfu0 == 5){ echo 'selected="selected"'; } ?>>5</option>
                    <option value="4" <?php if($zhangfu0 == 4){ echo 'selected="selected"'; } ?>>4</option>
                    <option value="3" <?php if($zhangfu0 == 3){ echo 'selected="selected"'; } ?>>3</option>
                    <option value="2" <?php if($zhangfu0 == 2){ echo 'selected="selected"'; } ?>>2</option>
                </select>
                <span class="">2日涨幅：</span>
                <select name="zhangfu2" value="<?php echo $zhangfu2 ;?>">
                    <option value="12" <?php if($zhangfu2 == 12){ echo 'selected="selected"'; } ?>>12</option>
                    <option value="11" <?php if($zhangfu2 == 11){ echo 'selected="selected"'; } ?>>11</option>
                    <option value="10" <?php if($zhangfu2 == 10){ echo 'selected="selected"'; } ?>>10</option>
                    <option value="9" <?php if($zhangfu2 == 9){ echo 'selected="selected"'; } ?>>9</option>
                    <option value="8" <?php if($zhangfu2 == 8){ echo 'selected="selected"'; } ?>>8</option>
                    <option value="7" <?php if($zhangfu2 == 7){ echo 'selected="selected"'; } ?>>7</option>
                </select>
                <span class="">3日涨幅：</span>
                <select name="zhangfu3" value="<?php echo $zhangfu3 ;?>">
                    <option value="17" <?php if($zhangfu3 == 17){ echo 'selected="selected"'; } ?>>17</option>
                    <option value="16" <?php if($zhangfu3 == 16){ echo 'selected="selected"'; } ?>>16</option>
                    <option value="15" <?php if($zhangfu3 == 15){ echo 'selected="selected"'; } ?>>15</option>
                    <option value="14" <?php if($zhangfu3 == 14){ echo 'selected="selected"'; } ?>>14</option>
                    <option value="13" <?php if($zhangfu3 == 13){ echo 'selected="selected"'; } ?>>13</option>
                    <option value="12" <?php if($zhangfu3 == 12){ echo 'selected="selected"'; } ?>>12</option>
                    <option value="11" <?php if($zhangfu3 == 11){ echo 'selected="selected"'; } ?>>11</option>
                    <option value="10" <?php if($zhangfu3 == 10){ echo 'selected="selected"'; } ?>>10</option>
                    <option value="9" <?php if($zhangfu3 == 9){ echo 'selected="selected"'; } ?>>9</option>
                </select>
            </div>
            <div class="form-group">
                <span class="">最低价：</span>
                <select name="zuidi" value="<?php echo $zuidi ;?>">
                    <option value="9" <?php if($zuigao == 9){ echo 'selected="selected"'; } ?>>9</option>
                    <option value="7" <?php if($zuigao == 7){ echo 'selected="selected"'; } ?>>7</option>
                    <option value="5" <?php if($zuigao == 5){ echo 'selected="selected"'; } ?>>5</option>
                </select>
                <span class="">最高价：</span>
                <select name="zuigao" value="<?php echo $zuigao ;?>">
                    <option value="30" <?php if($zuigao == 30){ echo 'selected="selected"'; } ?>>30</option>
                    <option value="25" <?php if($zuigao == 25){ echo 'selected="selected"'; } ?>>25</option>
                    <option value="20" <?php if($zuigao == 20){ echo 'selected="selected"'; } ?>>20</option>
                    <option value="15" <?php if($zuigao == 15){ echo 'selected="selected"'; } ?>>15</option>
                    <option value="10" <?php if($zuigao == 10){ echo 'selected="selected"'; } ?>>10</option>
                    <option value="250" <?php if($zuigao == 250){ echo 'selected="selected"'; } ?>>250</option>
                </select>
            </div>
        </div>

        <button class="btn btn-default" type="submit">查询</button>
        <span>共<?php echo count($tui_jian) ?>条数据</span>
    </form>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                代码
            </th>
            <th>
                名称
            </th>
            <th>
                今天
            </th>
            <th>
                昨天
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tui_jian as $stock): ?>
            <tr>
                <td>
                    <?php echo substr($stock['code'], 2); ?>
                </td>
                <td>
                    <?php echo $stock['name']; ?>
                </td>
                <td>
                    <div><?php echo number_format($stock['day0'] / 100000, 0); ?></div>
                    <div><?php echo number_format($stock['day0'] / $stock['day1'], 2); ?></div>
                </td>
                <td>
                    <div><?php echo number_format($stock['day1'] / 100000, 0); ?></div>
                    <div><?php echo number_format($stock['day1'] / $stock['day2'], 2); ?></div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <script>

    </script>
</div>
