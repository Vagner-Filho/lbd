CREATE TABLE `fornecedors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome_fornecedor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `preco_produto` double NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`categoria_id`) REFERENCES categorias(`id`),
  FOREIGN KEY (`fornecedor_id`) REFERENCES fornecedors(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `enderecos_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `rua` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cliente_id`) REFERENCES clientes(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `enderecos_pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `rua` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preco_pedido` double NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `enderecos_pedido_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cliente_id`) REFERENCES clientes(`id`),
  FOREIGN KEY (`enderecos_pedido_id`) REFERENCES enderecos_pedidos(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `pedidos_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`pedido_id`) REFERENCES pedidos(`id`),
  FOREIGN KEY (`produto_id`) REFERENCES produtos(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*insert into fornecedors (cnpj, nome_fornecedor, cep) values('00.000.000/0001-00', 'Relojoaria', '012.345.678-91'), 
                                                           ('11.111.111/0001-11', 'Musical', '987.654.321-00');

insert into categorias (nome_categoria) values('Bom'), ('Ruim'); 

insert into produtos (nome, preco_produto, categoria_id, fornecedor_id) values ('Relogio Apple', 100, 1, 1), 
                                                                               ('Relogio Camelo', 50, 2, 1),
                                                                               ('Violão', 1000, 2, 2),
                                                                               ('Piano', 10000, 1, 2);


insert into clientes (cpf, nome, email, senha) values ('111.111.111-11', 'Joao', 'joao@gmail.com', '12345'), 
                                                      ('222.222.222-22', 'Maria', 'maria@gmail.com', '12345');

insert into enderecos_clientes (cliente_id, numero, rua, cidade, estado) values (1, 123, 'Brilhante', 'Campo Grande', 'Mato Grosso do Sul'), 
                                                                                (2, 321, 'Bandeirantes', 'Campo Grande', 'Mato Grosso do Sul'),
                                                                                (2, 222, 'Afonso Pena', 'Campo Grande', 'Mato Grosso do Sul');

insert into enderecos_pedidos (numero, rua, cidade, estado) values (111, 'Xavantes', 'Campo Grande', 'Mato Grosso do Sul'), 
                                                                   (222, 'Maracaju', 'Campo Grande', 'Mato Grosso do Sul');

insert into pedidos (preco_pedido, cliente_id, enderecos_pedido_id) values (1100, 1, 1), 
                                                                           (12100, 2, 1);

insert into pedidos_produtos (pedido_id, produto_id) values (1, 2), 
                                                            (1, 3),
                                                            (2, 1), 
                                                            (2, 2),
                                                            (2, 4);*/



insert into fornecedors (cnpj, nome_fornecedor, cep) values('00.000.000/0001-00', 'Relojoaria', '012.345.678-91'), 
                                                           ('11.111.111/0001-11', 'Musical', '987.654.321-00');

insert into categorias (nome_categoria) values('Bom'), ('Ruim'); 

insert into produtos (nome, preco_produto, categoria_id, fornecedor_id) values ('Relogio Apple', 100, 3, 5), 
                                                                               ('Relogio Camelo', 50, 4, 5),
                                                                               ('Violão', 1000, 4, 6),
                                                                               ('Piano', 10000, 3, 6);


insert into clientes (cpf, nome, email, senha) values ('111.111.111-11', 'Joao', 'joao@gmail.com', '12345'), 
                                                      ('222.222.222-22', 'Maria', 'maria@gmail.com', '12345');

insert into enderecos_clientes (cliente_id, numero, rua, cidade, estado) values (4, 123, 'Brilhante', 'Campo Grande', 'Mato Grosso do Sul'), 
                                                                                (5, 321, 'Bandeirantes', 'Campo Grande', 'Mato Grosso do Sul'),
                                                                                (5, 222, 'Afonso Pena', 'Campo Grande', 'Mato Grosso do Sul');

insert into enderecos_pedidos (numero, rua, cidade, estado) values (111, 'Xavantes', 'Campo Grande', 'Mato Grosso do Sul'), 
                                                                   (222, 'Maracaju', 'Campo Grande', 'Mato Grosso do Sul');

insert into pedidos (preco_pedido, cliente_id, enderecos_pedido_id) values (1100, 4, 1), 
                                                                           (12100, 5, 2);

insert into pedidos_produtos (pedido_id, produto_id) values (1, 11), 
                                                            (1, 12),
                                                            (2, 10), 
                                                            (2, 11),
                                                            (2, 13);
