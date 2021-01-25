<!----Content---->
			<div class="col-10 content">
				<?php if(!empty($all_dados)) : ?>
				<!--- Row form busca e menu button--->
				<div class="row serach_button">
					<div class="col-4">
						
						<form>
							<div class="input-group">
							    <input type="search" class="form-control" placeholder="Pesquisar produto">
							    <div class="input-group-append">
							        <button class="btn btn-secondary" type="submit">
							            <i class="fa fa-search"></i>
							        </button>
							    </div>
							</div>
						</form>
					</div><br/><br/>
				</div>
				<!-- ./ Row form busca e menu button -->
				<!-- Row Table Exit -->
				<div class="row panel">
					<div class="col-7">
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
									<?php foreach($all_dados as $info): ?>
										<tr>
											<td><?php echo $info['name_product']; ?></td>
											<td><?php echo $info['date_exit']; ?></td>
											<td><?php echo "R$ ".$helper->replace_point_in_comma($info['value_product']); ?></td>
											<td><?php echo $info['quant_exit']; ?></td>
											<td><?php echo "R$ ".$helper->replace_point_in_comma($info['value_total']); ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<!--- 2ºTabela -->
						<div class="row">
							<div class="col-5">
								<table class="table table-bordered table-striped table-sm">
									<thead class="thead-black">
										<tr>
											<th>Itens</th>
											<th>Quant total</th>
											<th>Valor total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $itens_total; ?></td>
											<td><?php echo $quant_total; ?></td>
											<td><?php echo $value_total; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!--- ./2ºTabela -->
					</div>
				</div><br/><br/>
				<!-- ./Row Table Exit -->
			</div>
			<?php else: ?>
				<p>Nenhuma saída foi realizada!!</p>
			<?php endif; ?>
		</div>