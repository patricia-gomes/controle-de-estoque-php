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
					<div class="col-6">
						<a href="<?php echo BASE_URL; ?>/supplier/insert"><button type="button" class="btn btn-primary">Inserir fornecedor</button></a>
					</div>
				</div>
				<!-- ./ Row form busca e menu button -->
				<!-- Tabela -->
				<div class="col-7">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover table-sm">
							<thead class="thead-light">
								<tr>
									<th>Nome</th>
									<th>CNPJ</th>
									<th>Editar</th>
									<th>Deletar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Maicon Hugo</td>
									<td>15.174.045/0001-50</td>
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
								<tr>
									<td>Canon Moa LTDA</td>
									<td>14.405.276/0001-64</td>
									<td><form method="POST">
											<!-- Button trigger modal editar -->
											<button type="submit" formmethod="post" name="editar" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" title="Editar">
										  		<i class="fa fa-edit"></i>
											</button>
										</form>
									</td>
									<td><form method="POST">
											<!-- Button trigger modal excluir -->
											<button type="input"  name="excluir" class="btn btn-danger" data-toggle="modal" data-target="#excluir" title="Excluir" value="2">
										  		<i class="fa fa-trash-o"></i>
											</button>
										</form>
									</td>
								</tr>
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