			<div class="col-10 content">
				<!-- Row form insert -->
				<div class="row panel">
					<div class="col-6">
						<h3>Inserir fornecedor</h3>	
						<form method="POST" action="<?php echo BASE_URL; ?>/supplier/register">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="exampleFormControlInput1">Nome do fornecedor</label>
									<input type="text" name="name" class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							    <div class="form-group col-md-6">
									<label for="exampleFormControlInput1">CNPJ</label>
									<input type="text" name="cnpj" class="form-control" id="exampleFormControlInput1" placeholder="15.174.045/0001-51" required="required">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-8">
									<label for="exampleFormControlInput1">Endereço</label>
									<input type="text" name="address" class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							    <div class="form-group col-md-4">
									<label for="exampleFormControlInput1">Número</label>
									<input type="number" name="number_address"  class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-8">
									<label for="exampleFormControlInput1">Bairro</label>
									<input type="text" name="neighborhood" class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							    <div class="form-group col-md-4">
									<label for="exampleFormControlInput1">Telefone</label>
									<input type="tel" name="phone" class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
									<label for="exampleFormControlInput1">Cidade</label>
									<input type="text" name="city" class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							    <div class="form-group col-md-6">
								    <label for="exampleFormControlSelect1">Estado</label>
								    <select class="form-control" name="id_state" id="exampleFormControlSelect1" required="required">
								      <option></option>
								      	<?php if(!empty($states_all)):  ?>
								      		<?php foreach($states_all as $state): ?>
								     			<option value="<?php echo $state['id']; ?>"><?php echo $state['name_state']; ?></option>
								     		<?php endforeach; ?>
								     	<?php endif; ?>
								    </select>
								</div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
									<label for="exampleFormControlInput1">Email</label>
									<input type="email" name="email" class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							</div>
							<button type="input" class="btn btn-primary">Inserir fornecedor</button>
						</form>
					</div>
				</div><br/><br/>
				<!-- ./Row form insert -->
			</div>
		</div>