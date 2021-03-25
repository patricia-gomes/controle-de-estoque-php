<div class="col-10 content">
	<h3>Produtos que estão vencendo</h3><br/>
	<div class="row panel">
		<div class="col-6">
			<?php if(!empty($winning_products)): ?>
			<!----Tabela estoque--->
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-sm">
					<thead class="thead-light">
						<tr>
							<th>Produto</th>
							<th>Estoque</th>
							<th>Data de validade</th>
						</tr>
					</thead>
					<tbody>	
						<?php foreach($winning_products as $info): ?>
							<tr>
								<td><?php  echo $info['name_product']; ?></td>
								<td><?php echo $info['quant_days']; ?></td>
								<td><?php echo date('d/m/Y', strtotime($info['expirion_date'])); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<?php else: ?>
				<p>Nenhum produto com a validade vencendo!</p>
			<?php endif; ?>
		</div>
	</div>
</div>
<!--	<div class="col-4 validity" >
		<?php //if(!empty($winning_products)): ?>
			<ul><?php //foreach($winning_products as $expirion_date): ?>

				<?php //date_default_timezone_set('America/Porto_Velho'); ?>
				<?php //if($expirion_date['quant_days'] == 0): ?>
					<li>
					<?php //echo $expirion_date['name_product']." (vence hoje)"; ?></li>
				<?php// elseif($expirion_date['expirion_date'] < date('Y-m-d')): ?>
					<li><?php //echo $expirion_date['name_product']." (vencido)";	?></li>
				<?php //else: ?>
					<li><?php //echo $expirion_date['name_product']." (".$expirion_date['quant_days']." dias)"; ?></li>
				<?php //endif; ?>
			<?php //endforeach; ?></ul>
			<?php //else: ?>
				<ul><li>Nenhum produto com a validade vencendo!</li></ul>
		<?php //endif; ?>
	</div>
-->
</div>