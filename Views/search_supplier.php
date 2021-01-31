			<div class="col-10 content">
				<!--- Row form busca e menu button--->
				<div class="row serach_button">
					<div class="col-4">
						
						<form method="POST" action="<?php echo BASE_URL; ?>/supplier/search">
							<div class="input-group">
							    <input type="text" name="search" class="form-control" placeholder="Buscar nome e cidade">
							    <div class="input-group-append">
							        <button type="submit" class="btn btn-secondary">
							            <i class="fa fa-search"></i>
							        </button>
							    </div>
							</div>
						</form>
					</div><br/>
					<!--- Menu button --->
					<div class="col-6">
						<a href="<?php echo BASE_URL; ?>/supplier/insert"><button type="button" class="btn btn-primary">Inserir fornecedor</button></a>
					</div>
				</div>
				<!-- ./ Row form busca e menu button -->
				<!-- Tabela -->
				<div class="col-12">
					<h3>Fornecedores</h3>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover table-sm">
							<thead class="thead-light">
								<tr>
									<th>Nome</th>
									<th>CNPJ</th>
									<th>Telefone</th>
									<th>Email</th>
									<th>Cidade</th>
									<th>Rua</th>
									<th>Bairro</th>
									<th>Número</th>
									<th>Estado</th>
									<th>Editar</th>
									<th>Deletar</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($result)): ?>
									<?php foreach($result as $info_supplier): ?>
										<tr>
											<td><?php echo $info_supplier['name']; ?></td>
											<td><?php echo $info_supplier['cnpj']; ?></td>
											<td><?php echo $info_supplier['phone']; ?></td>
											<td><?php echo $info_supplier['email']; ?></td>
											<td><?php echo $info_supplier['city']; ?></td>
											<td><?php echo $info_supplier['address']; ?></td>
											<td><?php echo $info_supplier['neighborhood']; ?></td>
											<td><?php echo $info_supplier['number_address']; ?></td>
											<td>
												<?php echo $supplier->select_state_from_supplier($info_supplier['id_state']); ?>	
											</td>
											<td><form method="GET" action="<?php echo BASE_URL; ?>/supplier/edit/<?php echo $info_supplier['id']; ?>">
													<!-- Button trigger modal editar -->
													<button type="input" formmethod="post" name="id" value="<?php echo $info_supplier['id']; ?>" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" title="Editar">
												  		<i class="fa fa-edit"></i>
													</button>
												</form>
											</td>
											<td><form method="POST" action="<?php echo BASE_URL; ?>/supplier/delete">
													<!-- Button trigger modal excluir -->
													<button type="input" formmethod="post" name="id_supplier" value="<?php echo $info_supplier['id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" title="Excluir">
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
				<!-- Modal -->
					<div class="modal fade" id="excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Realmente deseja exluir?</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div>
				<!--- ./Modal --->
			</div>
		</div>