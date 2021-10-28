			<div class="col-10 content">
				<!-- Row form insert -->
				<div class="row panel">
					<div class="col-6">
						<h3>Inserir fornecedor</h3>	
						<form method="POST" action="<?php echo BASE_URL; ?>/supplier/register">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Nome do fornecedor</label>
									<input type="text" name="name" class="form-control" required="required">
							    </div>
							    <div class="form-group col-md-6">
									<label>CNPJ</label>
									<input type="text" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})"  data-input="cnpj" id="cnpj" name="cnpj" maxlength="18" class="form-control" placeholder="00.000.000/0000-00" required="required">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-8">
									<label>Endereço</label>
									<input type="text" name="address" class="form-control" required="required">
							    </div>
							    <div class="form-group col-md-4">
									<label for="exampleFormControlInput1">Número</label>
									<input type="number" name="number_address"  class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-8">
									<label>Bairro</label>
									<input type="text" name="neighborhood" class="form-control" required="required">
							    </div>
							    <div class="form-group col-md-4">
									<label>Celular</label>
									<input type="tel" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" maxlength="15" data-input="cel" name="phone" class="form-control" placeholder="(99) 99999-9999" required="required">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-6">
									<label for="exampleFormControlInput1">Cidade</label>
									<input type="text" name="city" class="form-control" required="required">
							    </div>
							    <div class="form-group col-md-6">
								    <label>Estado</label>
								    <select class="form-control" name="id_state" required="required">
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
									<label>Email</label>
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