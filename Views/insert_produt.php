			<div class="col-10 content">
				<!-- Row form insert -->
				<div class="row panel">
					<div class="col-6">
						<h3>Inserir produto</h3>
						<form method="POST" action="<?php echo BASE_URL; ?>/products/register" enctype="multipart/form-data">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="exampleFormControlInput1">Nome do produto</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="name" required="required">
							    </div>
							    <div class="form-group col-md-3">
									<label for="exampleFormControlInput1">Preço médio</label>
									<input type="text" class="form-control" id="exampleFormControlInput2" name="value" required="required" placeholder="15,90">
							    </div>
							</div>
							<div class="form-row">
							    <div class="custom-file col-md-6">
									<input type="file" class="custom-file-input" id="customFile" name="img">
									<label class="custom-file-label" for="customFile">Enviar imagem do produto</label>
								</div>
							</div><br/><br/>
							<div class="form-row">
								<button type="input" class="btn btn-primary">Inserir produto</button>
							</div>
						</form>
					</div>
				</div><br/><br/>
				<!-- ./Row form insert -->
			</div>
		</div>