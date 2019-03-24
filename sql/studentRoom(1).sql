/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2019/3/21 19:43:05                           */
/*==============================================================*/


drop index Index_i_user on t_browse_record;

drop index Index_i_property on t_browse_record;

drop table if exists t_browse_record;

drop index Index_i_property on t_comment;

drop table if exists t_comment;

drop index Index_type on t_document;

drop index Index_i_user on t_document;

drop table if exists t_document;

drop index Index_i_student on t_order;

drop index Index_i_landlord on t_order;

drop table if exists t_order;

drop index Index_pets on t_property;

drop index Index_smoker on t_property;

drop index Index_rent on t_property;

drop index Index_latitude on t_property;

drop index Index_longitude on t_property;

drop table if exists t_property;

drop table if exists t_student_detail;

drop table if exists t_user;

/*==============================================================*/
/* Table: t_browse_record                                       */
/*==============================================================*/
create table t_browse_record
(
   i_browse_record      bigint not null,
   i_property           bigint,
   i_user               bigint,
   browse_record        datetime,
   primary key (i_browse_record)
);

alter table t_browse_record comment '浏览记录表';

/*==============================================================*/
/* Index: Index_i_property                                      */
/*==============================================================*/
create index Index_i_property on t_browse_record
(
   i_property
);

/*==============================================================*/
/* Index: Index_i_user                                          */
/*==============================================================*/
create index Index_i_user on t_browse_record
(
   i_user
);

/*==============================================================*/
/* Table: t_comment                                             */
/*==============================================================*/
create table t_comment
(
   i_comment            bigint not null,
   i_property           bigint,
   floor_num            int,
   i_user               bigint,
   name                 varchar(32),
   reply_to             int,
   comment              varchar(300),
   reply_date           datetime,
   primary key (i_comment)
);

alter table t_comment comment '评论表';

/*==============================================================*/
/* Index: Index_i_property                                      */
/*==============================================================*/
create index Index_i_property on t_comment
(
   i_property
);

/*==============================================================*/
/* Table: t_document                                            */
/*==============================================================*/
create table t_document
(
   i_document           bigint not null,
   i_user               bigint,
   title                varchar(64),
   type                 int,
   path                 varchar(200),
   crt_time             datetime,
   primary key (i_document)
);

alter table t_document comment '文件表';

/*==============================================================*/
/* Index: Index_i_user                                          */
/*==============================================================*/
create index Index_i_user on t_document
(
   i_user
);

/*==============================================================*/
/* Index: Index_type                                            */
/*==============================================================*/
create index Index_type on t_document
(
   type
);

/*==============================================================*/
/* Table: t_order                                               */
/*==============================================================*/
create table t_order
(
   i_order              bigint not null,
   i_student            bigint,
   name                 varchar(32),
   phone                varchar(32),
   email                varchar(32),
   i_property           bigint,
   i_landlord           bigint,
   apply_date           datetime,
   check_in_time        date,
   state                int,
   tanency              varchar(32),
   property_type        int,
   bill_included        varchar(64),
   contract_type        int,
   is_verified          int,
   memo                 varchar(100),
   crt_time             datetime,
   upd_time             datetime,
   primary key (i_order)
);

alter table t_order comment '订单表';

/*==============================================================*/
/* Index: Index_i_landlord                                      */
/*==============================================================*/
create index Index_i_landlord on t_order
(
   i_landlord
);

/*==============================================================*/
/* Index: Index_i_student                                       */
/*==============================================================*/
create index Index_i_student on t_order
(
   i_student
);

/*==============================================================*/
/* Table: t_property                                            */
/*==============================================================*/
create table t_property
(
   i_property           bigint not null,
   address              varchar(200),
   full_address         varchar(500),
   longitude            float,
   latitude             float,
   description          varchar(300),
   payment              int,
   rent_per_week        int,
   i_owner              bigint,
   owner_name           varchar(32),
   phone                varchar(32),
   email                varchar(32),
   smoker               int,
   pets                 int,
   parlor               int,
   bedroom              int,
   kitchen              int,
   post_code            varchar(16),
   bathroom             int,
   state                int,
   release_date         date,
   memo                 varchar(100),
   primary key (i_property)
);

alter table t_property comment '房屋信息表';

/*==============================================================*/
/* Index: Index_longitude                                       */
/*==============================================================*/
create index Index_longitude on t_property
(
   longitude
);

/*==============================================================*/
/* Index: Index_latitude                                        */
/*==============================================================*/
create index Index_latitude on t_property
(
   latitude
);

/*==============================================================*/
/* Index: Index_rent                                            */
/*==============================================================*/
create index Index_rent on t_property
(
   rent_per_week
);

/*==============================================================*/
/* Index: Index_smoker                                          */
/*==============================================================*/
create index Index_smoker on t_property
(
   smoker
);

/*==============================================================*/
/* Index: Index_pets                                            */
/*==============================================================*/
create index Index_pets on t_property
(
   pets
);

/*==============================================================*/
/* Table: t_student_detail                                      */
/*==============================================================*/
create table t_student_detail
(
   i_student            bigint not null,
   year_of_study        int,
   university           varchar(64),
   course               varchar(64),
   resident_address     varchar(200),
   memo                 varchar(100),
   primary key (i_student)
);

alter table t_student_detail comment '学生详情表';

/*==============================================================*/
/* Table: t_user                                                */
/*==============================================================*/
create table t_user
(
   i_user               bigint not null,
   first_name           varchar(32),
   last_name            varchar(32),
   gender               int,
   email                varchar(32),
   phone                varchar(32),
   password             varchar(64),
   remaining_sum        float,
   birth_date           date,
   verification_doc     varchar(32),
   type                 int,
   pictrue              varchar(32),
   identity             varchar(32),
   memo                 varchar(100),
   crt_time             datetime,
   upd_time             datetime,
   primary key (i_user)
);

alter table t_user comment '用户表';

