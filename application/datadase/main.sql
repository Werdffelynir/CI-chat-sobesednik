/*
Navicat SQLite Data Transfer

Source Server         : database
Source Server Version : 20817
Source Host           : :0

Target Server Type    : SQLite
Target Server Version : 20817
File Encoding         : 65001

Date: 2013-09-28 00:52:53
*/

PRAGMA foreign_keys = OFF;

-- ----------------------------
-- Table structure for "main"."message"
-- ----------------------------
DROP TABLE "main"."message";
CREATE TABLE "message" (
"id"  INTEGER NOT NULL,
"user"  TEXT,
"message"  TEXT,
"file_name"  TEXT,
"file_url"  TEXT,
"datetime"  TEXT,
PRIMARY KEY ("id")
);

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO "message" VALUES (1, 'vasia', 'Регистрация новых пользователей с полями (Никнейм, пароль, емейл, город), с обязательной возможностью прикрепления аваторки (формат jpg и png). При регистрации выводить также CAPTCHA для отсеивания автоматической регистрации. Все поля ввода при регистрации валидировать регулярными выражениями.', null, null, '1380236870 ');
INSERT INTO "message" VALUES (2, 'petia', 'Возможность залогиниться в чат (ник+пароль)', null, null, 1380237955);
INSERT INTO "message" VALUES (3, 'boria', 'Возможность залогиненым пользователям отправки сообщений в чат с поддержкой html кодов (b, u, i)', null, null, 1380238012);
INSERT INTO "message" VALUES (4, 'katia', 'Во время добавления сообщения предусмотреть возможность прикрепления к сообщению одного файла любого формата. Загрузку файла реализовать с использованием CURL', null, null, 1380238029);

-- ----------------------------
-- Table structure for "main"."settings"
-- ----------------------------
DROP TABLE "main"."settings";
CREATE TABLE "settings" (
"id"  INTEGER NOT NULL,
"title"  TEXT,
"url"  TEXT,
"path"  TEXT,
"author"  TEXT,
PRIMARY KEY ("id")
);

-- ----------------------------
-- Records of settings
-- ----------------------------

-- ----------------------------
-- Table structure for "main"."users"
-- ----------------------------
DROP TABLE "main"."users";
CREATE TABLE "users" (
"id"  INTEGER NOT NULL,
"login"  TEXT,
"password"  TEXT,
"name"  TEXT,
"territory"  TEXT,
"telephone"  TEXT,
"email"  TEXT,
"info"  TEXT,
"role"  TEXT,
"datetime"  TEXT,
"friends"  TEXT,
PRIMARY KEY ("id")
);

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "users" VALUES (1, 'vasia', 12345, 'Вася Пупкин', 'Киев', 0881234567, 'vasia@pupkin.com', 'Студент експерементатор. Отличние-лиходей.', 1, '1380236746 ', null);
INSERT INTO "users" VALUES (2, 'petia', 12345, 'Петя Петров', 'Белая Зона', 6655443321, 'petia@petia.com', 'Лесоруб, носитель штанов.', 1, '1380235453 ', null);
INSERT INTO "users" VALUES (3, 'katia', 12345, 'Катя', 'Новгород', 1425367890, 'katia@ckatia.com', 'Девушка с золотистыми волосами.', 1, '1380234932 ', null);
INSERT INTO "users" VALUES (4, 'boria', 12345, 'Борис', 'Полтава', 8465489887, 'boria@boria.com', 'Скептик.', 1, 1380233281, null);
INSERT INTO "users" VALUES (5, 'admin', 'admin', 'Администратор', 'Киев', 0804561232, 'admin@admin.com', 'Администратор сервиса', 3, 1380212578, null);
