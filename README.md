# Controle de Estoque

<img src="assets/images/controle-de-estoque-screenshot.png">

<p>Minha primeira aplicação PHP orientada a objetos em que tive como base em outros códigos. Tem upload de imagem, CRUD dinâmico, login etc. Utiliza a estrutura MVC e o Mysql. No Front-end o Bootstrap 4 e Jquery.</p>

# Funcionalidades

<ul>
	<li>Insere, atualiza e deleta produtos e fornecedores.</li>
	<li>Upload de imagens de produtos</li>
	<li>Pode inserir várias entradas de um produto de diferentes fornecedores.</li>
	<li>O valor total de entradas e a quantidade de entradas.</li>
	<li>O valor total de saídas e a quantidade total de saídas.</li>
	<li>Sistema de busca de produtos, fornecedores, cidade. Busca de produtos em entradas e saídas.</li>
	<li>Notifica no painel inicial os produtos que falta 7 dias para validade vencer.</li>
</ul>

# Install

<ol>
	<li>A url base do sistema <strong>https://localhost/controle_de_estoque</strong> esta em Core/Model.php caso queira alterar</li>
	<li>Insira as configurações do seu banco de dados em: <strong>Core/Model.php</strong></li>
	<li>O arquivo com o sql para criar o banco de dados e as tabelas estão no arquivo: <strong>info_sql.sql</strong></li>
</ol>

Login<br/>
-User: `admin` <br/>
-Password: `admin321`


# Referências 
Curso PHP do zero ao Profissional [B7Web](https://cursophpdozeroaoprofissional.com/).<br/>
O arquivo Core/Core.php escrito em php orientado a objetos foi retirado da primeira parte da videoaula no [YouTube](https://www.youtube.com/watch?v=IMefEdNvz9E), sobre site e painal em MVC, PHP OOP do zero.<br/>
