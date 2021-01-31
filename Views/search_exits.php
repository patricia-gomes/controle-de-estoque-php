<!----Content---->
			<div class="col-10 content">
				<!--- Row form busca e menu button--->
				<div class="row serach_button">
					<div class="col-4">						
						<form method="POST" action="<?php echo BASE_URL; ?>/exit/search">
							<div class="input-group">
							    <input type="search" name="search" class="form-control" placeholder="Pesquisar produto">
							    <div class="input-group-append">
							        <button type="submit" class="btn btn-secondary">
							            <i class="fa fa-search"></i>
							        </button>
							    </div>
							</div>
						</form>
					</div>
				</div>
				<!-- ./ Row form busca e menu button -->
				<!-- Row Table Exit -->
				<div class="row panel">
					<div class="col-7">
						<h3>Saídas</h3>
						<div class="table_overflow" class="table-responsive">
							<table class="table table-bordered table-striped table-hover table-sm">
								<thead class="thead-light">
									<tr>
										<th>Nome</th>
										<th>Data de saída</th>
										<th>Preço</th>
										<th>Quantidade</th>
										<th>Valor total</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($result)) : ?>
									<?php foreach($result as $info): ?>
										<tr>
											<td><?php echo $info['name_product']; ?></td>
											<td><?php echo str_replace('-', '/', $info['date_exit']); ?></td>
											<td><?php echo "R$ ".$helper->replace_point_in_comma($info['value_product']); ?></td>
											<td><?php echo $info['quant_exit']; ?></td>
											<td><?php echo "R$ ".$helper->replace_point_in_comma($info['value_total']); ?></td>
										</tr>
									<?php endforeach; ?>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div><br/><br/>
				<!-- ./Row Table Exit -->
			</div>			
		</div>