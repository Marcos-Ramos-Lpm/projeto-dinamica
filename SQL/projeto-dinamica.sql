/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : projeto-dinamica

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 19/04/2021 23:46:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `categoria_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`categoria_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES (1, 'Ferramentas', '2021-04-20 01:45:21', '2021-04-20 01:45:21');
INSERT INTO `categoria` VALUES (2, 'Hidráulica', '2021-04-20 01:45:21', '2021-04-20 01:45:21');
INSERT INTO `categoria` VALUES (3, 'Iluminação', '2021-04-20 01:45:21', '2021-04-20 01:45:21');
INSERT INTO `categoria` VALUES (4, 'Piso e Porcelanato', '2021-04-20 01:45:21', '2021-04-20 01:45:21');
INSERT INTO `categoria` VALUES (6, 'Hidraulica', '2021-04-20 01:59:07', '2021-04-20 01:59:07');
INSERT INTO `categoria` VALUES (7, 'Hidraulica', '2021-04-20 01:59:31', '2021-04-20 01:59:31');
INSERT INTO `categoria` VALUES (8, 'Piso e Porcelanatos', '2021-04-20 01:59:56', '2021-04-20 01:59:56');
INSERT INTO `categoria` VALUES (11, 'Hidraulica', '2021-04-20 02:44:03', '2021-04-20 02:44:03');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `cliente_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`cliente_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (3, 'Marcos Ramos de Almeida', '1988-12-25', '2021-04-20 02:59:10', '2021-04-20 02:59:10');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (7, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (8, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (9, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_04_16_155725_creat_clientes_table', 1);
INSERT INTO `migrations` VALUES (11, '2021_04_16_220938_create_categoria_table', 1);
INSERT INTO `migrations` VALUES (12, '2021_04_17_020607_create_produto_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('markoslpm@gmail.com', '$2y$10$WMZIRoMTKG2GaGRWzdnmDuwz7u1OvKbdR4Lu5vLx5JJZZoZDFGEea', '2021-04-20 03:14:29');

-- ----------------------------
-- Table structure for produto
-- ----------------------------
DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto`  (
  `produto_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `produto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_produto` decimal(8, 2) NOT NULL,
  `descricao` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`produto_id`) USING BTREE,
  INDEX `produto_categoria_id_foreign`(`categoria_id`) USING BTREE,
  CONSTRAINT `produto_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of produto
-- ----------------------------
INSERT INTO `produto` VALUES (1, 1, 'Enchada', 37.50, 'Enchada de aço inox', '2021-04-20 01:45:30', NULL);
INSERT INTO `produto` VALUES (2, 3, 'Alicate de pressão', 10.00, 'fghjgfhj', '2021-04-20 02:44:19', '2021-04-20 02:44:19');
INSERT INTO `produto` VALUES (3, 6, 'Cano pvc', 200.00, 'hgjkkkkkkkk', '2021-04-20 02:44:42', '2021-04-20 03:17:23');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Marcos ramos de almeida', 'markoslpm@gmail.com', '2021-04-20 01:44:45', '$2y$10$qzyc3XRPbpPv.LWOnx35CucyMBWr48nRcbXdBWqtH8QHhvlrDr.sy', NULL, '2021-04-20 01:44:45', NULL);
INSERT INTO `users` VALUES (2, 'Marcos Ramos de Almeida', 'markos_lpm@hotmail.com', NULL, '$2y$10$8sWeC2mLD2pu5P0U/0eOcuf2c4z2yWxelO69Q493RuK/Ym5P6uSPS', NULL, '2021-04-20 03:11:28', '2021-04-20 03:11:28');

SET FOREIGN_KEY_CHECKS = 1;
