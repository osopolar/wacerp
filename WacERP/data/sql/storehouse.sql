/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     5/11/2011 6:48:07 PM                         */
/*==============================================================*/


drop index Index_1 on wac_customer;

drop index Index_2 on wac_customer;

drop index Index_3 on wac_customer;

drop index Index_4 on wac_customer;

drop index Index_1 on wac_customer_address;

drop index Index_2 on wac_customer_address;

drop index Index_3 on wac_customer_address;

drop index Index_4 on wac_customer_address;

drop index Index_1 on wac_material;

drop index Index_2 on wac_material;

drop index Index_3 on wac_material;

drop index Index_4 on wac_material;

drop index Index_1 on wac_material_delivery_order;

drop index Index_2 on wac_material_delivery_order;

drop index Index_3 on wac_material_delivery_order;

drop index Index_4 on wac_material_delivery_order;

drop index Index_1 on wac_material_delivery_order_item;

drop index Index_2 on wac_material_delivery_order_item;

drop index Index_3 on wac_material_delivery_order_item;

drop index Index_4 on wac_material_delivery_order_item;

drop index Index_1 on wac_material_lang;

drop index Index_2 on wac_material_lang;

drop index Index_3 on wac_material_lang;

drop index Index_4 on wac_material_lang;

drop index Index_1 on wac_material_purchase_order;

drop index Index_2 on wac_material_purchase_order;

drop index Index_3 on wac_material_purchase_order;

drop index Index_4 on wac_material_purchase_order;

drop index Index_1 on wac_material_purchase_order_item;

drop index Index_2 on wac_material_purchase_order_item;

drop index Index_3 on wac_material_purchase_order_item;

drop index Index_4 on wac_material_purchase_order_item;

drop index Index_1 on wac_material_sale_order;

drop index Index_2 on wac_material_sale_order;

drop index Index_3 on wac_material_sale_order;

drop index Index_4 on wac_material_sale_order;

drop index Index_1 on wac_material_sale_order_item;

drop index Index_2 on wac_material_sale_order_item;

drop index Index_3 on wac_material_sale_order_item;

drop index Index_4 on wac_material_sale_order_item;

drop index Index_1 on wac_material_shipping_order;

drop index Index_2 on wac_material_shipping_order;

drop index Index_3 on wac_material_shipping_order;

drop index Index_4 on wac_material_shipping_order;

drop index Index_1 on wac_material_shipping_order_item;

drop index Index_2 on wac_material_shipping_order_item;

drop index Index_3 on wac_material_shipping_order_item;

drop index Index_4 on wac_material_shipping_order_item;

drop index Index_1 on wac_order_state;

drop index Index_2 on wac_order_state;

drop index Index_3 on wac_order_state;

drop index Index_4 on wac_order_state;

drop index Index_1 on wac_shipping_method;

drop index Index_2 on wac_shipping_method;

drop index Index_3 on wac_shipping_method;

drop index Index_4 on wac_shipping_method;

drop index Index_1 on wac_storehouse;

drop index Index_2 on wac_storehouse;

drop index Index_3 on wac_storehouse;

drop index Index_4 on wac_storehouse;

drop index Index_1 on wac_storehouse_material_biz_item;

drop index Index_2 on wac_storehouse_material_biz_item;

drop index Index_3 on wac_storehouse_material_biz_item;

drop index Index_4 on wac_storehouse_material_biz_item;

drop index Index_1 on wac_storehouse_material_quantity;

drop index Index_2 on wac_storehouse_material_quantity;

drop index Index_3 on wac_storehouse_material_quantity;

drop index Index_4 on wac_storehouse_material_quantity;

drop index Index_5 on wac_storehouse_material_quantity;

drop index Index_1 on wac_storehouse_parameter;

drop index Index_2 on wac_storehouse_parameter;

drop index Index_3 on wac_storehouse_parameter;

drop index Index_4 on wac_storehouse_parameter;

