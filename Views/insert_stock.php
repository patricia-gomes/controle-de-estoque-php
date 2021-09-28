			<div class="col-10 content">
				<!-- Row form insert -->
				<div class="row panel">
					<div class="col-6">
						<h2>Inserir no estoque</h2>
						<form method="POST" action="<?php echo BASE_URL; ?>/stock/insert">	
							<?php if(!empty($info_supplier)): ?>
								<div class="form-row">
									 <div class="form-group col-md-5">
										<label for="exampleFormControlInput1">Fornecedor
										</label>
										<select class="form-control" name="id_supplier" id="exampleFormControlSelect1" required="required">
											<option></option>
										<?php foreach($info_supplier as $index => $supplier): ?>
											<option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['name']; ?></option>
										<?php endforeach; ?>
										</select>
									</div>
								</div>
							<?php endif; ?>
					<!------------------>
							<?php if(!empty($info_product_with_id)): ?>
								<div class="form-row">
								    <div class="form-group col-md-5">
								    	<?php foreach($info_product_with_id as $info_product): ?>
										<label for="exampleFormControlInput1">Produto</label>
										<input type="text" name="id_product" class="form-control"
										value="<?php echo $info_product['name']; ?>" required="required">
										<input type="hidden" name="id_product" value="<?php echo $info_product['id']; ?>">
										<?php endforeach; ?>
								    </div>
								</div>
							<?php else: ?>
								<div class="form-row">
									<div class="form-group col-md-5">
										<label for="exampleFormControlInput1">Produto</label>
										<select class="form-control" name="id_product" id="exampleFormControlSelect1" required="required">
												<option></option>
											<?php foreach($info_product as $product): ?>
												<option value="<?php echo $product['id']; ?>">
													<?php echo $product['name']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							<?php endif; ?>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="exampleFormControlInput1">Data de validade</label>
									<input type="date" class="form-control" name="expirion_date">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-3">
									<label for="exampleFormControlInput1">Quantidade</label>
									<input type="number" name="quant" class="form-control" id="quant" required="required">
							    </div>
							    <div class="form-group col-md-2">
							    	<?php if(!empty($info_product_with_id)): ?>
								    	<?php foreach($info_product_with_id as $info_product): ?>
											<label for="exampleFormControlSelect1">Preço</label>
												<input type="text" pattern="([0-9]{1,2}\.)?[0-9]{1,2},[0-9]{2}$" name="value_product" value="<?php echo str_replace('.', ',', $info_product['value_medium']); ?>" class="form-control" id="value" required="required">
										<?php endforeach; ?>
									<?php else: ?>
										<label for="exampleFormControlSelect1">Preço</label>
											<input type="text" pattern="([0-9]{1,2}\.)?[0-9]{1,2},[0-9]{2}$" name="value_product" class="form-control" id="value" required="required">
									<?php endif; ?>
								</div>
							</div>
							<div class="form-row">					
							    <div class="form-group col-md-3">
									<label for="exampleFormControlInput1">Valor total</label>
									<input type="text" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" name="value_total" class="form-control" id="result" required="required">
							    </div>
							</div>
							<button type="submit" class="btn btn-primary">Inserir no estoque</button>
						</form>
					</div>
				</div><br/><br/>
				<!-- ./Row form insert -->
			</div>
		</div>