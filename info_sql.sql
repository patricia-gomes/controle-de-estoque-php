# Execute nessa ordem

-- Cria o banco de dados --
CREATE DATABASE IF NOT EXISTS `controle_de_estoque`;

-- Cria a tabela usuários --
CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`user` VARCHAR(75) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(32) NOT NULL COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=2;

-- Cria a tabela Estados --
CREATE TABLE `states` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name_state` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=28;

INSERT `states` (`id`, `name_state`) VALUES
(1, 'Acre'),
(2, 'Alagoas'),
(3, 'Amapá'),
(4, 'Amazonas'),
(5, 'Bahia'),
(6, 'Ceará'),
(7, 'Distrito Federal'),
(8, 'Espírito Santo'),
(9, 'Goiás'),
(10, 'Maranhão'),
(11, 'Mato Grosso'),
(12, 'Mato Grosso do Sul'),
(13, 'Minas Gerais'),
(14, 'Pará'),
(15, 'Paraíba'),
(16, 'Paraná'),
(17, 'Pernambuco'),
(18, 'Piauí'),
(19, 'Rio de Janeiro'),
(20, 'Rio Grande do Norte'),
(21, 'Rio Grande do Sul'),
(22, 'Rondônia'),
(23, 'Roraima'),
(24, 'Santa Catarina'),
(25, 'São Paulo'),
(26, 'Sergipe'),
(27, 'Tocantins');

-- Insere o usuário e a senha de login --
INSERT `users` (`id`, `user`, `password`) VALUES 
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- Cria tabela Fornecedor --
CREATE TABLE `supplier` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`phone` VARCHAR(16) NOT NULL COLLATE 'utf8_general_ci',
	`cnpj` VARCHAR(20) NOT NULL COLLATE 'utf8_general_ci',
	`address` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`number_address` VARCHAR(5) NOT NULL COLLATE 'utf8_general_ci',
	`neighborhood` VARCHAR(60) NOT NULL COLLATE 'utf8_general_ci',
	`city` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`id_state` INT(11) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `id_state` (`id_state`) USING BTREE,
	CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`id_state`) REFERENCES `controle_de_estoque`.`states` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=7;

-- Cria a tabela Produtos --
CREATE TABLE `products` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`value_medium` FLOAT(12) NULL DEFAULT '0',
	`url_img_product` VARCHAR(120) NULL DEFAULT '' COLLATE 'utf8_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=12;

-- Cria a tabela Entradas --
CREATE TABLE `entry` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name_product` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`date_time` DATETIME NOT NULL,
	`name_supplier` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`value_product` FLOAT(12) NOT NULL DEFAULT '0',
	`quant_product` INT(11) NOT NULL DEFAULT '0',
	`value_total` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
	`expirion_date` VARCHAR(10) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`id_supplier` INT(11) NOT NULL,
	`id_product` INT(11) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `id_supplier` (`id_supplier`) USING BTREE,
	INDEX `id_product` (`id_product`) USING BTREE,
	CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `controle_de_estoque`.`supplier` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `entry_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `controle_de_estoque`.`products` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=31;


-- Cria a tabela Saídas --
CREATE TABLE `exits` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name_product` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`date_exit` DATETIME NOT NULL,
	`value_product` DECIMAL(7,2) NOT NULL,
	`quant_exit` INT(11) NOT NULL DEFAULT '0',
	`value_total` DECIMAL(10,2) NOT NULL,
	`id_entry` INT(11) NOT NULL,
	`id_product` INT(11) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `id_product` (`id_product`) USING BTREE,
	CONSTRAINT `exits_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `controle_de_estoque`.`products` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=36;
