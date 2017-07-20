create table fg_orcamento (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    descricao text,
    valor DECIMAL(10, 0),

    data_criacao datetime NOT NULL default CURRENT_DATE,
    data_update datetime NOT NULL default CURRENT_DATE,
    criado_por BIGINT(20),
    updated_por BIGINT(20)

);

create table fg_factura (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    descricao text,
    orcamento_id BIGINT(20) NOT NULL,

    FOREIGN KEY(orcamento_id) REFERENCES orcamento(id),
    data_criacao datetime NOT NULL default CURRENT_DATE,
    data_update datetime NOT NULL default CURRENT_DATE,
    criado_por BIGINT(20),
    updated_por BIGINT(20)
);

create table fg_factura_item (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao varchar(50) NOT NULL,
    quantidade INTEGER NOT NULL default 0,
    valor DECIMAL(10,0) NOT NULL,
    data datetime NOT NULL default CURRENT_DATE
    iva DECIMAL(10, 2) NOT NULL DEFAULT 0,
    factura_id BIGINT(20) NOT NULL,
    FOREIGN KEY(factura_id) REFERENCES factura(id),

    data_criacao datetime NOT NULL default CURRENT_DATE,
    data_update datetime NOT NULL default CURRENT_DATE,
    criado_por BIGINT(20),
    updated_por BIGINT(20)
);

create table fg_factura_anexos (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    path text NOT NULL,
    factura_id BIGINT(20) NOT NULL,
    FOREIGN KEY(factura_id) REFERENCES factura(id),

    data_criacao datetime NOT NULL default CURRENT_DATE,
    data_update datetime NOT NULL default CURRENT_DATE,
    criado_por BIGINT(20),
    updated_por BIGINT(20)
);

