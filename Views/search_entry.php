			<div class="col-10 content">
				<!--- Row form busca e menu button--->
				<div class="row serach_button">
					<div class="col-4">			
						<form method="POST" action="<?php echo BASE_URL; ?>/entry/search">
							<div class="input-group">
							    <input type="text" class="form-control" name="search" placeholder="Buscar produto e fornecedor">
							    <div class="input-group-append">
							        <button type="submit" class="btn btn-secondary" type="submit">
							            <i class="fa fa-search"></i>
							        </button>
							    </div>
							</div>
						</form>
					</div><br/>
				</div>
				<!-- ./ Row form busca e menu button -->
				<!-- Tabela -->
				<div class="row">
					<div class="col-9">
						<h3>Entradas</h3>
						<div class="table_overflow" class="table-responsive">
							<table class="table table-bordered table-striped table-hover table-sm">
								<thead class="thead-light">
									<tr>
										<th>Produto</th>
										<th>Fornecedor</th>
										<th>Data entrada</th>
										<th>Preço</th>
										<th>Quant</th>
										<th>Valor total</th>
										<th>Validade</th>
										<th>Saída</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($result)): ?>
										<?php foreach($result as $info): ?>
											<tr>
												<td><?php echo $info['name_product']; ?></td>
												<td><?php echo $info['name_supplier']; ?></td>
												<td><?php echo str_replace('-', '/', $info['date_time']); ?></td>
												<td><?php echo "R$ ".$helper->replace_point_in_comma($info['value_product']); ?></td>
												<td><?php echo $info['quant_product']; ?></td>
												<td><?php echo "R$ ".$helper->replace_point_in_comma($info['value_total']); ?></td>
												<td><?php echo str_replace('-', '/', $info['expirion_date']); ?></td>	
												<td>
													<form method="POST" action="<?php echo BASE_URL; ?>/exit/insert">
														<!-- Button Saída -->
														<button type="input" formmethod="post" name="id" value="<?php echo $info['id']; ?>" class="btn btn-primary" data-toggle="modal" data-target="#editar" title="Saída de estoque">
													  		<img src="<?php echo BASE_URL; ?>/assets/images/exit-stock.png" width="24" height="24" alt="imagem do botão de icone de saída de Estoque">
														</button>
													</form>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- ./Tabela -->
			</div>
		</div>