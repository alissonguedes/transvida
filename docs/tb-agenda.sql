CREATE TABLE tb_medico_clinica (

	id_medico	int(11)		unsigned 		not null,
	id_clinica	int(11)		unsigned		not null,
	created_at	timestamp				not null 	default current_timestamp(),
	updated_at	timestamp				    null 	default null,
	status		enum('0','1')				not null 	default '1',

 	primary	key (id_medico, id_clinica)

	constraint `fk_tb_agenda_id_medico` foreign key (`id_medico`)   references `tb_medico`(`id`),	
	constraint `fk_tb_agenda_id_empresa` foreign key (`id_clinica`) references `tb_empresa`(`id`)	

)

CREATE TABLE tb_medico_agenda (

	id		int(11)		unsigned		not null 	primary	key	auto_increment,
	id_medico	int(11)		unsigned 		not null,
	id_clinica	int(11)		unsigned		not null,
	dia		tinyint(1)	unsigned 		not null,
	mes		tinyint(2)	unsigned zerofill	    null 	default 0,
	ano		tinyint(4)	unsigned zerofill	    null 	default 0,
	observacao	text					    null 	default null,
	created_at	timestamp				not null 	default current_timestamp(),
	updated_at	timestamp				    null 	default null,
	status		enum('0','1')				not null 	default '1',

	key horario_atendimento_UNIQUE (id_medico, dia, mes, ano, hora_inicial, hora_final),

	constraint `fk_tb_agenda_id_medico` foreign key (`id_medico`) references `tb_medico`(`id`),	
	constraint `fk_tb_agenda_id_empresa` foreign key (`id_clinica`) references `tb_empresa`(`id`)	

) ENGINE=innodb charset=utf8 comment='Tabela de cadastro de dias de atendimentos da agenda médica';

CREATE TABLE tb_agenda_horario (

	id_agenda	int(11)		unsigned 		not null,	
	hora_inicial	time					not null 	default '00:00:00',
	hora_final	time					not null 	default '00:00:00',
	status		enum('0','1')				not null 	default '1',
	
	constraint `fk_tb_agenda_horario_id_agenda` foreign key (`id_agenda`) references `tb_medico_agenda`(`id`),	

) ENGINE=innodb charset=utf8 comment='Tabela de cadastro de horários de atendimentos da agenda médica';

CREATE TABLE tb_agendamento (

	id		int(11)		unsigned		not null 	primary	key	auto_increment,
	id_categoria	int(11)		unsigned		not null,
	titulo		varchar(100)				    null,
	descricao	text					    null,
	data_inicial
	hora_inicio
	data_final
	hora_final
	recorrencia
	periodo
	

) ENGINE=innodb charset=utf8 comment='Tabela de cadastro de agendamentos de eventos médicos';

