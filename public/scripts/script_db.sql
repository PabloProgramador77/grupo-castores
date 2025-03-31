BEGIN TRANSACTION;
DROP TABLE IF EXISTS "migrations";
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "users";
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "password_reset_tokens";
CREATE TABLE IF NOT EXISTS "password_reset_tokens" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime,
	PRIMARY KEY("email")
);
DROP TABLE IF EXISTS "sessions";
CREATE TABLE IF NOT EXISTS "sessions" (
	"id"	varchar NOT NULL,
	"user_id"	integer,
	"ip_address"	varchar,
	"user_agent"	text,
	"payload"	text NOT NULL,
	"last_activity"	integer NOT NULL,
	PRIMARY KEY("id")
);
DROP TABLE IF EXISTS "cache";
CREATE TABLE IF NOT EXISTS "cache" (
	"key"	varchar NOT NULL,
	"value"	text NOT NULL,
	"expiration"	integer NOT NULL,
	PRIMARY KEY("key")
);
DROP TABLE IF EXISTS "cache_locks";
CREATE TABLE IF NOT EXISTS "cache_locks" (
	"key"	varchar NOT NULL,
	"owner"	varchar NOT NULL,
	"expiration"	integer NOT NULL,
	PRIMARY KEY("key")
);
DROP TABLE IF EXISTS "jobs";
CREATE TABLE IF NOT EXISTS "jobs" (
	"id"	integer NOT NULL,
	"queue"	varchar NOT NULL,
	"payload"	text NOT NULL,
	"attempts"	integer NOT NULL,
	"reserved_at"	integer,
	"available_at"	integer NOT NULL,
	"created_at"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "job_batches";
CREATE TABLE IF NOT EXISTS "job_batches" (
	"id"	varchar NOT NULL,
	"name"	varchar NOT NULL,
	"total_jobs"	integer NOT NULL,
	"pending_jobs"	integer NOT NULL,
	"failed_jobs"	integer NOT NULL,
	"failed_job_ids"	text NOT NULL,
	"options"	text,
	"cancelled_at"	integer,
	"created_at"	integer NOT NULL,
	"finished_at"	integer,
	PRIMARY KEY("id")
);
DROP TABLE IF EXISTS "failed_jobs";
CREATE TABLE IF NOT EXISTS "failed_jobs" (
	"id"	integer NOT NULL,
	"uuid"	varchar NOT NULL,
	"connection"	text NOT NULL,
	"queue"	text NOT NULL,
	"payload"	text NOT NULL,
	"exception"	text NOT NULL,
	"failed_at"	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "permissions";
CREATE TABLE IF NOT EXISTS "permissions" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"guard_name"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "roles";
CREATE TABLE IF NOT EXISTS "roles" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"guard_name"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "model_has_permissions";
CREATE TABLE IF NOT EXISTS "model_has_permissions" (
	"permission_id"	integer NOT NULL,
	"model_type"	varchar NOT NULL,
	"model_id"	integer NOT NULL,
	FOREIGN KEY("permission_id") REFERENCES "permissions"("id") on delete cascade,
	PRIMARY KEY("permission_id","model_id","model_type")
);
DROP TABLE IF EXISTS "model_has_roles";
CREATE TABLE IF NOT EXISTS "model_has_roles" (
	"role_id"	integer NOT NULL,
	"model_type"	varchar NOT NULL,
	"model_id"	integer NOT NULL,
	FOREIGN KEY("role_id") REFERENCES "roles"("id") on delete cascade,
	PRIMARY KEY("role_id","model_id","model_type")
);
DROP TABLE IF EXISTS "role_has_permissions";
CREATE TABLE IF NOT EXISTS "role_has_permissions" (
	"permission_id"	integer NOT NULL,
	"role_id"	integer NOT NULL,
	FOREIGN KEY("permission_id") REFERENCES "permissions"("id") on delete cascade,
	FOREIGN KEY("role_id") REFERENCES "roles"("id") on delete cascade,
	PRIMARY KEY("permission_id","role_id")
);
DROP TABLE IF EXISTS "productos";
CREATE TABLE IF NOT EXISTS "productos" (
	"id"	integer NOT NULL,
	"nombre"	varchar NOT NULL,
	"precio"	numeric NOT NULL,
	"estatus"	integer NOT NULL,
	"stock"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "compras";
CREATE TABLE IF NOT EXISTS "compras" (
	"id"	integer NOT NULL,
	"idProducto"	integer NOT NULL,
	"cantidad"	integer NOT NULL,
	"idUser"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	FOREIGN KEY("idUser") REFERENCES "users"("id") on delete cascade,
	FOREIGN KEY("idProducto") REFERENCES "productos"("id") on delete cascade,
	PRIMARY KEY("id" AUTOINCREMENT)
);
DROP TABLE IF EXISTS "ventas";
CREATE TABLE IF NOT EXISTS "ventas" (
	"id"	integer NOT NULL,
	"idProducto"	integer NOT NULL,
	"cantidad"	integer NOT NULL,
	"idUser"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	FOREIGN KEY("idProducto") REFERENCES "productos"("id") on delete cascade,
	FOREIGN KEY("idUser") REFERENCES "users"("id") on delete cascade,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "migrations" VALUES (1,'0001_01_01_000000_create_users_table',1);
INSERT INTO "migrations" VALUES (2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO "migrations" VALUES (3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO "migrations" VALUES (4,'2025_03_29_235933_create_permission_tables',2);
INSERT INTO "migrations" VALUES (5,'2025_03_31_022555_create_productos_table',3);
INSERT INTO "migrations" VALUES (6,'2025_03_31_041333_create_compras_table',4);
INSERT INTO "migrations" VALUES (7,'2025_03_31_053756_create_ventas_table',5);
INSERT INTO "users" VALUES (1,'Pablo Sanchez','pabloprogramador77@gmail.com',NULL,'$2y$12$iJGhrn/wQrmorgcET2s8a.P7oBeqbMhZckMrDuXG2fWGOGYoC8i8.',NULL,'2025-03-31 02:09:18','2025-03-31 06:08:29');
INSERT INTO "users" VALUES (3,'Jimena Chagoya','jimena.arguelles@gmail.com',NULL,'$2y$12$48sc/rVI2PzoiK3jeUWb1.6r5bsl5CYErYfBNz0Sal9Q4u.3o0M3a',NULL,'2025-03-31 06:12:08','2025-03-31 06:12:27');
INSERT INTO "sessions" VALUES ('dTLcUuDrts1zHcgai6qEzxmFPUC5Tomi1ve8PQGQ',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidHpNWkxDOTVwNFFiWGpabXU2WUtwanhPbm5uVVlJdTBnVGR3emgzWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vZ3J1cG8tY2FzdG9yZXMuZGV2L3Byb2R1Y3RvcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzQzNDAxODIwO319',1743401833);
INSERT INTO "cache" VALUES ('laravel_cache_spatie.permission.cache','a:3:{s:5:"alias";a:4:{s:1:"a";s:2:"id";s:1:"b";s:4:"name";s:1:"c";s:10:"guard_name";s:1:"r";s:5:"roles";}s:11:"permissions";a:8:{i:0;a:4:{s:1:"a";i:1;s:1:"b";s:14:"ver-inventario";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:1;a:4:{s:1:"a";i:2;s:1:"b";s:16:"agregar-producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:2;a:4:{s:1:"a";i:3;s:1:"b";s:19:"aumentar-inventario";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:3;a:4:{s:1:"a";i:4;s:1:"b";s:15:"borrar-producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:4;a:4:{s:1:"a";i:5;s:1:"b";s:18:"reactivar-producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:5;a:4:{s:1:"a";i:6;s:1:"b";s:10:"ver-ventas";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:3;}}i:6;a:4:{s:1:"a";i:7;s:1:"b";s:16:"sacar-inventario";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:3;}}i:7;a:4:{s:1:"a";i:8;s:1:"b";s:13:"ver-historial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}}s:5:"roles";a:2:{i:0;a:3:{s:1:"a";i:1;s:1:"b";s:13:"Administrador";s:1:"c";s:3:"web";}i:1;a:3:{s:1:"a";i:3;s:1:"b";s:11:"Almacenista";s:1:"c";s:3:"web";}}}',1743487684);
INSERT INTO "cache" VALUES ('laravel_cache_jimena.chagoya@gmail.com|127.0.0.1:timer','i:1743401553;',1743401553);
INSERT INTO "cache" VALUES ('laravel_cache_jimena.chagoya@gmail.com|127.0.0.1','i:1;',1743401553);
INSERT INTO "permissions" VALUES (1,'ver-inventario','web','2025-03-31 02:48:42','2025-03-31 02:48:42');
INSERT INTO "permissions" VALUES (2,'agregar-producto','web','2025-03-31 02:48:54','2025-03-31 02:48:54');
INSERT INTO "permissions" VALUES (3,'aumentar-inventario','web','2025-03-31 02:49:05','2025-03-31 02:49:05');
INSERT INTO "permissions" VALUES (4,'borrar-producto','web','2025-03-31 02:49:26','2025-03-31 02:49:26');
INSERT INTO "permissions" VALUES (5,'reactivar-producto','web','2025-03-31 02:49:44','2025-03-31 02:49:44');
INSERT INTO "permissions" VALUES (6,'ver-ventas','web','2025-03-31 02:50:00','2025-03-31 02:50:00');
INSERT INTO "permissions" VALUES (7,'sacar-inventario','web','2025-03-31 02:50:10','2025-03-31 02:50:10');
INSERT INTO "permissions" VALUES (8,'ver-historial','web','2025-03-31 02:50:20','2025-03-31 02:50:20');
INSERT INTO "roles" VALUES (1,'Administrador','web','2025-03-31 02:47:29','2025-03-31 02:47:29');
INSERT INTO "roles" VALUES (3,'Almacenista','web','2025-03-31 02:48:13','2025-03-31 02:48:13');
INSERT INTO "model_has_roles" VALUES (1,'App\Models\User',1);
INSERT INTO "model_has_roles" VALUES (3,'App\Models\User',3);
INSERT INTO "role_has_permissions" VALUES (1,1);
INSERT INTO "role_has_permissions" VALUES (2,1);
INSERT INTO "role_has_permissions" VALUES (3,1);
INSERT INTO "role_has_permissions" VALUES (4,1);
INSERT INTO "role_has_permissions" VALUES (5,1);
INSERT INTO "role_has_permissions" VALUES (8,1);
INSERT INTO "role_has_permissions" VALUES (1,3);
INSERT INTO "role_has_permissions" VALUES (6,3);
INSERT INTO "role_has_permissions" VALUES (7,3);
INSERT INTO "productos" VALUES (2,'Laptop',3000,0,9,'2025-03-31 03:36:22','2025-03-31 06:17:10');
INSERT INTO "compras" VALUES (1,2,12,1,'2025-03-31 04:26:05','2025-03-31 04:26:05');
INSERT INTO "compras" VALUES (2,2,1,1,'2025-03-31 05:29:47','2025-03-31 05:29:47');
INSERT INTO "compras" VALUES (3,2,12,1,'2025-03-31 06:01:49','2025-03-31 06:01:49');
INSERT INTO "ventas" VALUES (1,2,1,1,'2025-03-31 05:54:56','2025-03-31 05:54:56');
INSERT INTO "ventas" VALUES (2,2,1,1,'2025-03-31 06:02:05','2025-03-31 06:02:05');
INSERT INTO "ventas" VALUES (3,2,2,3,'2025-03-31 06:12:47','2025-03-31 06:12:47');
DROP INDEX IF EXISTS "users_email_unique";
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
DROP INDEX IF EXISTS "sessions_user_id_index";
CREATE INDEX IF NOT EXISTS "sessions_user_id_index" ON "sessions" (
	"user_id"
);
DROP INDEX IF EXISTS "sessions_last_activity_index";
CREATE INDEX IF NOT EXISTS "sessions_last_activity_index" ON "sessions" (
	"last_activity"
);
DROP INDEX IF EXISTS "jobs_queue_index";
CREATE INDEX IF NOT EXISTS "jobs_queue_index" ON "jobs" (
	"queue"
);
DROP INDEX IF EXISTS "failed_jobs_uuid_unique";
CREATE UNIQUE INDEX IF NOT EXISTS "failed_jobs_uuid_unique" ON "failed_jobs" (
	"uuid"
);
DROP INDEX IF EXISTS "permissions_name_guard_name_unique";
CREATE UNIQUE INDEX IF NOT EXISTS "permissions_name_guard_name_unique" ON "permissions" (
	"name",
	"guard_name"
);
DROP INDEX IF EXISTS "roles_name_guard_name_unique";
CREATE UNIQUE INDEX IF NOT EXISTS "roles_name_guard_name_unique" ON "roles" (
	"name",
	"guard_name"
);
DROP INDEX IF EXISTS "model_has_permissions_model_id_model_type_index";
CREATE INDEX IF NOT EXISTS "model_has_permissions_model_id_model_type_index" ON "model_has_permissions" (
	"model_id",
	"model_type"
);
DROP INDEX IF EXISTS "model_has_roles_model_id_model_type_index";
CREATE INDEX IF NOT EXISTS "model_has_roles_model_id_model_type_index" ON "model_has_roles" (
	"model_id",
	"model_type"
);
COMMIT;
