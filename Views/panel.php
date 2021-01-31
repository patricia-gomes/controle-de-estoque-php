			<!----Content---->
			<div class="col-10 content">
				<div class="row panel justify-content-center">
					<div class="col-4">
						<!---Painel de alerta 1--->
						<div class="alert_panel">
							<div class="alert_panel_title">Estoque em baixa</div>
							<div class="alert_panel_content">
								<?php if(!empty($low_stock)): ?>
									<ul><?php foreach($low_stock as $low): ?>
										<li>
											<?php echo $low['name_product']." (".$low['quant_product'],")"; ?>
										</li>
									<?php endforeach; ?></ul>
								<?php else: ?>
									<ul><li>Nenhum produto a baixo do estoque!</li></ul>
								<?php endif; ?>
							</div>
						</div>
						<!---->
					</div>
					<div class="col-4">
						<!---Painel de alerta 2--->
						<div class="alert_panel">
							<div class="alert_panel_title">Validade vencendo</div>
							<div class="alert_panel_content">
								<?php if(!empty($winning_products)): ?>
								<ul><?php foreach($winning_products as $expirion_date): ?>

									<?php date_default_timezone_set('America/Porto_Velho'); ?>
									<?php if($expirion_date['quant_days'] == 0): ?>
										<li>
										<?php echo $expirion_date['name_product']." (vence hoje)"; ?></li>
									<?php elseif($expirion_date['expirion_date'] < date('Y-m-d')): ?>
										<li><?php echo $expirion_date['name_product']." (vencido)";	?></li>
									<?php else: ?>
										<li><?php echo $expirion_date['name_product']." (".$expirion_date['quant_days']." dias)"; ?></li>
									<?php endif; ?>
								<?php endforeach; ?></ul>
								<?php else: ?>
									<ul><li>Nenhum produto com a validade vencendo!</li></ul>
								<?php endif; ?>
							</div>
						</div>
						<!---->
					</div>
				</div>
				<!----Tabela estoque--->
				<div class="row justify-content-center">
					<div class="col-6">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover table-sm">
								<thead class="thead-light">
									<tr>
										<th>Produto</th>
										<th>Estoque</th>
										<th>Preço</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($all_entry)): ?>
										<?php foreach($all_entry as $info): ?>
											<tr>
												<td><?php  echo $info['name_product']; ?></td>
												<td><?php echo $info['quant_product']; ?></td>
												<td><?php  echo "R$ ".number_format($info['value_product'], 2, ',', '.'); ?></td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>