drop index Index_1 on wac_storehouse_quickstat;

drop index Index_2 on wac_storehouse_quickstat;

drop index Index_3 on wac_storehouse_quickstat;

drop index Index_4 on wac_storehouse_quickstat;

drop index Index_1 on wac_storeroom;

drop index Index_2 on wac_storeroom;

drop index Index_3 on wac_storeroom;

drop index Index_4 on wac_storeroom;

drop index Index_5 on wac_storeroom;

drop table if exists wac_customer;

drop table if exists wac_customer_address;

drop table if exists wac_material;

drop table if exists wac_material_delivery_order;

drop table if exists wac_material_delivery_order_item;

drop table if exists wac_material_lang;

drop table if exists wac_material_purchase_order;

drop table if exists wac_material_purchase_order_item;

drop table if exists wac_material_sale_order;

drop table if exists wac_material_sale_order_item;

drop table if exists wac_material_shipping_order;

drop table if exists wac_material_shipping_order_item;

drop table if exists wac_order_state;

drop table if exists wac_shipping_method;

drop table if exists wac_storehouse;

drop table if exists wac_storehouse_material_biz_item;

drop table if exists wac_storehouse_material_quantity;

drop table if exists wac_storehouse_parameter;

drop table if exists wac_storehouse_quickstat;

drop table if exists wac_storeroom;

