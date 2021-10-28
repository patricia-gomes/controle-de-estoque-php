			<div class="col-10 content">
				<!-- Row form insert -->
				<div class="row panel">
					<div class="col-6">
						<h3>Inserir produto</h3>
						<form method="POST" action="<?php echo BASE_URL; ?>/products/register">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="exampleFormControlInput1">Nome do produto</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" name="name" required="required">
							    </div>
							    <div class="form-group col-md-3">
									<label for="exampleFormControlInput1">Preço médio</label>
									<input type="text" pattern="([0-9]{1,2}\.)?[0-9]{1,2},[0-9]{2}$" class="form-control" name="value" required="required" placeholder="15,90">
							    </div>
							</div>
							<div class="form-row">
								<button type="input" class="btn btn-primary">Inserir produto</button>
							</div>
						</form>
					</div>
				</div><br/><br/>
				<!-- ./Row form insert -->
			</div>
		</div>