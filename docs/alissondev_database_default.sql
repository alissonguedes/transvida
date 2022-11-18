-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 17/11/2022 às 18:08
-- Versão do servidor: 10.6.7-MariaDB-2ubuntu1.1
-- Versão do PHP: 8.1.2-1ubuntu2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `alissondev_database_default`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_grupo`
--

CREATE TABLE `tb_acl_grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `grupo` varchar(25) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 1111,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de grupos de usuários.';

--
-- Despejando dados para a tabela `tb_acl_grupo`
--

INSERT INTO `tb_acl_grupo` (`id`, `grupo`, `descricao`, `permissao`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Administrador', 'Grupo de usuários sem restrição de privilégios.', 1111, '2022-06-23 20:42:45', NULL, '1'),
(2, 'Administrador', 'Grupo de usuários com restrição de privilégios.', 0111, '2022-06-23 20:42:45', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu`
--

CREATE TABLE `tb_acl_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_modulo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `editavel` enum('0','1') NOT NULL DEFAULT '1',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de menus';

--
-- Despejando dados para a tabela `tb_acl_menu`
--

INSERT INTO `tb_acl_menu` (`id`, `id_modulo`, `created_at`, `updated_at`, `editavel`, `status`) VALUES
(1, 2, '2022-08-21 02:09:34', '2022-08-21 02:57:31', '1', '1'),
(2, 6, '2022-08-21 02:56:50', '2022-11-11 20:16:17', '1', '1'),
(3, 6, '2022-08-21 02:56:50', '2022-08-21 02:57:29', '1', '1'),
(4, 6, '2022-11-08 19:38:24', NULL, '1', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu_descricao`
--

CREATE TABLE `tb_acl_menu_descricao` (
  `id_menu` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_acl_menu_descricao`
--

INSERT INTO `tb_acl_menu_descricao` (`id_menu`, `id_idioma`, `titulo`, `descricao`, `meta_description`, `meta_title`, `meta_keywords`) VALUES
(1, 1, 'Menu Principal', 'menu-principal', NULL, NULL, NULL),
(2, 1, 'Clínica', 'clinica', NULL, NULL, NULL),
(3, 1, 'Clinica 2', 'clinica-2', NULL, NULL, NULL),
(4, 1, 'Clinica 4', 'clinica-4', NULL, NULL, NULL),
(1, 2, 'Main menu', 'main-menu', NULL, NULL, NULL),
(2, 2, 'Clinic', 'clinic', NULL, NULL, NULL),
(3, 2, '5', '5', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu_item`
--

CREATE TABLE `tb_acl_menu_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `id_item` int(10) UNSIGNED NOT NULL COMMENT 'Referencia a tabela (tb_acl_modulo_controller ou tb_acl_modulo_post) para a qual aponta o menu',
  `id_parent` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Campo para hierarquia do menu',
  `descricao` varchar(50) DEFAULT NULL,
  `item_type` enum('acl_modulo_controller','post','link') NOT NULL DEFAULT 'link' COMMENT 'É o nome da tabela referenciada. Seria a tb_acl_modulo_controller (controller) ou tb_acl_modulo_post (post)',
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `target` varchar(20) DEFAULT NULL,
  `ordem` int(11) NOT NULL DEFAULT 0,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 1111,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `editavel` enum('0','1') NOT NULL DEFAULT '1',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de itens do menus';

--
-- Despejando dados para a tabela `tb_acl_menu_item`
--

INSERT INTO `tb_acl_menu_item` (`id`, `id_menu`, `id_item`, `id_parent`, `descricao`, `item_type`, `link`, `icon`, `target`, `ordem`, `permissao`, `created_at`, `updated_at`, `editavel`, `status`) VALUES
(1, 1, 3, 0, 'Página inicial da área Administrativa', 'acl_modulo_controller', NULL, 'dashboard', NULL, 1, 0001, '2022-08-21 02:14:27', NULL, '1', '1'),
(2, 1, 4, 0, 'Página de menus da área Administrativa', 'acl_modulo_controller', NULL, 'list', NULL, 3, 0001, '2022-08-21 02:14:55', NULL, '1', '1'),
(3, 1, 4, 2, 'Página de menus da área Administrativa', 'acl_modulo_controller', NULL, 'radio_button_unchecked', NULL, 0, 0001, '2022-08-21 02:14:27', NULL, '1', '1'),
(4, 1, 12, 0, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'group', NULL, 1, 0001, '2022-08-21 02:14:27', NULL, '1', '1'),
(5, 2, 12, 0, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'dashboard', NULL, 2, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(6, 2, 12, 0, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'calendar_month', NULL, 4, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(7, 2, 12, 6, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'radio_button_unchecked', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(8, 2, 12, 6, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'radio_button_unchecked', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(9, 2, 12, 6, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'radio_button_unchecked', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(10, 2, 12, 6, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'radio_button_unchecked', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(11, 2, 12, 6, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'radio_button_unchecked', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(12, 2, 12, 0, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'troubleshoot', NULL, 5, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(13, 2, 12, 12, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'biotech', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(14, 2, 12, 12, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'monitor_heart', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(15, 2, 12, 12, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'radio_button_unchecked', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(16, 2, 12, 0, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', NULL, 'medical_services', NULL, 6, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(17, 2, 12, 16, 'Página inicial do módulo ClinicCloud', 'acl_modulo_controller', 'Atendimentos', 'fa-clipboard-user', NULL, 0, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(18, 2, 19, 0, 'Página de pacientes', 'acl_modulo_controller', NULL, 'group', NULL, 2, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(19, 2, 21, 22, 'Página de médicos', 'acl_modulo_controller', NULL, NULL, NULL, 4, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(20, 2, 22, 22, 'Página de especialidades', 'acl_modulo_controller', NULL, 'favorite_border', NULL, 3, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(21, 2, 12, 0, 'Gerenciamento', 'acl_modulo_controller', NULL, 'construction', NULL, 20, 0001, '2022-11-08 17:07:03', NULL, '1', '1'),
(22, 2, 12, 21, 'Cadastros', 'acl_modulo_controller', NULL, 'manage_accounts', NULL, 20, 0001, '2022-11-08 17:07:03', NULL, '1', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu_item_descricao`
--

CREATE TABLE `tb_acl_menu_item_descricao` (
  `id_item` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_acl_menu_item_descricao`
--

INSERT INTO `tb_acl_menu_item_descricao` (`id_item`, `id_idioma`, `titulo`, `descricao`, `meta_description`, `meta_title`, `meta_keywords`) VALUES
(1, 1, 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard'),
(2, 1, 'Menus', 'Menus', 'Menus', 'Menus', 'Menus'),
(3, 1, 'Menus', 'Menus', 'Menus', 'Menus', 'Menus'),
(4, 1, 'Grupo de usuários', 'Grupo de usuários', 'Grupo de usuários', 'Grupo de usuários', 'Grupo de usuários'),
(5, 1, 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard'),
(6, 1, 'Agendamentos', 'Agendamentos', 'Agendamentos', 'Agendamentos', 'Agendamentos'),
(7, 1, 'Consultas', 'Consultas', 'Consultas', 'Consultas', 'Outro menu'),
(8, 1, 'Exames', 'Exames', 'Exames', 'Exames', 'Exames'),
(9, 1, 'Procedimentos', 'Procedimentos', 'Procedimentos', 'Procedimentos', 'Exames'),
(10, 1, 'Cirurgias', 'Cirurgias', 'Cirurgias', 'Cirurgias', 'Exames'),
(11, 1, 'Lembretes', 'Lembretes', 'Lembretes', 'Lembretes', 'Lembretes'),
(12, 1, 'Exames', 'Exames', 'Exames', 'Exames', 'Exames'),
(13, 1, 'Laboratoriais', 'Laboratoriais', 'Laboratoriais', 'Laboratoriais', 'Laboratoriais'),
(14, 1, 'Imagens', 'Imagens', 'Imagens', 'Imagens', 'Imagens'),
(15, 1, 'Outros', 'Outros', 'Outros', 'Outros', 'Outros'),
(16, 1, 'Recursos médicos', 'Recursos médicos', 'Recursos médicos', 'Recursos médicos', 'Recursos médicos'),
(17, 1, 'Atendimentos', 'Atendimentos', 'Atendimentos', 'Atendimentos', 'Atendimentos'),
(18, 1, 'Pacientes', 'Pacientes', 'Pacientes', 'Pacientes', 'Pacientes'),
(19, 1, 'Médicos', 'Médicos', 'Médicos', 'Médicos', 'Médicos'),
(20, 1, 'Especialidades', 'Especialidades', 'Especialidades', 'Especialidades', 'Especialidades'),
(21, 1, 'Gerenciar', 'Gerenciar', 'Gerenciar', 'Gerenciar', 'Gerenciar'),
(22, 1, 'Cadastros', 'Cadastros', 'Cadastros', 'Cadastros', 'Cadastros'),
(1, 2, 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard'),
(2, 2, 'Menus', 'Menus', 'Menus', 'Menus', 'Menus'),
(4, 2, 'Grupo de usuários', 'Grupo de usuários', 'Grupo de usuários', 'Grupo de usuários', 'Grupo de usuários'),
(5, 2, 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard', 'Dashboard');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_menu_secao`
--

CREATE TABLE `tb_acl_menu_secao` (
  `id` int(10) UNSIGNED NOT NULL,
  `secao` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de seções de menus. Seções correspondem ao local onde o menu se localizará: sidebar, header, footer, etc...';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_modulo`
--

CREATE TABLE `tb_acl_modulo` (
  `id` int(11) UNSIGNED NOT NULL,
  `modulo` varchar(50) NOT NULL,
  `path` varchar(50) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 1111,
  `descricao` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `restrict` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de módulos. Módulos correspondem aos diretórios da aplicação: main, admin, etc...';

--
-- Despejando dados para a tabela `tb_acl_modulo`
--

INSERT INTO `tb_acl_modulo` (`id`, `modulo`, `path`, `namespace`, `permissao`, `descricao`, `created_at`, `updated_at`, `restrict`, `status`) VALUES
(1, 'Página pública do site', '/', 'App\\Http\\Controllers\\Main\\', 1111, 'Diretório público do site', '2022-06-23 21:16:39', NULL, 'no', '1'),
(2, 'Administração de conteúdo', '/admin', 'App\\Http\\Controllers\\Admin\\', 0001, 'Diretório de administração do sistema', '2022-06-23 21:16:39', NULL, 'yes', '1'),
(3, 'teste', '/teste', 'App\\Http\\Controllers\\Teste\\', 1111, NULL, '2022-06-24 02:22:18', NULL, 'no', '1'),
(4, 'Autenticação de usuários', '/auth', 'App\\Http\\Controllers\\', 1111, 'AuthController', '2022-06-23 21:16:39', NULL, 'no', '1'),
(6, 'Clínicas', '/clinica', 'App\\Http\\Controllers\\Clinica\\', 1111, 'Módulo para Clínicias', '2022-11-08 16:56:55', NULL, 'yes', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_modulo_controller`
--

CREATE TABLE `tb_acl_modulo_controller` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_modulo` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `use_as` varchar(100) DEFAULT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 1111,
  `restrict` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_acl_modulo_controller`
--

INSERT INTO `tb_acl_modulo_controller` (`id`, `id_modulo`, `descricao`, `controller`, `use_as`, `permissao`, `restrict`, `status`) VALUES
(1, 1, 'Main Home', 'HomeController', NULL, 1111, 'no', '1'),
(2, 1, 'Main Galeria', 'GaleriaController', 'PageController', 1111, 'no', '1'),
(3, 2, 'Admin Home', 'HomeController', 'Dashboard', 1111, 'yes', '1'),
(4, 2, 'Admin Menus', 'MenusController', 'MenusController', 0111, 'yes', '1'),
(5, 4, 'Auth Controller', 'AuthController', 'Auth', 1111, 'no', '1'),
(6, 3, 'Teste Home', 'HomeController', 'TesteController', 1111, 'no', '1'),
(7, 1, 'API Main', 'ApiController', 'API', 0001, 'no', '1'),
(8, 2, 'API Admin', 'ApiController', 'API_Admin', 0001, 'no', '1'),
(9, 2, 'Admin Config', 'ConfigController', 'Config', 1111, 'yes', '1'),
(10, 1, 'Main Sobre Nós', 'AboutController', 'AboutController', 1111, 'no', '1'),
(11, 2, 'Admin usuários', 'UserController', 'UserController', 1111, 'yes', '1'),
(12, 6, 'ClinicCloud - Home', 'HomeController', 'Cl_Dashboard', 1111, 'yes', '1'),
(16, 6, 'API Clinica', 'ApiController', 'API_Clinica', 0001, 'no', '1'),
(18, 6, 'Clinica Config', 'ConfigController', 'C_Config', 1111, 'yes', '1'),
(19, 6, 'Pacientes', 'PacientesController', 'C_Pacientes', 1111, 'yes', '1'),
(20, 6, 'Prontuários de pacientes', 'ProntuariosController', 'C_Prontuarios', 1111, 'yes', '1'),
(21, 6, 'Médicos', 'MedicosController', 'C_Medicos', 1111, 'yes', '1'),
(22, 6, 'Especialidades', 'EspecialidadesController', 'C_Especialidades', 1111, 'yes', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_modulo_controller_descricao`
--

CREATE TABLE `tb_acl_modulo_controller_descricao` (
  `id_controller` int(11) UNSIGNED NOT NULL,
  `id_idioma` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_acl_modulo_controller_descricao`
--

INSERT INTO `tb_acl_modulo_controller_descricao` (`id_controller`, `id_idioma`, `titulo`, `descricao`, `meta_description`, `meta_title`, `meta_keywords`) VALUES
(3, 1, 'Dashboard - pt', 'Dashboard - pt', '', '', ''),
(4, 1, 'Menu - pt', 'Menu - pt', '', '', ''),
(21, 1, 'Médicos', 'Médicos', '', '', ''),
(22, 1, 'Especialidades', 'Especialidades', 'Especialidades', 'Especialidades', ''),
(3, 2, 'Dashboard - en', 'Dashboard - en', '', '', ''),
(4, 2, 'Menu - en', 'Menu - en', '', '', ''),
(11, 2, 'Usuários', 'Usuários', '', '', ''),
(19, 2, 'Pacientes', 'Prontuários de pacientes', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_modulo_grupo`
--

CREATE TABLE `tb_acl_modulo_grupo` (
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `id_modulo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para atribuições de menus a grupos de usuários.';

--
-- Despejando dados para a tabela `tb_acl_modulo_grupo`
--

INSERT INTO `tb_acl_modulo_grupo` (`id_grupo`, `id_modulo`) VALUES
(1, 1),
(1, 2),
(1, 6),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_modulo_routes`
--

CREATE TABLE `tb_acl_modulo_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_controller` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `type` enum('any','get','post','put','head','options','delete','patch','match','resource','map','group') NOT NULL DEFAULT 'get',
  `route` varchar(255) NOT NULL,
  `action` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `filter` longtext DEFAULT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 1111,
  `restrict` enum('yes','no','inherit') NOT NULL DEFAULT 'inherit',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de rotas de menus.';

--
-- Despejando dados para a tabela `tb_acl_modulo_routes`
--

INSERT INTO `tb_acl_modulo_routes` (`id`, `id_controller`, `id_parent`, `type`, `route`, `action`, `name`, `filter`, `permissao`, `restrict`, `status`) VALUES
(1, 1, 0, 'any', '/', 'index', 'main.home', NULL, 1111, 'inherit', '1'),
(2, 1, 0, 'get', '/home', 'index', 'main.home', NULL, 1111, 'inherit', '1'),
(3, 1, 0, 'get', '/inicio', 'index', 'main.home', NULL, 1111, 'inherit', '0'),
(4, 2, 0, 'get', '/embaixada', 'index', 'main.page.embaixada', NULL, 1111, 'inherit', '1'),
(5, 2, 4, 'any', '/', 'index', 'main.page.embaixada', NULL, 1111, 'inherit', '1'),
(6, 2, 4, 'get', '/{page?}', 'show', 'main.page.embaixada.show_page', NULL, 1111, 'inherit', '1'),
(8, 5, 0, 'any', '/login', 'index', 'account.auth.login', NULL, 1111, 'inherit', '1'),
(9, 3, 0, 'any', '/', 'index', 'admin.index', NULL, 1111, 'inherit', '1'),
(10, 3, 0, 'any', '/login', 'index', 'admin.login', NULL, 1111, 'inherit', '1'),
(11, 4, 0, 'any', '/menus', 'index', 'admin.menus', NULL, 1111, 'inherit', '1'),
(12, 4, 11, 'any', '/', 'index', 'admin.menus', NULL, 1111, 'inherit', '1'),
(13, 4, 11, 'get', '/add', 'show_form', 'admin.menus.add', NULL, 1111, 'inherit', '1'),
(14, 6, 0, 'any', '/', 'index', 'teste.index', NULL, 1111, 'inherit', '1'),
(15, 4, 11, 'patch', '/{id}', 'patch', 'admin.menus.patch', NULL, 1111, 'inherit', '1'),
(17, 5, 0, 'post', '/login', 'login_validate', 'account.auth.login', NULL, 1111, 'inherit', '1'),
(18, 5, 0, 'any', '/logout', 'logout', 'logout', NULL, 1111, 'inherit', '1'),
(19, 3, 0, 'any', '/dashboard', 'index', 'admin.dashboard', NULL, 1111, 'inherit', '1'),
(20, 3, 0, 'any', '/database', 'index', 'admin.database', NULL, 1111, 'inherit', '1'),
(21, 7, 0, 'get', '/api/token', 'token', 'main.api.token', NULL, 1111, 'inherit', '1'),
(22, 8, 0, 'get', '/api/token', 'token', 'admin.api.token', NULL, 1111, 'inherit', '1'),
(23, 4, 11, 'delete', '/', 'delete', 'admin.menus.delete', NULL, 1111, 'inherit', '1'),
(24, 7, 0, 'get', '/api/translate/{lang}', 'translate', 'main.api.translate', NULL, 0001, 'inherit', '1'),
(25, 8, 0, 'get', '/api/translate/{lang}', 'translate', 'admin.api.translate', NULL, 0001, 'inherit', '1'),
(26, 4, 11, 'get', '/{id}', 'show_form', 'admin.menus.edit', NULL, 1111, 'inherit', '1'),
(27, 4, 11, 'put', '/', 'edit', 'admin.menus.put', NULL, 1111, 'inherit', '1'),
(28, 4, 11, 'post', '/', 'create', 'admin.menus.post', NULL, 1111, 'inherit', '1'),
(30, 9, 0, 'patch', '/config', 'patch', 'admin.config.patch', NULL, 1111, 'inherit', '1'),
(31, 2, 0, 'any', '/galeria', 'index', 'main.galeria', NULL, 1111, 'inherit', '1'),
(32, 1, 0, 'any', '/contact', 'index', 'main.contact', NULL, 1111, 'inherit', '1'),
(33, 10, 0, 'get', '/about-us', 'index', 'main.about', NULL, 1111, 'inherit', '1'),
(34, 10, 0, 'get', '/services', 'services', 'main.services', NULL, 1111, 'inherit', '1'),
(35, 10, 0, 'any', '/health', 'health', 'main.health', NULL, 1111, 'inherit', '1'),
(36, 11, 0, 'any', '/users', 'index', 'admin.users', NULL, 1111, 'inherit', '1'),
(37, 12, 0, 'any', '/', 'index', 'clinica.index', NULL, 1111, 'inherit', '1'),
(38, 16, 0, 'get', '/api/token', 'token', 'clinica.api.token', NULL, 1111, 'inherit', '1'),
(39, 18, 0, 'patch', '/config', 'patch', 'clinica.config.patch', NULL, 1111, 'inherit', '1'),
(40, 19, 0, 'any', '/pacientes', 'index', 'clinica.pacientes.index', NULL, 1111, 'inherit', '1'),
(41, 19, 40, 'any', '/', 'index', 'clinica.pacientes.index', NULL, 1111, 'inherit', '1'),
(42, 19, 40, 'post', '/', 'create', 'clinica.pacientes.post', NULL, 1111, 'inherit', '1'),
(43, 19, 40, 'get', '/{id}', 'form', 'clinica.pacientes.edit', NULL, 1111, 'inherit', '1'),
(44, 19, 40, 'any', '/cadastro', 'form', 'clinica.pacientes.add', NULL, 1111, 'inherit', '1'),
(45, 19, 40, 'patch', '/{id}', 'patch', 'clinica.pacientes.patch', NULL, 1111, 'inherit', '1'),
(46, 19, 40, 'delete', '/', 'delete', 'clinica.pacientes.delete', NULL, 1111, 'inherit', '1'),
(47, 19, 40, 'put', '/', 'edit', 'clinica.pacientes.put', NULL, 1111, 'inherit', '1'),
(48, 20, 0, 'any', '/prontuarios', 'index', 'clinica.prontuarios.index', NULL, 1111, 'inherit', '1'),
(49, 20, 48, 'any', '/', 'index', 'clinica.prontuarios.index', NULL, 1111, 'inherit', '1'),
(50, 20, 48, 'post', '/', 'create', 'clinica.prontuarios.post', NULL, 1111, 'inherit', '1'),
(51, 20, 48, 'get', '/{id}', 'form', 'clinica.prontuarios.edit', NULL, 1111, 'inherit', '1'),
(52, 20, 48, 'any', '/cadastro', 'form', 'clinica.prontuarios.add', NULL, 1111, 'inherit', '1'),
(53, 20, 48, 'patch', '/{id}', 'patch', 'clinica.prontuarios.patch', NULL, 1111, 'inherit', '1'),
(54, 20, 48, 'delete', '/', 'delete', 'clinica.prontuarios.delete', NULL, 1111, 'inherit', '1'),
(55, 20, 48, 'put', '/', 'edit', 'clinica.prontuarios.put', NULL, 1111, 'inherit', '1'),
(56, 21, 0, 'any', '/medicos', 'index', 'clinica.medicos.index', NULL, 1111, 'inherit', '1'),
(57, 21, 56, 'any', '/', 'index', 'clinica.medicos.index', NULL, 1111, 'inherit', '1'),
(58, 21, 56, 'any', '/cadastro', 'form', 'clinica.medicos.add', NULL, 1111, 'inherit', '1'),
(59, 21, 56, 'post', '/', 'create', 'clinica.medicos.post', NULL, 1111, 'inherit', '1'),
(60, 21, 56, 'get', '/{id}', 'form', 'clinica.medicos.edit', NULL, 1111, 'inherit', '1'),
(61, 21, 56, 'patch', '/{id}', 'patch', 'clinica.medicos.patch', NULL, 1111, 'inherit', '1'),
(62, 21, 56, 'delete', '/', 'delete', 'clinica.medicos.delete', NULL, 1111, 'inherit', '1'),
(63, 21, 56, 'put', '/', 'edit', 'clinica.medicos.put', NULL, 1111, 'inherit', '1'),
(64, 22, 0, 'any', '/especialidades', 'index', 'clinica.especialidades.index', NULL, 1111, 'inherit', '1'),
(65, 22, 64, 'any', '/', 'index', 'clinica.especialidades.index', NULL, 1111, 'inherit', '1'),
(66, 22, 64, 'get', '/cadastro', 'form', 'clinica.especialidades.add', NULL, 1111, 'inherit', '1'),
(67, 22, 64, 'post', '/', 'create', 'clinica.especialidades.post', NULL, 1111, 'inherit', '1'),
(68, 22, 64, 'get', '/{id}', 'form', 'clinica.especialidades.edit', NULL, 1111, 'inherit', '1'),
(69, 22, 64, 'patch', '/{id}', 'patch', 'clinica.especialidades.patch', NULL, 1111, 'inherit', '1'),
(70, 22, 64, 'delete', '/', 'delete', 'clinica.especialidades.delete', NULL, 1111, 'inherit', '1'),
(71, 22, 64, 'put', '/', 'edit', 'clinica.especialidades.put', NULL, 1111, 'inherit', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_usuario`
--

CREATE TABLE `tb_acl_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_grupo` int(10) UNSIGNED NOT NULL,
  `id_gestor` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `permissao` smallint(4) UNSIGNED ZEROFILL NOT NULL DEFAULT 1111,
  `ultimo_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de usuários';

--
-- Despejando dados para a tabela `tb_acl_usuario`
--

INSERT INTO `tb_acl_usuario` (`id`, `id_grupo`, `id_gestor`, `nome`, `email`, `login`, `senha`, `salt`, `permissao`, `ultimo_login`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 0, 'Alisson Guedes', 'alissonguedes87@gmail.com', 'alisson', '6b2a792a47f194d7574a86218ca5f082446d9b4198c658e66d2ec98c5f034905788848e5b38a7', NULL, 1111, '2022-06-23 14:42:56', '2022-06-23 20:43:09', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_usuario_config`
--

CREATE TABLE `tb_acl_usuario_config` (
  `id_usuario` int(10) UNSIGNED NOT NULL COMMENT 'Número sequencial da tabela.',
  `id_modulo` int(10) UNSIGNED NOT NULL,
  `id_config` int(10) UNSIGNED NOT NULL,
  `value` longtext DEFAULT NULL COMMENT 'Endereço do website',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela de configurações do site';

--
-- Despejando dados para a tabela `tb_acl_usuario_config`
--

INSERT INTO `tb_acl_usuario_config` (`id_usuario`, `id_modulo`, `id_config`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'expanded', '2022-08-24 15:31:48', '2022-11-17 23:49:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_usuario_imagem`
--

CREATE TABLE `tb_acl_usuario_imagem` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filesize` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `privada` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acl_usuario_session`
--

CREATE TABLE `tb_acl_usuario_session` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_modulo` int(10) UNSIGNED NOT NULL,
  `token` varchar(60) DEFAULT NULL,
  `ip` varchar(39) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `started_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_acl_usuario_session`
--

INSERT INTO `tb_acl_usuario_session` (`id`, `id_usuario`, `id_modulo`, `token`, `ip`, `user_agent`, `started_at`, `expired_at`) VALUES
(1, 1, 6, NULL, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-11-12 17:52:24', '2022-11-12 20:21:10'),
(2, 1, 6, NULL, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-11-15 04:59:13', '2022-11-15 05:13:22'),
(3, 1, 6, NULL, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-11-15 02:20:18', '2022-11-15 05:24:30'),
(4, 1, 6, 'ec216071b5bc45d33353b728d955447763769cea63ab8', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', '2022-11-17 23:43:22', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acomodacao`
--

CREATE TABLE `tb_acomodacao` (
  `id` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `tb_acomodacao`
--

INSERT INTO `tb_acomodacao` (`id`, `descricao`, `status`) VALUES
(1, 'Outros', '1'),
(2, 'Apartamento', '1'),
(3, 'Enfermaria', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_medico` int(11) UNSIGNED NOT NULL,
  `dia` tinyint(1) UNSIGNED NOT NULL,
  `mes` tinyint(2) UNSIGNED ZEROFILL DEFAULT 00,
  `ano` tinyint(4) UNSIGNED ZEROFILL DEFAULT 0000,
  `hora_inicial` time NOT NULL DEFAULT '00:00:00',
  `hora_final` time NOT NULL DEFAULT '00:00:00',
  `observacao` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela de cadastro de dias de atendimentos da agenda médica';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_atendimento`
--

CREATE TABLE `tb_atendimento` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `id_medico` int(11) UNSIGNED NOT NULL,
  `id_paciente` int(11) UNSIGNED NOT NULL,
  `id_parent` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `data_agendamento` datetime NOT NULL DEFAULT current_timestamp(),
  `hora_inicial` time NOT NULL DEFAULT '00:00:00',
  `hora_final` time NOT NULL DEFAULT '00:00:00',
  `tipo` enum('consulta','retorno','exame','procedimento','cirurgia','outros') DEFAULT 'consulta',
  `status` enum('agendado','adiado','remarcado','ausente','cancelado') DEFAULT 'agendado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de atendimentos realizados.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_atendimento_notas`
--

CREATE TABLE `tb_atendimento_notas` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `id_severidade` int(11) UNSIGNED NOT NULL,
  `id_atendimento` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de notas em atendimentos realizados.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Numero sequencial',
  `titulo` varchar(255) DEFAULT NULL COMMENT 'Título principal do banner.',
  `slug` varchar(255) DEFAULT NULL COMMENT 'Título sem caracteres especiais para identificar o banner.',
  `descricao` text DEFAULT NULL COMMENT 'Texto descritivo do banner',
  `autor` varchar(50) NOT NULL COMMENT 'Autor de criação do banner',
  `ordem` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ordem para listagem do banner',
  `publish_up` date NOT NULL COMMENT 'Data para exibição do banner',
  `publish_down` date NOT NULL COMMENT 'Data para parar exibição do banner',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data de criação do banner',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Data de criação do banner',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Situação de exibição do banner. 0 - Não exibir; 1 - Exibir.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_banner_descricao`
--

CREATE TABLE `tb_banner_descricao` (
  `id_banner` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_banner_imagem`
--

CREATE TABLE `tb_banner_imagem` (
  `id_banner` int(10) UNSIGNED NOT NULL,
  `id_midia` int(10) UNSIGNED NOT NULL,
  `clicks` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quantidade de clicks/visualizações do banner',
  `url` varchar(255) DEFAULT NULL COMMENT 'Link para artigo',
  `ordem` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ordem para listagem do banner',
  `publish_up` date DEFAULT NULL COMMENT 'Data para exibição do banner',
  `publish_down` date DEFAULT NULL COMMENT 'Data para parar exibição do banner',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_banner_imagem_descricao`
--

CREATE TABLE `tb_banner_imagem_descricao` (
  `id_banner` int(10) UNSIGNED NOT NULL,
  `id_midia` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `imagem` varchar(255) DEFAULT NULL,
  `ordem` int(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id`, `id_parent`, `imagem`, `ordem`, `created_at`, `updated_at`, `status`) VALUES
(1, 0, NULL, 0, '2022-11-17 21:02:55', NULL, '1'),
(2, 0, NULL, 0, '2022-11-17 21:02:59', NULL, '1'),
(3, 0, NULL, 0, '2022-11-17 21:03:04', NULL, '1'),
(4, 0, NULL, 0, '2022-11-17 21:03:05', NULL, '1'),
(5, 2, NULL, 0, '2022-11-17 21:03:06', NULL, '1'),
(6, 2, NULL, 0, '2022-11-17 21:03:07', NULL, '1'),
(7, 2, NULL, 0, '2022-11-17 21:03:07', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categoria_descricao`
--

CREATE TABLE `tb_categoria_descricao` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_categoria_descricao`
--

INSERT INTO `tb_categoria_descricao` (`id_categoria`, `id_idioma`, `titulo`, `descricao`, `meta_description`, `meta_title`, `meta_keywords`) VALUES
(1, 1, 'Consulta', '', '', '', ''),
(2, 1, 'Exame', '', '', '', ''),
(3, 1, 'Procedimento', '', '', '', ''),
(4, 1, 'Cirurgia', '', '', '', ''),
(5, 1, 'Laboratorial', '', '', '', ''),
(6, 1, 'Imagem', '', '', '', ''),
(7, 1, 'Outros', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente_email`
--

CREATE TABLE `tb_cliente_email` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente_telefone`
--

CREATE TABLE `tb_cliente_telefone` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `telefone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_comentario`
--

CREATE TABLE `tb_comentario` (
  `id` int(10) UNSIGNED NOT NULL,
  `autor` varchar(100) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `estrelas` int(1) NOT NULL DEFAULT 5,
  `texto` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data de criação do comentário',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Data a última modificação do comentário',
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_convenio`
--

CREATE TABLE `tb_convenio` (
  `id` int(11) UNSIGNED NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de convênios de pacientes.';

--
-- Despejando dados para a tabela `tb_convenio`
--

INSERT INTO `tb_convenio` (`id`, `codigo`, `descricao`, `status`) VALUES
(1, '0', 'Sem convênio', '1'),
(2, '1', 'Particular', '1'),
(3, '2', 'HapVida', '1'),
(4, '3', 'Bradesco Saúde', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_distribuidor`
--

CREATE TABLE `tb_distribuidor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(3) NOT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_distribuidor_email`
--

CREATE TABLE `tb_distribuidor_email` (
  `id_distribuidor` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_distribuidor_telefone`
--

CREATE TABLE `tb_distribuidor_telefone` (
  `id_distribuidor` int(10) UNSIGNED NOT NULL,
  `telefone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_email`
--

CREATE TABLE `tb_email` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_reply` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Chave primária da tabela.',
  `cnpj` varchar(18) NOT NULL COMMENT 'CNPJ da empresa.',
  `inscricao_estadual` varchar(14) NOT NULL COMMENT 'Inscrição Estadual da empresa',
  `inscricao_municipal` varchar(20) NOT NULL COMMENT 'Inscrição Municipal da empresa.',
  `razao_social` varchar(200) NOT NULL COMMENT 'Razão Social da empresa',
  `nome_fantasia` varchar(200) NOT NULL COMMENT 'Nome Fantasia da empresa.',
  `cep` varchar(9) NOT NULL COMMENT 'CEP do endereço da empresa',
  `endereco` varchar(200) NOT NULL COMMENT 'Endereço da empresa',
  `numero` varchar(11) NOT NULL COMMENT 'Número do endereço da empresa',
  `bairro` varchar(200) NOT NULL COMMENT 'Bairro do endereço da empresa',
  `complemento` varchar(200) DEFAULT NULL COMMENT 'Complemento do endereço da empresa',
  `cidade` varchar(200) NOT NULL COMMENT 'Cidade',
  `estado` varchar(3) NOT NULL COMMENT 'Estado',
  `quem_somos` text DEFAULT NULL COMMENT 'Descrição da empresa',
  `quem_somos_imagem` varchar(255) DEFAULT NULL,
  `distribuidor_imagem` varchar(255) DEFAULT NULL,
  `contato_imagem` varchar(255) DEFAULT NULL,
  `telefone` varchar(16) NOT NULL COMMENT 'Número do telefone da empresa',
  `celular` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT 'E-mail da empresa',
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `gplus` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `gmaps` varchar(255) DEFAULT NULL,
  `aliquota_imposto` decimal(10,3) UNSIGNED NOT NULL DEFAULT 0.000 COMMENT 'Alíquota de imposto da empresa',
  `tributacao` enum('SIMPLES NACIONAL','SN - EXCESSO DE SUB-LIMITE DA RECEITA','REGIME NORMAL') NOT NULL DEFAULT 'SIMPLES NACIONAL' COMMENT 'Tipo de tributação',
  `certificado` blob DEFAULT NULL COMMENT 'Localização do arquivo de certificado digital para emissão de notas fiscais',
  `senha_certificado` varchar(255) NOT NULL COMMENT 'Senha do certificado digital',
  `ambiente` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Tipo do ambiente de emissão de notas fiscais. 0 - Homologação; 1 - Produção',
  `sequence_nfe` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Número da última nota fiscal eletrônica emitida.',
  `sequence_nfce` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Número da última nota fiscal de consumidor emitida.',
  `serie_nfe` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00 COMMENT 'Série da nota fiscal eletrônica.',
  `serie_nfce` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00 COMMENT 'Série da nota fiscal de consumidor.',
  `tokencsc` varchar(6) DEFAULT NULL COMMENT 'Token CSC',
  `csc` varchar(36) DEFAULT NULL COMMENT 'CSC',
  `matriz` enum('S','N') NOT NULL DEFAULT 'N' COMMENT 'Identifica como loja Matriz ou Filial',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela de cadastro de lojas/empresas';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_especialidade`
--

CREATE TABLE `tb_especialidade` (
  `id` int(11) UNSIGNED NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de especialidades médicas';

--
-- Despejando dados para a tabela `tb_especialidade`
--

INSERT INTO `tb_especialidade` (`id`, `especialidade`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'Otorrino', 'Médico especializado em tratamento de saúde de nariz, ouvido e garganta.', '2022-11-16 03:29:01', NULL),
(2, 'Cardiologista', 'Cardiologista', '2022-11-16 03:29:01', NULL),
(3, 'Neurologista', 'Médico especializado em tratamento de saúde da cabeça e do sistema nervoso.', '2022-11-16 03:29:01', NULL),
(4, 'Pneumulogista', 'Médico especializado em tratamento de saúde do sistema respiratório.', '2022-11-16 03:29:01', NULL),
(5, 'Ortopedista', 'Médico especializado em problemas de ossos.', '2022-11-16 04:06:05', NULL),
(7, 'Psicólogo', NULL, '2022-11-16 05:50:24', NULL),
(8, 'Endocrinologista', 'Médico que cuida da saúde dos rins.', '2022-11-16 05:50:58', NULL),
(9, 'Dentista', 'Médico que cuida da saúde dos dentes.', '2022-11-16 06:02:33', NULL),
(10, 'Clínica médica', NULL, '2022-11-16 06:55:12', NULL),
(11, 'Geriatria', NULL, '2022-11-16 06:55:53', NULL),
(12, 'Oftalmologia', NULL, '2022-11-16 06:57:57', NULL),
(13, 'Medicina do exercício e do esporte', NULL, '2022-11-16 06:58:52', NULL),
(14, 'Oncologia', NULL, '2022-11-16 07:00:11', NULL),
(15, 'Dermatologia', NULL, '2022-11-16 07:01:35', NULL),
(16, 'Urgência e emergência', NULL, '2022-11-16 07:02:19', NULL),
(17, 'Infectologia', NULL, '2022-11-16 07:02:36', NULL),
(18, 'Cirurgia', NULL, '2022-11-16 07:03:11', NULL),
(19, 'Neurocirurgia', NULL, '2022-11-16 07:03:20', NULL),
(20, 'Cirurgia geral', NULL, '2022-11-16 07:03:34', NULL),
(21, 'Cirurgia plástica', NULL, '2022-11-16 07:03:41', NULL),
(22, 'Ortopedia', NULL, '2022-11-16 07:03:55', NULL),
(23, 'Anestesiologia', 'Médico responsável por aplicação de anestesias.', '2022-11-16 07:04:01', '2022-11-16 17:55:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_estado_civil`
--

CREATE TABLE `tb_estado_civil` (
  `id` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `tb_estado_civil`
--

INSERT INTO `tb_estado_civil` (`id`, `descricao`) VALUES
(1, 'Solteiro'),
(2, 'Casado'),
(3, 'Separado'),
(4, 'Divorciado'),
(5, 'Viúvo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_etnia`
--

CREATE TABLE `tb_etnia` (
  `id` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_etnia`
--

INSERT INTO `tb_etnia` (`id`, `descricao`) VALUES
(1, 'Não informado'),
(2, 'Branca'),
(3, 'Preta'),
(4, 'Parda'),
(5, 'Amarela'),
(6, 'Indigena');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_galeria`
--

CREATE TABLE `tb_galeria` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `publish_up` date NOT NULL COMMENT 'Data para exibição do banner',
  `publish_down` date NOT NULL COMMENT 'Data para parar exibição do banner',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_galeria_descricao`
--

CREATE TABLE `tb_galeria_descricao` (
  `id_galeria` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_galeria_imagem`
--

CREATE TABLE `tb_galeria_imagem` (
  `id_galeria` int(10) UNSIGNED NOT NULL,
  `id_midia` int(10) UNSIGNED NOT NULL,
  `clicks` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `url` varchar(255) DEFAULT NULL,
  `ordem` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ordem para listagem do banner',
  `publish_up` date NOT NULL COMMENT 'Data para exibição do banner',
  `publish_down` date NOT NULL COMMENT 'Data para parar exibição do banner',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT 'Situação de exibição do banner. 0 - Não exibir; 1 - Exibir.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_lead`
--

CREATE TABLE `tb_lead` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_link`
--

CREATE TABLE `tb_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `target` varchar(6) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela de adição de links rápidos do site';

--
-- Despejando dados para a tabela `tb_link`
--

INSERT INTO `tb_link` (`id`, `titulo`, `descricao`, `slug`, `link`, `target`, `imagem`, `created_at`, `updated_at`, `status`) VALUES
(1, '4', '', '', NULL, NULL, NULL, '2022-07-01 08:27:42', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_link_descricao`
--

CREATE TABLE `tb_link_descricao` (
  `id_link` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_medico`
--

CREATE TABLE `tb_medico` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_especialidade` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `crm` varchar(14) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para cadastro de atendimentos realizados.';

--
-- Despejando dados para a tabela `tb_medico`
--

INSERT INTO `tb_medico` (`id`, `id_especialidade`, `nome`, `cpf`, `rg`, `crm`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Marcos', '123.456.789-10', '1234123412', '12341234', '2022-11-16 15:41:45', '2022-11-17 05:38:36', '1'),
(2, 1, 'Maria', '123.412.341-23', '12341234', '1234', '2022-11-16 15:47:56', '2022-11-16 19:14:56', '1'),
(6, 5, 'Antônio', '123.412.341-22', '123412345', '123412345', '2022-11-16 15:51:55', '2022-11-16 19:16:05', '1'),
(7, 23, 'Alisson Guedes', '069.422.924-51', '3177241', '589284-01', '2022-11-16 16:16:38', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_midia`
--

CREATE TABLE `tb_midia` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filesize` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Tamanho da imagem do banner',
  `mime_type` varchar(45) DEFAULT NULL,
  `path` varchar(255) NOT NULL COMMENT 'Data de criação do banner',
  `descricao` varchar(500) DEFAULT NULL,
  `clicks` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quantidade de clicks/visualizações do banner',
  `url` varchar(255) DEFAULT NULL COMMENT 'Link para artigo',
  `ordem` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Ordem para listagem do banner',
  `autor` varchar(45) NOT NULL DEFAULT 'none',
  `publish_up` date DEFAULT NULL COMMENT 'Data para exibição do banner',
  `publish_down` date DEFAULT NULL COMMENT 'Data para parar exibição do banner',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `tags` text DEFAULT NULL COMMENT 'Tags de pesquisa do banner',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_midia_descricao`
--

CREATE TABLE `tb_midia_descricao` (
  `id_midia` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_paciente`
--

CREATE TABLE `tb_paciente` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `codigo` varchar(11) NOT NULL,
  `id_convenio` int(11) UNSIGNED NOT NULL,
  `matricula_convenio` varchar(50) DEFAULT NULL,
  `validade_convenio` date DEFAULT NULL,
  `id_acomodacao` int(11) UNSIGNED NOT NULL,
  `id_estado_civil` int(11) UNSIGNED NOT NULL,
  `id_etnia` int(11) UNSIGNED NOT NULL DEFAULT 6,
  `sexo` enum('M','F') DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `cns` varchar(20) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `notas` varchar(1000) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(16) DEFAULT NULL,
  `celular` varchar(16) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `receber_sms` enum('on','off') NOT NULL DEFAULT 'off',
  `receber_email` enum('on','off') NOT NULL DEFAULT 'off',
  `receber_notificacoes` enum('on','off') NOT NULL DEFAULT 'off',
  `obito` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `tb_paciente`
--

INSERT INTO `tb_paciente` (`id`, `nome`, `imagem`, `codigo`, `id_convenio`, `matricula_convenio`, `validade_convenio`, `id_acomodacao`, `id_estado_civil`, `id_etnia`, `sexo`, `data_nascimento`, `cpf`, `rg`, `cns`, `mae`, `pai`, `profissao`, `notas`, `logradouro`, `numero`, `complemento`, `cep`, `cidade`, `bairro`, `uf`, `pais`, `email`, `telefone`, `celular`, `created_at`, `updated_at`, `receber_sms`, `receber_email`, `receber_notificacoes`, `obito`, `status`) VALUES
(18, 'Benjamin', NULL, 'P-165885', 2, '1234', '2022-11-14', 2, 2, 2, 'M', '2022-05-06', '123', '1234', '1234', 'teste', 'teste', NULL, 'teste', '1234', '100', 'asdf', '58076-100', 'asdf', 'asdf', 'asdf', 'asdf', NULL, '(12) 3412.3412', '(12) 3 4123.4123', '2022-11-12 18:08:25', '2022-11-14 22:20:05', 'off', 'off', 'off', '0', '0'),
(19, 'Alisson Guedes Pereira', NULL, 'P-598909', 4, NULL, NULL, 2, 2, 2, 'M', '1987-01-18', '069.422.924-51', '12341234', '1234123412', 'Terezinha de Fátima Guedes Pereira', 'Alexandre Pereira Clementino', NULL, 'Teste', 'Rua Ex-Combatente Assis Luis', '100', 'AP 401 F', '58076-100', 'João Pessoa', 'Geisel', 'PB', 'Brasil', 'alissonguedes87@gmail.com', '(83) 3339.4800', '(83) 9 8811.2444', '2022-11-12 18:22:00', '2022-11-16 03:42:36', 'off', 'off', 'off', '0', '1'),
(20, 'Alisson Guedes Pereira', NULL, 'P-233594', 2, NULL, NULL, 3, 1, 2, 'M', '1987-01-18', '069.422.924-51', '12341234', '1234123412', 'Terezinha de Fátima Guedes Pereira', 'Alexandre Pereira Clementino', NULL, 'Teste', 'Rua Ex-Combatente Assis Luis', '100', 'AP 401 F', '58076-100', 'João Pessoa', 'Geisel', 'PB', 'Brasil', 'alissonguedes87@gmail.com', '(83) 3339.4801', '(83) 9 8811.2444', '2022-11-12 18:23:18', '2022-11-13 06:24:16', 'off', 'off', 'off', '0', '1'),
(21, 'Alisson Guedes Pereira', NULL, 'P-921710', 1, NULL, NULL, 3, 1, 2, NULL, '1987-01-18', '069.422.924-51', '12341234', '1234123412', 'Terezinha de Fátima Guedes Pereira', 'Alexandre Pereira Clementino', NULL, 'Teste', 'Rua Ex-Combatente Assis Luis', '100', 'AP 401 F', '58076-100', 'João Pessoa', 'Geisel', 'PB', 'Brasil', 'alissonguedes87@gmail.com', '(83) 3339.4802', '(83) 9 8811.2444', '2022-11-12 18:24:23', '2022-11-13 06:15:19', 'off', 'off', 'off', '0', '1'),
(26, 'alisson', NULL, 'P-924140', 1, '1234', '2022-11-30', 3, 2, 3, 'M', '2022-11-11', '123.412.341-23', '1234123', '1234123421', 'teste', 'teste', NULL, 'teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alissonguedes87@gmail.com', '(83) 9881.1124', '(12) 3 4123.4123', '2022-11-13 05:52:45', NULL, 'off', 'off', 'off', '0', '1'),
(27, 'teste1234', NULL, 'P-803633', 1, '1234', '2022-11-22', 3, 1, 1, 'M', '2022-11-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 05:55:35', NULL, 'off', 'off', 'off', '0', '0'),
(28, 'Chris', NULL, 'P-312079', 1, '1234', '2022-11-20', 3, 1, 1, 'F', '2022-11-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 05:56:21', '2022-11-14 10:01:45', 'off', 'off', 'off', '0', '1'),
(29, 'teste', NULL, 'P-984646', 1, NULL, NULL, 1, 1, 1, NULL, '2022-11-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 06:03:39', NULL, 'off', 'off', 'off', '0', '1'),
(30, 'Teste 1', NULL, 'P-733972', 1, NULL, NULL, 1, 1, 1, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 06:04:34', '2022-11-14 10:02:46', 'off', 'off', 'off', '0', '1'),
(31, 'Alane', 'assets/clinica/img/pacientes/0f21269a0d97473fc20baca1b1611859297e94e1.png', 'P-225483', 1, NULL, NULL, 1, 1, 1, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 06:05:47', '2022-11-14 09:21:54', 'off', 'off', 'off', '0', '1'),
(32, 'teste', 'assets/clinica/img/pacientes/0f21269a0d97473fc20baca1b1611859297e94e1.png', 'P-937843', 1, NULL, NULL, 1, 1, 1, 'F', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 06:20:54', '2022-11-14 09:37:16', 'off', 'off', 'off', '0', '1'),
(33, 'Benjamin', 'assets/clinica/img/pacientes/53f80ff7e7f9cec85406d4605912c3f94367be9b.jpg', 'P-991190', 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 06:23:40', '2022-11-14 22:16:34', 'off', 'off', 'off', '0', '1'),
(34, 'teste', NULL, 'P-779749', 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 21:22:28', NULL, 'off', 'off', 'off', '0', '1'),
(35, 'Novo cliente', NULL, 'P-421395', 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-13 22:41:52', NULL, 'off', 'off', 'off', '0', '1'),
(36, 'Teste 2', NULL, 'P-910774', 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 03:58:55', '2022-11-14 09:04:03', 'off', 'off', 'off', '0', '1'),
(37, 'Aline', NULL, 'P-946492', 1, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 05:54:37', '2022-11-14 22:28:57', 'off', 'off', 'off', '0', '0'),
(38, 'Maria da Penha', NULL, 'P-733005', 1, NULL, NULL, 1, 2, 1, 'F', '1969-11-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-14 23:29:07', '2022-11-15 02:29:25', 'off', 'off', 'off', '0', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_paciente_nota`
--

CREATE TABLE `tb_paciente_nota` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_paciente` int(11) UNSIGNED NOT NULL,
  `id_severidade` int(11) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_post`
--

CREATE TABLE `tb_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_controller` int(10) UNSIGNED NOT NULL,
  `id_parent` int(10) UNSIGNED DEFAULT 0,
  `permissao` smallint(4) UNSIGNED NOT NULL DEFAULT 1111,
  `tipo` varchar(20) NOT NULL DEFAULT 'post' COMMENT 'Informa o tipo de página: Página simples ou galeria de fotos',
  `autor` varchar(45) DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_post`
--

INSERT INTO `tb_post` (`id`, `id_controller`, `id_parent`, `permissao`, `tipo`, `autor`, `arquivo`, `imagem`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 0, 1111, 'post', NULL, NULL, NULL, '2022-07-01 08:28:05', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_post_descricao`
--

CREATE TABLE `tb_post_descricao` (
  `id_post` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitulo` varchar(45) DEFAULT NULL,
  `texto` varchar(45) DEFAULT NULL,
  `meta_description` varchar(45) DEFAULT NULL,
  `meta_keywords` varchar(45) DEFAULT NULL,
  `meta_title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_post_link`
--

CREATE TABLE `tb_post_link` (
  `id_post` int(10) UNSIGNED NOT NULL,
  `id_link` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela para vincluar um link a uma página';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_post_midia`
--

CREATE TABLE `tb_post_midia` (
  `id_pagina` int(10) UNSIGNED NOT NULL,
  `id_midia` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_distribuidor` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `modo_uso` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `valor` decimal(10,3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto_categoria`
--

CREATE TABLE `tb_produto_categoria` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto_descricao`
--

CREATE TABLE `tb_produto_descricao` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto_imagem`
--

CREATE TABLE `tb_produto_imagem` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `id_midia` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_severidade_nota`
--

CREATE TABLE `tb_severidade_nota` (
  `id` int(11) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `color` varchar(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_config`
--

CREATE TABLE `tb_sys_config` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Número sequencial da tabela.',
  `id_modulo` int(10) UNSIGNED NOT NULL,
  `config` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL COMMENT 'Endereço do website',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabela de configurações do site';

--
-- Despejando dados para a tabela `tb_sys_config`
--

INSERT INTO `tb_sys_config` (`id`, `id_modulo`, `config`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 'main-menu', '1', '2022-08-19 03:16:07', NULL),
(2, 2, 'language', 'pt_br', '2022-08-19 03:16:07', NULL),
(3, 2, 'main-menu-type', 'collapsed', '2022-08-19 03:16:07', '2022-08-24 15:19:16'),
(4, 6, 'main-menu', '2', '2022-08-19 03:16:07', NULL),
(5, 6, 'language', 'pt_br', '2022-08-19 03:16:07', NULL),
(6, 6, 'main-menu-type', 'collapsed', '2022-08-19 03:16:07', '2022-08-24 15:19:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_dicionario`
--

CREATE TABLE `tb_sys_dicionario` (
  `id` int(10) UNSIGNED NOT NULL,
  `palavra` text NOT NULL,
  `definicao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_idioma`
--

CREATE TABLE `tb_sys_idioma` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `sigla` varchar(7) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tb_sys_idioma`
--

INSERT INTO `tb_sys_idioma` (`id`, `descricao`, `sigla`, `label`, `imagem`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Português', 'pt_br', 'portugues', NULL, '2022-07-01 08:26:39', NULL, '1'),
(2, 'Inglês', 'en', 'ingles', NULL, '2022-07-01 08:26:39', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_sys_idioma_dicionario`
--

CREATE TABLE `tb_sys_idioma_dicionario` (
  `id_idioma` int(10) UNSIGNED NOT NULL,
  `id_palavra` int(10) UNSIGNED NOT NULL,
  `traducao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_acl_grupo`
--
ALTER TABLE `tb_acl_grupo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grupo` (`grupo`);

--
-- Índices de tabela `tb_acl_menu`
--
ALTER TABLE `tb_acl_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_acl_menu_tb_pagina1_idx` (`id_modulo`);

--
-- Índices de tabela `tb_acl_menu_descricao`
--
ALTER TABLE `tb_acl_menu_descricao`
  ADD PRIMARY KEY (`id_idioma`,`id_menu`),
  ADD KEY `fk_tb_produto_descricao_tb_produto1_idx` (`id_menu`),
  ADD KEY `fk_tb_produto_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_acl_menu_item`
--
ALTER TABLE `tb_acl_menu_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_menu_item_id_menu` (`id_menu`),
  ADD KEY `fk_tb_menu_item_id_item_post` (`id_item`);

--
-- Índices de tabela `tb_acl_menu_item_descricao`
--
ALTER TABLE `tb_acl_menu_item_descricao`
  ADD PRIMARY KEY (`id_idioma`,`id_item`),
  ADD KEY `fk_tb_menu_item_descricao_id_item` (`id_item`),
  ADD KEY `fk_tb_menu_item_descricao_id_idioma` (`id_idioma`);

--
-- Índices de tabela `tb_acl_menu_secao`
--
ALTER TABLE `tb_acl_menu_secao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_acl_modulo`
--
ALTER TABLE `tb_acl_modulo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modulo` (`modulo`),
  ADD UNIQUE KEY `diretorio` (`path`);

--
-- Índices de tabela `tb_acl_modulo_controller`
--
ALTER TABLE `tb_acl_modulo_controller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id_modulo_controller` (`controller`,`id_modulo`),
  ADD UNIQUE KEY `use_as` (`use_as`),
  ADD KEY `fk_tb_acl_modulo_classe_tb_acl_modulo1_idx` (`id_modulo`);

--
-- Índices de tabela `tb_acl_modulo_controller_descricao`
--
ALTER TABLE `tb_acl_modulo_controller_descricao`
  ADD PRIMARY KEY (`id_idioma`,`id_controller`),
  ADD KEY `fk_tb_acl_modulo_controller_descricao_id_controller_id_item` (`id_controller`,`id_idioma`);

--
-- Índices de tabela `tb_acl_modulo_grupo`
--
ALTER TABLE `tb_acl_modulo_grupo`
  ADD PRIMARY KEY (`id_grupo`,`id_modulo`),
  ADD KEY `fk_tb_acl_menu_grupo_id_grupo` (`id_grupo`),
  ADD KEY `fk_tb_acl_modulo_grupo_tb_acl_modulo1_idx` (`id_modulo`);

--
-- Índices de tabela `tb_acl_modulo_routes`
--
ALTER TABLE `tb_acl_modulo_routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `route_controller_action_name_UNIQUE` (`type`,`route`,`action`,`name`) USING BTREE,
  ADD KEY `fk_tb_acl_rotas_tb_acl_modulo_classe1_idx` (`id_controller`);

--
-- Índices de tabela `tb_acl_usuario`
--
ALTER TABLE `tb_acl_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_tb_acl_usuario_id_grupo` (`id_grupo`);

--
-- Índices de tabela `tb_acl_usuario_config`
--
ALTER TABLE `tb_acl_usuario_config`
  ADD PRIMARY KEY (`id_usuario`,`id_config`),
  ADD KEY `fk_tb_acl_usuario_config_id_config` (`id_config`),
  ADD KEY `fk_tb_acl_usuario_config_id_modulo` (`id_modulo`);

--
-- Índices de tabela `tb_acl_usuario_imagem`
--
ALTER TABLE `tb_acl_usuario_imagem`
  ADD PRIMARY KEY (`id`,`id_usuario`),
  ADD KEY `tb_acl_usuario_imagem_id_usuario` (`id_usuario`);

--
-- Índices de tabela `tb_acl_usuario_session`
--
ALTER TABLE `tb_acl_usuario_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_acl_usuario_session_id_usuario` (`id_usuario`),
  ADD KEY `fk_tb_acl_usuario_session_id_modulo` (`id_modulo`);

--
-- Índices de tabela `tb_acomodacao`
--
ALTER TABLE `tb_acomodacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_agenda_id_medico` (`id_medico`),
  ADD KEY `horario_atendimento_UNIQUE` (`dia`,`mes`,`ano`,`hora_inicial`,`hora_final`) USING BTREE;

--
-- Índices de tabela `tb_atendimento`
--
ALTER TABLE `tb_atendimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_atendimento_id_medico` (`id_medico`),
  ADD KEY `fk_tb_atendimento_id_paciente` (`id_paciente`);

--
-- Índices de tabela `tb_atendimento_notas`
--
ALTER TABLE `tb_atendimento_notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_atendimento_id_severidade` (`id_severidade`),
  ADD KEY `fk_tb_atendimento_id_atendimento` (`id_atendimento`),
  ADD KEY `fk_tb_atendimento_id_usuario` (`id_usuario`);

--
-- Índices de tabela `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_banner_descricao`
--
ALTER TABLE `tb_banner_descricao`
  ADD PRIMARY KEY (`id_banner`,`id_idioma`),
  ADD KEY `fk_tb_banner_descricao_tb_banner1_idx` (`id_banner`),
  ADD KEY `fk_tb_banner_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_banner_imagem`
--
ALTER TABLE `tb_banner_imagem`
  ADD PRIMARY KEY (`id_banner`,`id_midia`),
  ADD UNIQUE KEY `id_banner_UNIQUE` (`id_banner`),
  ADD UNIQUE KEY `id_midia_UNIQUE` (`id_midia`),
  ADD KEY `fk_tb_banner_imagem_tb_banner1_idx` (`id_banner`),
  ADD KEY `fk_tb_banner_imagem_tb_midia1_idx` (`id_midia`);

--
-- Índices de tabela `tb_banner_imagem_descricao`
--
ALTER TABLE `tb_banner_imagem_descricao`
  ADD PRIMARY KEY (`id_banner`,`id_midia`,`id_idioma`),
  ADD KEY `fk_tb_banner_imagem_descricao_tb_sys_idioma1_idx` (`id_idioma`),
  ADD KEY `fk_tb_banner_imagem_descricao_tb_banner_imagem1_idx` (`id_banner`,`id_midia`);

--
-- Índices de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_categoria_descricao`
--
ALTER TABLE `tb_categoria_descricao`
  ADD PRIMARY KEY (`id_categoria`,`id_idioma`),
  ADD UNIQUE KEY `titulo_UNIQUE` (`titulo`),
  ADD KEY `fk_tb_categoria_descricao_tb_categoria1_idx` (`id_categoria`),
  ADD KEY `fk_tb_categoria_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_cliente_email`
--
ALTER TABLE `tb_cliente_email`
  ADD PRIMARY KEY (`id_cliente`,`email`),
  ADD KEY `tb_cliente_email_id_cliente` (`id_cliente`);

--
-- Índices de tabela `tb_cliente_telefone`
--
ALTER TABLE `tb_cliente_telefone`
  ADD PRIMARY KEY (`id_cliente`,`telefone`),
  ADD KEY `tb_cliente_telefone_id_cliente` (`id_cliente`);

--
-- Índices de tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_convenio`
--
ALTER TABLE `tb_convenio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_distribuidor`
--
ALTER TABLE `tb_distribuidor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_distribuidor_email`
--
ALTER TABLE `tb_distribuidor_email`
  ADD PRIMARY KEY (`id_distribuidor`,`email`),
  ADD KEY `fk_tb_distribuidor_email_id_distribuidor` (`id_distribuidor`);

--
-- Índices de tabela `tb_distribuidor_telefone`
--
ALTER TABLE `tb_distribuidor_telefone`
  ADD PRIMARY KEY (`id_distribuidor`,`telefone`),
  ADD KEY `fk_tb_distribuidor_telefone_id_distribuidor` (`id_distribuidor`);

--
-- Índices de tabela `tb_email`
--
ALTER TABLE `tb_email`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `tb_especialidade`
--
ALTER TABLE `tb_especialidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_estado_civil`
--
ALTER TABLE `tb_estado_civil`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_etnia`
--
ALTER TABLE `tb_etnia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_galeria`
--
ALTER TABLE `tb_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_galeria_descricao`
--
ALTER TABLE `tb_galeria_descricao`
  ADD PRIMARY KEY (`id_galeria`,`id_idioma`),
  ADD KEY `fk_tb_galeria_descricao_tb_galeria1_idx` (`id_galeria`),
  ADD KEY `fk_tb_galeria_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_galeria_imagem`
--
ALTER TABLE `tb_galeria_imagem`
  ADD PRIMARY KEY (`id_galeria`,`id_midia`),
  ADD KEY `fk_tb_album_foto_id_album` (`id_galeria`),
  ADD KEY `fk_tb_galeria_imagem_tb_midia1_idx` (`id_midia`);

--
-- Índices de tabela `tb_lead`
--
ALTER TABLE `tb_lead`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_lead_id_cliente` (`id_cliente`),
  ADD KEY `tb_lead_id_produto` (`id_produto`);

--
-- Índices de tabela `tb_link`
--
ALTER TABLE `tb_link`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_link_descricao`
--
ALTER TABLE `tb_link_descricao`
  ADD PRIMARY KEY (`id_link`,`id_idioma`),
  ADD KEY `fk_tb_link_descricao_tb_link1_idx` (`id_link`),
  ADD KEY `fk_tb_link_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_medico`
--
ALTER TABLE `tb_medico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `crm` (`crm`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD KEY `fk_tb_medico_id_especialidade` (`id_especialidade`);

--
-- Índices de tabela `tb_midia`
--
ALTER TABLE `tb_midia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_midia_descricao`
--
ALTER TABLE `tb_midia_descricao`
  ADD PRIMARY KEY (`id_midia`,`id_idioma`),
  ADD KEY `fk_tb_midia_descricao_tb_midia1_idx` (`id_midia`),
  ADD KEY `fk_tb_midia_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_tb_paciente_id_convenio` (`id_convenio`),
  ADD KEY `fk_tb_paciente_id_estado_civil` (`id_estado_civil`),
  ADD KEY `fk_tb_paciente_id_etnia` (`id_etnia`),
  ADD KEY `fk_tb_paciente_id_acomodacao` (`id_acomodacao`);

--
-- Índices de tabela `tb_paciente_nota`
--
ALTER TABLE `tb_paciente_nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_paciente_nota` (`id_paciente`),
  ADD KEY `fk_tb_paciente_nota_id_severidade` (`id_severidade`);

--
-- Índices de tabela `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_post_tb_acl_modulo_id_controller` (`id_controller`);

--
-- Índices de tabela `tb_post_descricao`
--
ALTER TABLE `tb_post_descricao`
  ADD PRIMARY KEY (`id_post`,`id_idioma`),
  ADD KEY `fk_tb_pagina_descricao_tb_pagina1_idx` (`id_post`),
  ADD KEY `fk_tb_pagina_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_post_link`
--
ALTER TABLE `tb_post_link`
  ADD PRIMARY KEY (`id_post`,`id_link`),
  ADD KEY `fk_tb_link_pagina_id_link` (`id_link`),
  ADD KEY `fk_tb_link_pagina_id_pagina` (`id_post`);

--
-- Índices de tabela `tb_post_midia`
--
ALTER TABLE `tb_post_midia`
  ADD PRIMARY KEY (`id_pagina`,`id_midia`),
  ADD UNIQUE KEY `id_pagina_UNIQUE` (`id_pagina`,`id_midia`),
  ADD UNIQUE KEY `id_midia_UNIQUE` (`id_midia`,`id_pagina`),
  ADD KEY `fk_tb_pagina_midia_tb_pagina1_idx` (`id_pagina`),
  ADD KEY `fk_tb_pagina_midia_tb_midia1_idx` (`id_midia`);

--
-- Índices de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_produto_distribuidor_id_distribuidor` (`id_distribuidor`);

--
-- Índices de tabela `tb_produto_categoria`
--
ALTER TABLE `tb_produto_categoria`
  ADD PRIMARY KEY (`id_produto`,`id_categoria`),
  ADD UNIQUE KEY `id_categoria_UNIQUE` (`id_categoria`),
  ADD UNIQUE KEY `id_produto_UNIQUE` (`id_produto`),
  ADD KEY `fk_tb_produto_categoria_tb_produto1_idx` (`id_produto`,`id_categoria`);

--
-- Índices de tabela `tb_produto_descricao`
--
ALTER TABLE `tb_produto_descricao`
  ADD PRIMARY KEY (`id_idioma`,`id_produto`),
  ADD KEY `fk_tb_produto_descricao_tb_produto1_idx` (`id_produto`),
  ADD KEY `fk_tb_produto_descricao_tb_sys_idioma1_idx` (`id_idioma`);

--
-- Índices de tabela `tb_produto_imagem`
--
ALTER TABLE `tb_produto_imagem`
  ADD PRIMARY KEY (`id_produto`,`id_midia`),
  ADD UNIQUE KEY `id_produto_UNIQUE` (`id_produto`),
  ADD UNIQUE KEY `id_midia_UNIQUE` (`id_midia`),
  ADD KEY `fk_tb_produto_imagem_tb_produto1_idx` (`id_produto`,`id_midia`);

--
-- Índices de tabela `tb_severidade_nota`
--
ALTER TABLE `tb_severidade_nota`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_sys_config`
--
ALTER TABLE `tb_sys_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`config`),
  ADD KEY `fk_tb_sys_config_id_modulo` (`id_modulo`);

--
-- Índices de tabela `tb_sys_dicionario`
--
ALTER TABLE `tb_sys_dicionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_sys_idioma`
--
ALTER TABLE `tb_sys_idioma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`);

--
-- Índices de tabela `tb_sys_idioma_dicionario`
--
ALTER TABLE `tb_sys_idioma_dicionario`
  ADD PRIMARY KEY (`id_idioma`,`id_palavra`),
  ADD KEY `fk_tb_sys_idioma_id_palavra` (`id_palavra`),
  ADD KEY `fk_tb_sys_idioma_id_idioma` (`id_idioma`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_acl_grupo`
--
ALTER TABLE `tb_acl_grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_acl_menu`
--
ALTER TABLE `tb_acl_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_acl_menu_item`
--
ALTER TABLE `tb_acl_menu_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_acl_menu_secao`
--
ALTER TABLE `tb_acl_menu_secao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_acl_modulo`
--
ALTER TABLE `tb_acl_modulo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_acl_modulo_controller`
--
ALTER TABLE `tb_acl_modulo_controller`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_acl_modulo_routes`
--
ALTER TABLE `tb_acl_modulo_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `tb_acl_usuario`
--
ALTER TABLE `tb_acl_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_acl_usuario_imagem`
--
ALTER TABLE `tb_acl_usuario_imagem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_acl_usuario_session`
--
ALTER TABLE `tb_acl_usuario_session`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_acomodacao`
--
ALTER TABLE `tb_acomodacao`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_atendimento`
--
ALTER TABLE `tb_atendimento`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_atendimento_notas`
--
ALTER TABLE `tb_atendimento_notas`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Numero sequencial';

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_comentario`
--
ALTER TABLE `tb_comentario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_convenio`
--
ALTER TABLE `tb_convenio`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_distribuidor`
--
ALTER TABLE `tb_distribuidor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_email`
--
ALTER TABLE `tb_email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Chave primária da tabela.';

--
-- AUTO_INCREMENT de tabela `tb_especialidade`
--
ALTER TABLE `tb_especialidade`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tb_estado_civil`
--
ALTER TABLE `tb_estado_civil`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_etnia`
--
ALTER TABLE `tb_etnia`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_galeria`
--
ALTER TABLE `tb_galeria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_lead`
--
ALTER TABLE `tb_lead`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_link`
--
ALTER TABLE `tb_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_medico`
--
ALTER TABLE `tb_medico`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_midia`
--
ALTER TABLE `tb_midia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_paciente`
--
ALTER TABLE `tb_paciente`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tb_paciente_nota`
--
ALTER TABLE `tb_paciente_nota`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_severidade_nota`
--
ALTER TABLE `tb_severidade_nota`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_sys_config`
--
ALTER TABLE `tb_sys_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Número sequencial da tabela.', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_sys_dicionario`
--
ALTER TABLE `tb_sys_dicionario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_sys_idioma`
--
ALTER TABLE `tb_sys_idioma`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_acl_menu`
--
ALTER TABLE `tb_acl_menu`
  ADD CONSTRAINT `fk_tb_acl_menu_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `tb_acl_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_menu_descricao`
--
ALTER TABLE `tb_acl_menu_descricao`
  ADD CONSTRAINT `tb_acl_menu_descricao_id_idioma` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_acl_menu_descricao_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_acl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_menu_item`
--
ALTER TABLE `tb_acl_menu_item`
  ADD CONSTRAINT `fk_tb_menu_item_id_controller` FOREIGN KEY (`id_item`) REFERENCES `tb_acl_modulo_controller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_menu_item_id_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_acl_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_menu_item_descricao`
--
ALTER TABLE `tb_acl_menu_item_descricao`
  ADD CONSTRAINT `tb_acl_menu_item_descricao_id_idioma` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_acl_menu_item_descricao_id_item` FOREIGN KEY (`id_item`) REFERENCES `tb_acl_menu_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_modulo_controller`
--
ALTER TABLE `tb_acl_modulo_controller`
  ADD CONSTRAINT `fk_tb_acl_modulo_classe_tb_acl_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `tb_acl_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_modulo_controller_descricao`
--
ALTER TABLE `tb_acl_modulo_controller_descricao`
  ADD CONSTRAINT `fk_tb_acl_modulo_controller_descricao_id_controller` FOREIGN KEY (`id_controller`) REFERENCES `tb_acl_modulo_controller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_acl_modulo_controller_descricao_id_idioma` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_modulo_grupo`
--
ALTER TABLE `tb_acl_modulo_grupo`
  ADD CONSTRAINT `fk_tb_acl_menu_grupo_id_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `tb_acl_grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_acl_modulo_grupo_tb_acl_modulo1` FOREIGN KEY (`id_modulo`) REFERENCES `tb_acl_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_modulo_routes`
--
ALTER TABLE `tb_acl_modulo_routes`
  ADD CONSTRAINT `fk_tb_acl_rotas_tb_acl_modulo_classe1` FOREIGN KEY (`id_controller`) REFERENCES `tb_acl_modulo_controller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_usuario`
--
ALTER TABLE `tb_acl_usuario`
  ADD CONSTRAINT `fk_tb_acl_usuario_id_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `tb_acl_grupo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_usuario_config`
--
ALTER TABLE `tb_acl_usuario_config`
  ADD CONSTRAINT `fk_tb_acl_usuario_config_id_config` FOREIGN KEY (`id_config`) REFERENCES `tb_sys_config` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_acl_usuario_config_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `tb_acl_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_acl_usuario_config_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_acl_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_usuario_imagem`
--
ALTER TABLE `tb_acl_usuario_imagem`
  ADD CONSTRAINT `tb_acl_usuario_imagem_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_acl_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_acl_usuario_session`
--
ALTER TABLE `tb_acl_usuario_session`
  ADD CONSTRAINT `fk_tb_acl_usuario_session_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `tb_acl_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_acl_usuario_session_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_acl_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD CONSTRAINT `fk_tb_agenda_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `tb_medico` (`id`);

--
-- Restrições para tabelas `tb_atendimento`
--
ALTER TABLE `tb_atendimento`
  ADD CONSTRAINT `fk_tb_atendimento_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `tb_medico` (`id`),
  ADD CONSTRAINT `fk_tb_atendimento_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`);

--
-- Restrições para tabelas `tb_atendimento_notas`
--
ALTER TABLE `tb_atendimento_notas`
  ADD CONSTRAINT `fk_tb_atendimento_id_atendimento` FOREIGN KEY (`id_atendimento`) REFERENCES `tb_atendimento` (`id`),
  ADD CONSTRAINT `fk_tb_atendimento_id_severidade` FOREIGN KEY (`id_severidade`) REFERENCES `tb_severidade_nota` (`id`),
  ADD CONSTRAINT `fk_tb_atendimento_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_acl_usuario` (`id`);

--
-- Restrições para tabelas `tb_banner_descricao`
--
ALTER TABLE `tb_banner_descricao`
  ADD CONSTRAINT `fk_tb_banner_descricao_tb_banner1` FOREIGN KEY (`id_banner`) REFERENCES `tb_banner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_banner_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_banner_imagem`
--
ALTER TABLE `tb_banner_imagem`
  ADD CONSTRAINT `fk_tb_banner_imagem_tb_banner1` FOREIGN KEY (`id_banner`) REFERENCES `tb_banner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_banner_imagem_tb_midia1` FOREIGN KEY (`id_midia`) REFERENCES `tb_midia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_banner_imagem_descricao`
--
ALTER TABLE `tb_banner_imagem_descricao`
  ADD CONSTRAINT `fk_tb_banner_imagem_descricao_tb_banner_imagem1` FOREIGN KEY (`id_banner`,`id_midia`) REFERENCES `tb_banner_imagem` (`id_banner`, `id_midia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_banner_imagem_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_categoria_descricao`
--
ALTER TABLE `tb_categoria_descricao`
  ADD CONSTRAINT `fk_tb_categoria_descricao_tb_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_categoria_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_cliente_email`
--
ALTER TABLE `tb_cliente_email`
  ADD CONSTRAINT `tb_cliente_email_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_cliente_telefone`
--
ALTER TABLE `tb_cliente_telefone`
  ADD CONSTRAINT `tb_cliente_telefone_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_distribuidor_email`
--
ALTER TABLE `tb_distribuidor_email`
  ADD CONSTRAINT `fk_tb_distribuidor_email_id_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `tb_distribuidor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_distribuidor_telefone`
--
ALTER TABLE `tb_distribuidor_telefone`
  ADD CONSTRAINT `fk_tb_distribuidor_telefone_id_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `tb_distribuidor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_galeria_descricao`
--
ALTER TABLE `tb_galeria_descricao`
  ADD CONSTRAINT `fk_tb_galeria_descricao_tb_galeria1` FOREIGN KEY (`id_galeria`) REFERENCES `tb_galeria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_galeria_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_galeria_imagem`
--
ALTER TABLE `tb_galeria_imagem`
  ADD CONSTRAINT `fk_tb_album_foto_id_album` FOREIGN KEY (`id_galeria`) REFERENCES `tb_galeria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_galeria_imagem_tb_midia1` FOREIGN KEY (`id_midia`) REFERENCES `tb_midia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_lead`
--
ALTER TABLE `tb_lead`
  ADD CONSTRAINT `tb_lead_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_lead_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_link_descricao`
--
ALTER TABLE `tb_link_descricao`
  ADD CONSTRAINT `fk_tb_link_descricao_tb_link1` FOREIGN KEY (`id_link`) REFERENCES `tb_link` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_link_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_medico`
--
ALTER TABLE `tb_medico`
  ADD CONSTRAINT `fk_tb_medico_id_especialidade` FOREIGN KEY (`id_especialidade`) REFERENCES `tb_especialidade` (`id`);

--
-- Restrições para tabelas `tb_midia_descricao`
--
ALTER TABLE `tb_midia_descricao`
  ADD CONSTRAINT `fk_tb_midia_descricao_tb_midia1` FOREIGN KEY (`id_midia`) REFERENCES `tb_midia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_midia_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_paciente`
--
ALTER TABLE `tb_paciente`
  ADD CONSTRAINT `fk_tb_paciente_id_acomodacao` FOREIGN KEY (`id_acomodacao`) REFERENCES `tb_acomodacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_paciente_id_convenio` FOREIGN KEY (`id_convenio`) REFERENCES `tb_convenio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_paciente_id_estado_civil` FOREIGN KEY (`id_estado_civil`) REFERENCES `tb_estado_civil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_paciente_id_etnia` FOREIGN KEY (`id_etnia`) REFERENCES `tb_etnia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_paciente_nota`
--
ALTER TABLE `tb_paciente_nota`
  ADD CONSTRAINT `fk_tb_paciente_nota` FOREIGN KEY (`id_paciente`) REFERENCES `tb_paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_paciente_nota_id_severidade` FOREIGN KEY (`id_severidade`) REFERENCES `tb_severidade_nota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_post`
--
ALTER TABLE `tb_post`
  ADD CONSTRAINT `fk_tb_post_tb_acl_modulo_classe1` FOREIGN KEY (`id_controller`) REFERENCES `tb_acl_modulo_controller` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_post_descricao`
--
ALTER TABLE `tb_post_descricao`
  ADD CONSTRAINT `fk_tb_pagina_descricao_tb_post` FOREIGN KEY (`id_post`) REFERENCES `tb_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_pagina_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_post_link`
--
ALTER TABLE `tb_post_link`
  ADD CONSTRAINT `fk_tb_link_pagina_id_link` FOREIGN KEY (`id_link`) REFERENCES `tb_link` (`id`),
  ADD CONSTRAINT `fk_tb_link_pagina_id_post` FOREIGN KEY (`id_post`) REFERENCES `tb_post` (`id`);

--
-- Restrições para tabelas `tb_post_midia`
--
ALTER TABLE `tb_post_midia`
  ADD CONSTRAINT `fk_tb_pagina_midia_tb_midia1` FOREIGN KEY (`id_midia`) REFERENCES `tb_midia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_pagina_midia_tb_pagina1` FOREIGN KEY (`id_pagina`) REFERENCES `tb_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `fk_tb_produto_distribuidor_id_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `tb_distribuidor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto_categoria`
--
ALTER TABLE `tb_produto_categoria`
  ADD CONSTRAINT `fk_tb_produto_categoria_tb_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_produto_categoria_tb_produto1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto_descricao`
--
ALTER TABLE `tb_produto_descricao`
  ADD CONSTRAINT `fk_tb_produto_descricao_tb_produto1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_produto_descricao_tb_sys_idioma1` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto_imagem`
--
ALTER TABLE `tb_produto_imagem`
  ADD CONSTRAINT `fk_tb_produto_imagem_tb_midia1` FOREIGN KEY (`id_midia`) REFERENCES `tb_midia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_produto_imagem_tb_produto1` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_sys_config`
--
ALTER TABLE `tb_sys_config`
  ADD CONSTRAINT `fk_tb_sys_config_id_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `tb_acl_modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_sys_idioma_dicionario`
--
ALTER TABLE `tb_sys_idioma_dicionario`
  ADD CONSTRAINT `fk_tb_sys_idioma_id_idioma` FOREIGN KEY (`id_idioma`) REFERENCES `tb_sys_idioma` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_sys_idioma_id_palavra` FOREIGN KEY (`id_palavra`) REFERENCES `tb_sys_dicionario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
