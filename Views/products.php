			<div class="col-10 content">
				<!--- Row form busca e menu button--->
				<div class="row serach_button">
					<div class="col-4">
						
						<form>
							<div class="input-group">
							    <input type="text" class="form-control" placeholder="Pesquisar...">
							    <div class="input-group-append">
							        <button class="btn btn-secondary" type="submit">
							            <i class="fa fa-search"></i>
							        </button>
							    </div>
							</div>
						</form>
					</div><br/><br/>
					<!--- Menu button --->
					<div class="col-5">
						<a href="<?php echo BASE_URL; ?>/products/insert"><button type="button" class="btn btn-primary">Inserir produto</button></a>
					</div>
				</div>
				<!-- ./ Row form busca e menu button -->
				<!-- Tabela -->
				<div class="col-7">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover table-sm">
							<thead class="thead-light">
								<tr>
									<th>Produto</th>
									<th>Preço</th>
									<th>Editar</th>
									<th>Deletar</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($all_products)): ?>
									<?php foreach($all_products as $product): ?>
									<tr>
										<td><?php echo $product['name']; ?></td>
										<td><?php echo $helper->replace_point_in_comma($product['value_medium']); ?></td>
										<td><form method="POST">
												<!-- Button trigger modal editar -->
												<button type="submit" formmethod="post" name="editar" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" title="Editar">
											  		<i class="fa fa-edit"></i>
												</button>
											</form>
										</td>
										<td><form method="POST">
												<!-- Button trigger modal excluir -->
												<button type="submit" formmethod="post" name="excluir" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" title="Excluir">
											  		<i class="fa fa-trash-o"></i>
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
				<!-- ./Tabela -->
			</div>
		</div>