/*==============================================================*/
/* Table: wac_customer                                          */
/*==============================================================*/
create table wac_customer
(
   id                   bigint not null auto_increment,
   name                 varchar(255) default NULL,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_customer
(
   name
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_customer
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_customer
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_customer
(
   is_avail
);

/*==============================================================*/
/* Table: wac_customer_address                                  */
/*==============================================================*/
create table wac_customer_address
(
   id                   bigint not null auto_increment,
   customer_id          bigint default 0,
   name                 varchar(255) default NULL,
   is_default           smallint default 0,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_customer_address
(
   customer_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_customer_address
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_customer_address
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_customer_address
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material                                          */
/*==============================================================*/
create table wac_material
(
   id                   bigint not null auto_increment,
   name                 varchar(255) default NULL,
   sku                  varchar(255),
   brand_id             bigint default 0,
   model_id             bigint default 0,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material
(
   sku
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_delivery_order                           */
/*==============================================================*/
create table wac_material_delivery_order
(
   id                   bigint not null auto_increment,
   name                 varchar(255) default NULL,
   code                 varchar(255),
   user_id              bigint default 0,
   src_storehouse_id    bigint default 0,
   src_storeroom_id     bigint default 0,
   dst_storehouse_id    bigint default 0,
   dst_storeroom_id     bigint default 0,
   total_price          decimal,
   biz_date             datetime,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_delivery_order
(
   user_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_delivery_order
(
   code
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_delivery_order
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_delivery_order
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_delivery_order_item                      */
/*==============================================================*/
create table wac_material_delivery_order_item
(
   id                   bigint not null auto_increment,
   order_id             bigint default 0,
   material_id          bigint default 0,
   qty                  float default 0.0,
   qty_unit_code        varchar(255),
   unit_price           decimal,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_delivery_order_item
(
   material_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_delivery_order_item
(
   order_id
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_delivery_order_item
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_delivery_order_item
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_lang                                     */
/*==============================================================*/
create table wac_material_lang
(
   id                   bigint not null auto_increment,
   lang_id              bigint,
   name                 varchar(255),
   value                varchar(255),
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_lang
(
   lang_id,
   name
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_lang
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_lang
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_lang
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_purchase_order                           */
/*==============================================================*/
create table wac_material_purchase_order
(
   id                   bigint not null auto_increment,
   name                 varchar(255) default NULL,
   code                 varchar(255),
   user_id              bigint default 0,
   biz_date             datetime,
   total_price          decimal,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_purchase_order
(
   user_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_purchase_order
(
   code
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_purchase_order
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_purchase_order
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_purchase_order_item                      */
/*==============================================================*/
create table wac_material_purchase_order_item
(
   id                   bigint not null auto_increment,
   order_id             bigint default 0,
   material_id          bigint default 0,
   qty                  float default 0.0,
   qty_unit_code        varchar(255),
   unit_price           decimal,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_purchase_order_item
(
   material_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_purchase_order_item
(
   order_id
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_purchase_order_item
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_purchase_order_item
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_sale_order                               */
/*==============================================================*/
create table wac_material_sale_order
(
   id                   bigint not null auto_increment,
   name                 varchar(255) default NULL,
   code                 varchar(255),
   user_id              bigint default 0,
   src_storehouse_id    bigint default 0,
   src_storeroom_id     bigint default 0,
   customer_id          bigint default 0,
   total_price          decimal,
   biz_date             datetime,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_sale_order
(
   user_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_sale_order
(
   code
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_sale_order
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_sale_order
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_sale_order_item                          */
/*==============================================================*/
create table wac_material_sale_order_item
(
   id                   bigint not null auto_increment,
   order_id             bigint default 0,
   material_id          bigint default 0,
   qty                  float default 0.0,
   qty_unit_code        varchar(255),
   unit_price           decimal,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_sale_order_item
(
   material_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_sale_order_item
(
   order_id
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_sale_order_item
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_sale_order_item
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_shipping_order                           */
/*==============================================================*/
create table wac_material_shipping_order
(
   id                   bigint not null auto_increment,
   name                 varchar(255) default NULL,
   code                 varchar(255),
   user_id              bigint default 0,
   src_storehouse_id    bigint default 0,
   src_storeroom_id     bigint default 0,
   customer_id          bigint default 0,
   customer_address_id  bigint default 0,
   shipping_method_id   bigint default 0,
   total_price          decimal,
   biz_date             datetime,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_shipping_order
(
   user_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_shipping_order
(
   code
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_shipping_order
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_shipping_order
(
   is_avail
);

/*==============================================================*/
/* Table: wac_material_shipping_order_item                      */
/*==============================================================*/
create table wac_material_shipping_order_item
(
   id                   bigint not null auto_increment,
   order_id             bigint default 0,
   material_id          bigint default 0,
   qty                  float default 0.0,
   qty_unit_code        varchar(255),
   unit_price           decimal,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_material_shipping_order_item
(
   material_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_material_shipping_order_item
(
   order_id
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_material_shipping_order_item
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_material_shipping_order_item
(
   is_avail
);

/*==============================================================*/
/* Table: wac_order_state                                       */
/*==============================================================*/
create table wac_order_state
(
   id                   bigint not null auto_increment,
   order_id             bigint default 0,
   order_type           smallint default 0,
   state                smallint default 0,
   changer_id           bigint default 0,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_order_state
(
   order_type
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_order_state
(
   order_id
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_order_state
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_order_state
(
   is_avail
);

/*==============================================================*/
/* Table: wac_shipping_method                                   */
/*==============================================================*/
create table wac_shipping_method
(
   id                   bigint not null auto_increment,
   code                 varchar(255),
   name                 varchar(255) default NULL,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_shipping_method
(
   name
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_shipping_method
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_shipping_method
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_shipping_method
(
   is_avail
);

/*==============================================================*/
/* Table: wac_storehouse                                        */
/*==============================================================*/
create table wac_storehouse
(
   id                   bigint not null auto_increment,
   name                 varchar(255) default NULL,
   code                 varchar(255),
   area_size            float not null default 0.0,
   area_size_unit_code  varchar(255),
   capacity             float not null default 0.0,
   capacity_unit_code   varchar(255),
   postalcode           varchar(255),
   address              varchar(255),
   contact_man          varchar(255),
   tel1                 varchar(255),
   tel2                 varchar(255),
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_storehouse
(
   code
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_storehouse
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_storehouse
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_storehouse
(
   is_avail
);

/*==============================================================*/
/* Table: wac_storehouse_material_biz_item                      */
/*==============================================================*/
create table wac_storehouse_material_biz_item
(
   id                   bigint not null auto_increment,
   storehouse_id        bigint not null default 0,
   material_id          bigint default 0,
   order_type           smallint,
   order_id             bigint default 0,
   qty                  float,
   qty_unit_code        varchar(255),
   unit_price           decimal,
   unit_cost            decimal,
   trade_date           datetime,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_storehouse_material_biz_item
(
   storehouse_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_storehouse_material_biz_item
(
   material_id
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_storehouse_material_biz_item
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_storehouse_material_biz_item
(
   order_type,
   order_id
);

/*==============================================================*/
/* Table: wac_storehouse_material_quantity                      */
/*==============================================================*/
create table wac_storehouse_material_quantity
(
   id                   bigint not null auto_increment,
   storehouse_id        bigint not null default 0,
   storeroom_id         bigint default 0,
   material_id          bigint,
   qty                  float default 0.0,
   qty_unit_code        varchar(255),
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_storehouse_material_quantity
(
   storehouse_id,
   material_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_storehouse_material_quantity
(
   qty
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_storehouse_material_quantity
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_storehouse_material_quantity
(
   is_avail
);

/*==============================================================*/
/* Index: Index_5                                               */
/*==============================================================*/
create index Index_5 on wac_storehouse_material_quantity
(
   storehouse_id,
   storeroom_id,
   material_id
);

/*==============================================================*/
/* Table: wac_storehouse_parameter                              */
/*==============================================================*/
create table wac_storehouse_parameter
(
   id                   bigint not null auto_increment,
   storehouse_id        bigint not null default 0,
   code                 varchar(255),
   value                varchar(255),
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_storehouse_parameter
(
   code
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_storehouse_parameter
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_storehouse_parameter
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_storehouse_parameter
(
   is_avail
);

/*==============================================================*/
/* Table: wac_storehouse_quickstat                              */
/*==============================================================*/
create table wac_storehouse_quickstat
(
   id                   bigint not null auto_increment,
   type                 smallint default 0,
   storehouse_id        bigint not null default 0,
   material_id          bigint,
   qty                  float default 0.0,
   stat_date            datetime,
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_storehouse_quickstat
(
   storehouse_id,
   material_id
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_storehouse_quickstat
(
   qty
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_storehouse_quickstat
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_storehouse_quickstat
(
   is_avail
);

/*==============================================================*/
/* Table: wac_storeroom                                         */
/*==============================================================*/
create table wac_storeroom
(
   id                   bigint not null auto_increment,
   storehouse_id        bigint default 0,
   name                 varchar(255) default NULL,
   code                 varchar(255),
   area_size            float not null default 0.0,
   area_size_unit_code  varchar(255),
   capacity             float not null default 0.0,
   capacity_unit_code   varchar(255),
   pr_int1              int default 0,
   pr_int2              int default 0,
   pr_str1              varchar(255) default NULL,
   pr_str2              varchar(255) default NULL,
   priority             int default 50,
   is_avail             bool not null default true,
   created_at           timestamp,
   updated_at           timestamp,
   primary key (id)
);

/*==============================================================*/
/* Index: Index_1                                               */
/*==============================================================*/
create index Index_1 on wac_storeroom
(
   code
);

/*==============================================================*/
/* Index: Index_2                                               */
/*==============================================================*/
create index Index_2 on wac_storeroom
(
   updated_at
);

/*==============================================================*/
/* Index: Index_3                                               */
/*==============================================================*/
create index Index_3 on wac_storeroom
(
   created_at
);

/*==============================================================*/
/* Index: Index_4                                               */
/*==============================================================*/
create index Index_4 on wac_storeroom
(
   is_avail
);

/*==============================================================*/
/* Index: Index_5                                               */
/*==============================================================*/
create index Index_5 on wac_storeroom
(
   storehouse_id
);

