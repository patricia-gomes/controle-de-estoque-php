			<div class="col-10 content">
				<!--- Row form busca e menu button--->
				<div class="row serach_button">
					<div class="col-4">
						
						<form>
							<div class="input-group">
							    <input type="search" class="form-control" placeholder="Pesquisar...">
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
				<!-- Row form insert -->
				<div class="row panel">
					<div class="col-6">
						<form method="POST" action="<?php echo BASE_URL; ?>/supplier/update">
							<?php if(!empty($data_supplier)): ?>
								<?php foreach($data_supplier as $info_supplier): ?>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="exampleFormControlInput1">Nome do fornecedor</label>
											<input type="text" name="name" value="<?php echo $info_supplier['name']; ?>" class="form-control" id="exampleFormControlInput1" required="required">
									    </div>
									    <div class="form-group col-md-6">
											<label for="exampleFormControlInput1">CNPJ</label>
											<input type="text" name="cnpj" value="<?php echo $info_supplier['cnpj']; ?>" class="form-control" id="exampleFormControlInput1" placeholder="15.174.045/0001-51" required="required">
									    </div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-8">
											<label for="exampleFormControlInput1">Endereço</label>
											<input type="text" name="address" value="<?php echo $info_supplier['address']; ?>" class="form-control" id="exampleFormControlInput1" required="required">
									    </div>
									    <div class="form-group col-md-4">
											<label for="exampleFormControlInput1">Número</label>
											<input type="number" name="number_address" value="<?php echo $info_supplier['number_address']; ?>" class="form-control" id="exampleFormControlInput1" required="required">
									    </div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-8">
											<label for="exampleFormControlInput1">Bairro</label>
											<input type="text" name="neighborhood" value="<?php echo $info_supplier['neighborhood']; ?>" class="form-control" id="exampleFormControlInput1" required="required">
									    </div>
									    <div class="form-group col-md-4">
											<label for="exampleFormControlInput1">Telefone</label>
											<input type="tel" name="phone" value="<?php echo $info_supplier['phone']; ?>" class="form-control" id="exampleFormControlInput1" required="required">
									    </div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-6">
											<label for="exampleFormControlInput1">Cidade</label>
											<input type="text" name="city" value="<?php echo $info_supplier['city']; ?>" class="form-control" id="exampleFormControlInput1" required="required">
									    </div>
									    <div class="form-group col-md-6">
										    <label for="exampleFormControlSelect1">Estado</label>
										    <select class="form-control" name="id_state" id="exampleFormControlSelect1" required="required">
										    	
											      	<option value="<?php echo $info_supplier['id_state']; ?>">
											      		<?php echo $supplier->select_state_from_supplier($info_supplier['id_state']); ?>	
											      	</option>
										
										      	<?php if(!empty($states_all)):  ?>
										      		<?php foreach($states_all as $state): ?>
										     			<option value="<?php echo $state['id']; ?>">
										     				<?php echo $state['name_state']; ?></option>
										     		<?php endforeach; ?>
										     	<?php endif; ?>
										    </select>
										</div>
									</div>
									<div class="form-row">
									    <div class="form-group col-md-6">
											<label for="exampleFormControlInput1">Email</label>
											<input type="email" name="email" value="<?php echo $info_supplier['email']; ?>" class="form-control" id="exampleFormControlInput1" required="required">
									    </div>
									</div>
									<input type="hidden" name="id_supplier" value="<?php echo $info_supplier['id']; ?>">
								<?php endforeach; ?>
								<button type="input" class="btn btn-primary">Editar fornecedor</button>
							<?php endif; ?>
						</form>
					</div>
				</div><br/><br/>
				<!-- ./Row form insert -->
			</div>
		</div>