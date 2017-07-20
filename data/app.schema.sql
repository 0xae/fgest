drop database if exists fgest ;
create database fgest;
use fgest;

create table fg_user (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(50) not null,
    email text not null,
    password text not null,
    tipo varchar(50),
    is_active boolean
);

create table fg_orcamento (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    descricao text,
    valor DECIMAL(10, 0),

    data_criacao datetime NOT NULL DEFAULT NOW(),
    data_update datetime NOT NULL DEFAULT NOW(),
    criado_por BIGINT(20),
    updated_por BIGINT(20)

);

create table fg_factura (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    descricao text,
    orcamento_id BIGINT(20) NOT NULL,

    FOREIGN KEY(orcamento_id) REFERENCES fg_orcamento(id),
    data_criacao datetime NOT NULL DEFAULT NOW(),
    data_update datetime NOT NULL DEFAULT NOW(),
    criado_por BIGINT(20),
    updated_por BIGINT(20)
);

create table fg_factura_item (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    descricao varchar(50) NOT NULL,
    quantidade INTEGER NOT NULL default 0,
    valor DECIMAL(10,0) NOT NULL,
    data datetime NOT NULL DEFAULT NOW(),
    iva DECIMAL(10, 2) NOT NULL DEFAULT 0,
    factura_id BIGINT(20) NOT NULL,
    FOREIGN KEY(factura_id) REFERENCES fg_factura(id),

    data_criacao datetime NOT NULL DEFAULT NOW(),
    data_update datetime NOT NULL DEFAULT NOW(),
    criado_por BIGINT(20),
    updated_por BIGINT(20)
);

create table fg_factura_anexos (
    id BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50) NOT NULL,
    path text NOT NULL,
    factura_id BIGINT(20) NOT NULL,
    FOREIGN KEY(factura_id) REFERENCES fg_factura(id),

    data_criacao datetime NOT NULL DEFAULT NOW(),
    data_update datetime NOT NULL DEFAULT NOW(),
    criado_por BIGINT(20),
    updated_por BIGINT(20)
);

