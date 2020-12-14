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
					<div class="col-4">
						<form>
							<div class="form-row">
								<div class="form-group col-md-10">
									<label for="exampleFormControlInput1">Nome do produto</label>
									<input type="text" class="form-control" id="exampleFormControlInput1" required="required">
							    </div>
							</div>
							<div class="form-row">
							    <div class="form-group col-md-4">
									<label for="exampleFormControlInput1">Preço médio</label>
									<input type="text" class="form-control" id="exampleFormControlInput2" required="required" placeholder="15,90">
							    </div>
							    <div class="form-group col-md-6">
									<label for="exampleFormControlInput1">Data de validade</label>
									<input type="date" class="form-control" id="exampleFormControlInput2" placeholder="14/12/20202">
							    </div>
							</div>
							<div class="form-row">
							    <div class="custom-file col-md-10">
									<input type="file" class="custom-file-input" id="customFile" required="required">
									<label class="custom-file-label" for="customFile">Enviar imagem do produto</label>
								</div>
							</div><br/><br/>
							<div class="form-row">
								<button type="submit" class="btn btn-primary">Inserir produto</button>
							</div>
						</form>
					</div>
				</div><br/><br/>
				<!-- ./Row form insert -->
			</div>
		</div>