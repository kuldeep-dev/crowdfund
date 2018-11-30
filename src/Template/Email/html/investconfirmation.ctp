<!doctype html>
<html lang="en">
	<head>
	</head>
	<body>
		<table style="width:600px; background-color:#f2f2f2; margin:auto; border-collapse:collapse;">
			<thead>
				<tr>
					<th style="padding:15px 15px; text-align:center; font-size:31px; text-transform: uppercase;">Logo</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<h1 style="text-align: center; text-transform: uppercase; font-family: sans-serif; font-weight: 900; color:#848484;">Payment Success</h1>
					</td>
				</tr>
				<tr>
					<td><div class="checked" style="display:block; height:75px; width:25px; border-bottom:10px solid #6cd41e; border-right:10px solid #6cd41e; transform:rotate(45deg); -webkit-transform:rotate(45deg); -moz-transform:rotate(45deg); -ms-transform:rotate(45deg); -o-transform:rotate(45deg); margin:auto; margin-bottom:30px;"></div></td>
				</tr>
				<tr>
					<td style="padding: 5px 15px; font-size: 14px; font-family: sans-serif; text-align: center;"><strong>Compaign Name</strong>: <?php if(isset($invest['campaign']['name'])){ echo $invest['campaign']['name']; } ?></td>
				</tr>
				<tr>
					<td style="padding: 5px 15px; font-size: 14px; font-family: sans-serif; text-align: center;"><strong>Payment Invested</strong>: $<?php echo $invest['amount'] ?></td>
				</tr>
				<tr>
					<td style="padding: 5px 15px; font-size: 14px; font-family: sans-serif; text-align: center;"><strong>Payment Date</strong>: <?php echo date("d-m-Y", strtotime($invest['created'])); ?></td>
				</tr>
				<tr>
					<td style="padding: 5px 15px; font-size: 14px; font-family: sans-serif; text-align: center;"><strong>Payment Mode</strong>: <?php echo $invest['payment_mode'] ?></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td style="padding:15px 15px; font-size: 12px; font-family: sans-serif; text-align:center; ">&copy; Arowcrowdfund</td>
				</tr>
			</tfoot>
		</table>
	</body>
</html>