/*Deleta todas as tabelas, se ja existirem*/
DROP TABLE IF EXISTS `pedidos_produtos`, `pedidos`, `produtos`, `produtos_log`, `categorias`, `categorias_log`, 
`enderecos_clientes`, `clientes`, `clientes_log`, `enderecos_pedidos`, `fornecedors`, `fornecedors_log`;


CREATE OR REPLACE TABLE `fornecedors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome_fornecedor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj` (`cnpj`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Log do fornecedor, onde é inserido informação sempre que um nome de fornecedor ou cep é modificado ou um fornecedor é excluído*/
CREATE OR REPLACE TABLE fornecedors_log (
  id_fornecedor int(11),
  cnpj varchar(15),
  old_nome_fornecedor varchar(200),
  new_nome_fornecedor varchar(200),
  old_cep int(15),
  new_cep int(15),
  data_alteracao timestamp,
  tipo char(1),
  CHECK (tipo IN ('U', 'D'))
);

/*TRIGGERS MYSQL*/

/*Trigger responsável por inserir na tabela fornecedors_log, sempre que ouver um update nos atribudos nome_fornecedor ou cep*/
DELIMITER $
CREATE OR REPLACE TRIGGER fornecedors_log_update
AFTER UPDATE ON fornecedors FOR EACH ROW
    BEGIN
        DECLARE triggered_when timestamp;
        SET triggered_when = now();
        IF new.nome_fornecedor <> old.nome_fornecedor || new.cep <> old.cep THEN
            INSERT INTO fornecedors_log VALUES (new.id, new.cnpj, old.nome_fornecedor, new.nome_fornecedor, old.cep, new.cep, triggered_when, 'U');
        END IF;
END $ 

/*Trigger responsável por inserir na tabela fornecedors_log, sempre que um fornecedor é excluido*/
$
CREATE OR REPLACE TRIGGER fornecedors_log_afterDelete
AFTER DELETE ON fornecedors FOR EACH ROW
	  BEGIN
	    	DECLARE triggered_when timestamp;
        SET triggered_when = now();
        INSERT INTO fornecedors_log VALUES (old.id, old.cnpj, old.nome_fornecedor, null, old.cep, null, triggered_when, 'D');
END $

/*Trigger responsável por deletar um produto, caso seu fornecedor seja excluído*/
$
CREATE OR REPLACE TRIGGER fornecedors_log_beforeDelete
BEFORE DELETE ON fornecedors FOR EACH ROW
    BEGIN
        DELETE FROM produtos WHERE fornecedor_id = old.id;
END
$ DELIMITER ;


CREATE OR REPLACE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Log da categoria, onde é inserido informação sempre que um nome de categoria é modificado ou uma categoria é excluida*/
CREATE OR REPLACE TABLE categorias_log (
  id int(11),
  old_nome_categoria varchar(200),
  new_nome_categoria varchar(200),
  tipo char(1),
  data_alteracao timestamp,
  CHECK (tipo IN ('U', 'D'))
);


/*TRIGGERS MYSQL*/


/*Trigger responsável por inserir na tabela categorias_log, sempre que uma categoria é excluida*/
DELIMITER $
CREATE OR REPLACE TRIGGER categorias_log_afterDelete
AFTER DELETE ON categorias FOR EACH ROW
    BEGIN
        DECLARE triggered_when timestamp;
        SET triggered_when = now();
        INSERT INTO categorias_log VALUES (old.id, old.nome_categoria, null, triggered_when, 'D');
END $


/*Trigger responsável por deletar um produto, caso sua categoria seja excluida*/
$
CREATE OR REPLACE TRIGGER categorias_log_beforeDelete
BEFORE DELETE ON categorias FOR EACH ROW
    BEGIN
        DELETE FROM produtos WHERE categoria_id = old.id;
END $


/*Trigger responsável por inserir na tabela categorias_log, sempre que ouver um update no atributo nome_categoria*/
$
CREATE OR REPLACE TRIGGER categorias_log_update
AFTER UPDATE ON categorias FOR EACH ROW
    BEGIN
        DECLARE triggered_when timestamp;
        SET triggered_when = now();
        IF new.nome_categoria <> old.nome_categoria THEN
            IF new.nome_categoria = ' ' THEN
                UPDATE categorias SET nome_categoria = old.nome_categoria WHERE nome_categoria = new.nome_categoria;
            END IF;
            INSERT INTO categorias_log VALUES (new.id, old.nome_categoria, new.nome_categoria, triggered_when, 'U');
        END IF;
END $ DELIMITER ;


CREATE OR REPLACE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `preco_produto` double NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`categoria_id`) REFERENCES categorias(`id`),
  FOREIGN KEY (`fornecedor_id`) REFERENCES fornecedors(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*Log de produtos, onde é inserido informação sempre que um preço/categoria/fornecedor é modificado ou um produto é excluido*/
CREATE OR REPLACE TABLE produtos_log (
  id int(11),
  nome varchar(200),
  old_preco_produto double,
  new_preco_produto double,
  categoria_id int(11),
  old_fornecedor_id int(11),
  new_fornecedor_id int(11),
  data_alteracao timestamp,
  tipo char(1),
  CHECK (tipo IN ('U', 'D'))
);


/*TRIGGERS MYSQL*/


/*Trigger responsável por inserir na tabela produtos_log, sempre que um produto é excluido*/
DELIMITER $
CREATE OR REPLACE TRIGGER produtos_log_afterDelete
AFTER DELETE ON produtos FOR EACH ROW
    BEGIN
        DECLARE triggered_when timestamp;
        SET triggered_when = now();
        INSERT INTO produtos_log VALUES (old.id, old.nome, old.preco_produto, null, old.categoria_id, old.fornecedor_id, null, triggered_when, 'D');
END $


/*Trigger responsável por inserir na tabela produtos_log, sempre que ouver um update nos atributos preço ou categoria ou fornecedor*/
$
CREATE OR REPLACE TRIGGER produtos_log_update
AFTER UPDATE ON produtos FOR EACH ROW
    BEGIN
        DECLARE triggered_when timestamp;
        SET triggered_when = now();
        IF new.preco_produto <> old.preco_produto || new.fornecedor_id <> old.fornecedor_id || new.categoria_id <> old.categoria_id THEN
            IF new.preco_produto = 0 THEN
                UPDATE produtos SET preco_produto = old.preco_produto WHERE preco_produto = new.preco_produto;
            END IF;
            INSERT INTO produtos_log VALUES (old.id, old.nome, old.preco_produto, new.preco_produto, old.categoria_id, old.fornecedor_id, new.fornecedor_id, triggered_when, 'U');
        END IF;
END $ DELIMITER ;



CREATE OR REPLACE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/*Log de clientes, onde é inserido informação sempre que um nome de cliente é modificado ou um cliente é excluido*/
CREATE OR REPLACE TABLE clientes_log (
  id int(11),
  cpf varchar(200),
  old_nome varchar(200),
  new_nome varchar(200),
  email varchar(200),
  senha varchar(200),
  data_alteracao timestamp,
  tipo char(1),
  CHECK (tipo IN ('D', 'U'))
);


/*TRIGGERS MYSQL*/


/*Trigger responsável por inserir na tabela clientes_log, sempre que um cliente é excluido*/
DELIMITER $
CREATE OR REPLACE TRIGGER clientes_log_delete
AFTER DELETE ON clientes FOR EACH ROW
    BEGIN
        DECLARE triggered_when timestamp;
        SET triggered_when = now();
        INSERT INTO clientes_log VALUES (old.id, old.nome, null, old.email, old.senha, triggered_when, 'D');
END $


/*Trigger responsável por inserir na tabela clientes_log, sempre que ouver um update no atributo nome*/
$
CREATE OR REPLACE TRIGGER clientes_log_update
AFTER UPDATE ON clientes FOR EACH ROW
    BEGIN
        DECLARE triggered_when timestamp;
        SET triggered_when = now();
        IF new.nome <> old.nome THEN
            IF new.nome = ' ' THEN
                UPDATE clientes SET nome = old.nome WHERE nome = new.nome;
            END IF;
            INSERT INTO clientes_log VALUES (old.id, old.nome, new.nome, old.email, old.senha, triggered_when, 'U');
        END IF;
END $ DELIMITER ;



CREATE OR REPLACE TABLE `enderecos_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `rua` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cliente_id`) REFERENCES clientes(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE OR REPLACE TABLE `enderecos_pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `rua` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE OR REPLACE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preco_pedido` double NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `enderecos_pedido_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`cliente_id`) REFERENCES clientes(`id`),
  FOREIGN KEY (`enderecos_pedido_id`) REFERENCES enderecos_pedidos(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE OR REPLACE TABLE `pedidos_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`pedido_id`) REFERENCES pedidos(`id`),
  FOREIGN KEY (`produto_id`) REFERENCES produtos(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




insert into fornecedors values(1, '00.000.000/0001-00', 'Relojoaria', '012.345.678-91'), 
                              (2, '11.111.111/0001-11', 'Musical', '987.654.321-00');

insert into categorias values(1, 'Bom'), (2, 'Ruim'); 

insert into produtos values (1, 'Relogio Apple', 100, 1, 1), 
                            (2, 'Relogio Camelo', 50, 2, 1),
                            (3, 'Violão', 1000, 2, 2),
                            (4, 'Piano', 10000, 1, 2);


insert into clientes values (1, '111.111.111-11', 'Joao', 'joao@gmail.com', '12345'), 
                            (2, '222.222.222-22', 'Maria', 'maria@gmail.com', '12345');

insert into enderecos_clientes values (1, 1, 123, 'Brilhante', 'Campo Grande', 'Mato Grosso do Sul'), 
                                      (2, 2, 321, 'Bandeirantes', 'Campo Grande', 'Mato Grosso do Sul'),
                                      (3, 2, 222, 'Afonso Pena', 'Campo Grande', 'Mato Grosso do Sul');

insert into enderecos_pedidos values (1, 111, 'Xavantes', 'Campo Grande', 'Mato Grosso do Sul'), 
                                     (2, 222, 'Maracaju', 'Campo Grande', 'Mato Grosso do Sul');

insert into pedidos values (1, 1100, 1, 1), 
                           (2, 12100, 2, 1);

insert into pedidos_produtos values (1, 1, 2), 
                                    (2, 1, 3),
                                    (3, 2, 1), 
                                    (4, 2, 2),
                                    (5, 2, 4);