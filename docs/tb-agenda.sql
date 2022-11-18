TB_DEPARTAMENTO
	id
	departamento
	descricao
	status

TB_EMPRESA_DEPARTAMENTO
	id 		AUTO_INCREMENT
	id_empresa		| chave única
	id_departamento		|

TB_FUNCIONARIO - médico, recepcionista, enfermeiro...
	id
	id_empresa_departamento (TB_EMPRESA_DEPARTAMENTO - id)
	id_funcao


CREATE TABLE tb_departamento (

	id			int		unsigned		not null	primary key	auto_increment,
	titulo			varchar(100)				    null,
	descricao		text					    null,
	status			enum('0','1')				not null 	default '1'
	
) ENGINE=innodb charset=utf8 comment='Tabela para vincular médico a várias clínica';

CREATE TABLE tb_departamento_empresa (
	
	id_departamento		int(11)		unsigned 		not null,
	id_empresa		int(11)		unsigned		not null,
	
	primary key (id_departamento, id_empresa),
	constraint `fk_tb_departamento_id_empresa` foreign key (`id_empresa`) references `tb_empresa`(`id`),
	constraint `fk_tb_departamento_id_departamento` foreign key (`id_departamento`) references `tb_departamento`(`id`)	


)

CREATE TABLE tb_medico_clinica (

	id		int		unsigned		not null	primary key	auto_increment,
	id_medico	int(11)		unsigned 		not null,
	id_clinica	int(11)		unsigned		not null,
	created_at	timestamp				not null 	default current_timestamp(),
	updated_at	timestamp				    null 	default null,
	status		enum('0','1')				not null 	default '1',

 	unique key id_medico_clinica (id_medico, id_clinica),

	constraint `fk_tb_medico_clinica_id_medico` foreign key (`id_medico`)   references `tb_medico`(`id`),	
	constraint `fk_tb_medico_clinica_id_empresa` foreign key (`id_clinica`) references `tb_empresa`(`id`)	

) ENGINE=innodb charset=utf8 comment='Tabela para vincular médico a várias clínica';


CREATE TABLE tb_medico_agenda (

	id			int(11)		unsigned		not null 	primary	key	auto_increment,
	id_medico_clinica	int(11)		unsigned		not null,
	dia			tinyint(1)	unsigned 		not null,
	semana			tinyint(1)	unsigned		not null 	default 0,
	mes			tinyint(2)	unsigned zerofill	not null 	default 0,
	ano			tinyint(4)	unsigned zerofill	not null 	default 0,
	titulo			varchar(200)				    null	default null,
	observacao		text					    null 	default null,
	created_at		timestamp				not null 	default current_timestamp(),
	updated_at		timestamp				    null 	default null,
	atende			enum('S','N')				not null	default 'S' COMMENT 'O médico pode determinar o campo como inativo durante este horário. Se ele atende ou não. Caso ele não atenda, ele pode definir como horário de almoço, por exemplo. Este campo é apenas um controle interno para o recepcionista visualizar.',
	status			enum('0','1')				not null 	default '1',

	key horario_atendimento_UNIQUE (id_medico, dia, semana, mes, ano),

	constraint `fk_tb_medico_agenda_id_medico_clinica` foreign key (`id_medico_clinica`) references `tb_medico_clinica`(`id`)	

) ENGINE=innodb charset=utf8 comment='Tabela de cadastro de dias de atendimentos da agenda médica';

CREATE TABLE tb_medico_agenda_horario (

	id_agenda		int(11)		unsigned 		not null,
	id_medico		int(11)		unsigned		not null	
	hora_inicial		time					not null 	default '00:00:00',
	hora_final		time					not null 	default '00:00:00',
	status			enum('0','1')				not null 	default '1',

	primary key (id_agenda, id_medico, hora_inicial, hora_final),

	constraint `fk_tb_medico_agenda_horario_id_agenda` foreign key (`id_agenda`) references `tb_medico_agenda`(`id`),	
	constraint `fk_tb_medico_agenda_horario_id_medico_clinica` foreign key (`id_medico_clinica`) references `tb_medico_agenda`(`id_medico_clinica`)	

) ENGINE=innodb charset=utf8 comment='Tabela de cadastro de horários de atendimentos da agenda médica';

CREATE TABLE tb_agendamento (

	id			int(11)		unsigned		not null 	primary	key	auto_increment,
	id_agenda		int(11)		unsigned		not null,
	id_medico		int(11)		unsigned		not null,
	id_categoria		int(11)		unsigned		not null,
	titulo			varchar(100)				    null,
	descricao		text					    null,
	data_inicial		date					not null	default current_timestamp(),
	hora_inicial		time					not null	default '00:00:00',
	data_final		date					not null	default current_timestamp(),
	hora_final		time					not null	default '00:00:00',
	recorrencia		enum('on', 'off')			not null	default 'off',
	periodo			int(11)		unsigned		not null	default 0,
	cor			varchar(25)				    null	default null,
	criador			int(11)		unsigned		not null,
	lembrete		enum('on', 'off')			not null	default 'off',
	tempo_lembrete		int(11)		unsigned		not null	default 0,
	periodo_lembrete	int(11)		unsigned		not null	default 0,
	status			enum('0','1')				not null 	default '1',

	constraint `fk_tb_agendamento_id_agenda` foreign key (`id_agenda`) references `tb_medico_agenda_horario`(`id`),	
	constraint `fk_tb_agendamento_id_categoria` foreign key (`id_categoria`) references `tb_categoria`(`id`),
	constraint `fk_tb_agendamento_id_medico_clinica` foreign key (`id_medico_clinica`) references `tb_medico_clinica`(`id`)			
	constraint `fk_tb_agendamento_id_categoria` foreign key (`id_categoria`)   references `tb_categoria`(`id`),		
	constraint `fk_tb_agendamento_criador` foreign key (`criador`)   references `tb_acl_usuario`(`id`)

) ENGINE=innodb charset=utf8 comment='Tabela de cadastro de agendamentos de eventos médicos';

