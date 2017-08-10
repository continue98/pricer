<?//session_start();
header( 'Content-Type: text/html; charset=utf-8' );
include('../template/connect.php');

//~ if($_SESSION['user']['id']==null)
	//~ die('Требуется авторизация');

$stmt = $db->prepare(
"SELECT date_buy,
  name,
  price,
  date_change
FROM pr_consumption, pr_consumption_clsf
WHERE pr_consumption.clsf_id = pr_consumption_clsf.id
ORDER BY date_buy DESC
LIMIT 300"
);
$stmt->execute(/*array($_SESSION['user']['id'])*/);
?>
<html>
<body>
<table border=1>
	<thead>
		<tr>
			<th class="header">Дата покупки</th>
			<th class="header">Товар</th>
			<th class="header">Цена</th>
			<th class="header">Дата ввода</th>
		</tr>
	</thead>
	<tbody>
	<? foreach($stmt->fetchAll() as $k => $v){ ?>
		<tr>
			<td><?=$v['date_buy']?></td>
			<td><?=$v['name']?></td>
			<td><?=$v['price']?></td>
			<td><?=$v['date_change']?></td>
		</tr>
	<? } ?>
	</tbody>
</table>
</body>
</html>