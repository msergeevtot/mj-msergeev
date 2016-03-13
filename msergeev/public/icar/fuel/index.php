<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Топливо");

use MSergeev\Packages\Icar\Lib;
if (isset($_REQUEST['car']) && intval($_REQUEST['car'])>0)
{
	$carID = intval($_REQUEST['car']);
}
else
{
	$carID = Lib\MyCar::getDefaultCarID();
}

if (!isset($_REQUEST['page']))
{
	$page = 1;
}
else
{
	$page = intval($_REQUEST['page']);
}
?>
<p>Статистика для: <? echo Lib\MyCar::showSelectCars("my_car",$carID,'class="myCar"'); ?><br>
Общие затраты на топливо: <? echo Lib\Fuel::getTotalFuelCostsFormatted($carID); ?> руб.<br>
Средний расход топлива: <? echo Lib\MyCar::getCarAverageFuelFormatted($carID); ?> л./100км.<br>
Всего израсходованно топлива: <? echo Lib\MyCar::getCarTotalSpentFuelFormatted($carID); ?> л.<br><br></p>
<p><a href="add.php?car=<?=$carID?>">Добавить запись</a><br><br></p>

<? /*
<div class="listFuel">
	<?=Lib\Fuel::showListTable($carID,"listFuel",true);?>
</div>
 */
//\MSergeev\Core\Lib\Webix::showDataTable($arData);
Lib\Fuel::showListTable($carID);
?>
<div id="testA"></div>

<script type="text/javascript">
	/*
	$.post(
		"<? //=\MSergeev\Core\Lib\Config::getConfig("ICAR_TOOLS_ROOT").'show_list_table.php'?>//",
		{
			brand_id: brand_id
		},
		function(data) {
			console.log(data);
			if (data.status == 'ok')
			{
				$('.td_model').html(data.select);
			}
			else
			{
				$('.td_model').html('<? //=InputType('text','car_model_text','','',false,'','class="car_model_text"')?>//');

			}
		},
		"json"
	);
*/
</script>
<?
/*
<table class="listTable">
	<thead>
	<tr>
		<td>Дата</td>
		<td>Марка топлива</td>
		<td>Сумма,<br>руб.</td>
		<td>Литраж,<br>л.</td>
		<td>Цена за литр,<br>руб.</td>
		<td>Расход,<br>л./100км.</td>
		<td>Пробег,<br>км.</td>
		<td>Путевая точка</td>
		<td>Полный бак</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	</thead>
	<tbody class="listBody">
	<? //$arFuelList = CInvestToCarMain::GetFuelList ($defaultCar); ?>
	<? //foreach($arFuelList as $arFuel):?>
		<tr>
			<td><? //=date("d.m.Y",$arFuel["date"])?></td>
			<td><? //=CInvestToCarMain::GetFuelMarkByID($arFuel["fuel_mark"],true)?></td>
			<td><? //=number_format($arFuel["summ"],2)?></td>
			<td><? //=$arFuel["liter"]?></td>
			<td><? //=number_format($arFuel["liter_cost"],2)?></td>
			<td><? //=(floatval($arFuel["expense"])>0)?floatval($arFuel["expense"]):"-"?></td>
			<td><? //=$arFuel["odo"]?></td>
			<? //$arPoint = CInvestToCarMain::GetPointInfoByID($arFuel["point"]); ?>
			<td><? //=$arPoint["name"]?></td>
			<td><? //=(intval($arFuel["full"])>0)?"+":"-"?></td>
			<td>(i)</td>
			<td><a href="edit.php?id=<? ///=$arFuel["id"]?>"><img src="/msergeev/images/edit.png"></a></td>
			<td><a href="delete.php?id=<? //=$arFuel["id"]?>"><img src="/msergeev/images/del.png"></a></td>
		</tr>
	<?//endforeach;?>
	</tbody>
</table>
*/ ?>

<p><a href="add.php?car=<?=$carID?>">Добавить запись</a><br><br></p>
<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("icar")."include/footer.php"); ?>
