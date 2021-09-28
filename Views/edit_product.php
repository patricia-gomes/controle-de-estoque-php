			<div class="col-10 content">
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
				<!-- Row form insert -->
				<div class="row panel">
					<div class="col-6">
						<form method="POST" action="<?php echo BASE_URL; ?>/products/update" enctype="multipart/form-data">
							<?php foreach($data_product as $product): ?>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="exampleFormControlInput1">Nome do produto</label>
										<input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?php echo $product['name']; ?>" required="required">
								    </div>
								    <div class="form-group col-md-3">
										<label for="exampleFormControlInput1">Preço médio</label>
										<input type="text" pattern="([0-9]{1,2}\.)?[0-9]{1,2},[0-9]{2}$" class="form-control" name="value" value="<?php echo $helper->replace_point_in_comma($product['value_medium']); ?>" required="required" placeholder="15,90">
								    </div>
								</div>
								<input type="hidden" name="id_product" value="<?php echo $product['id']; ?>">
							<?php endforeach; ?>
							<div class="form-row">
								<button type="input" class="btn btn-primary">Alterar</button>
							</div>
						</form>
					</div>
				</div><br/><br/>
				<!-- ./Row form insert -->
			</div>
		</div>