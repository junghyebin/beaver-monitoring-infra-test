<?
$config = array();
$config['db_dsnw'] = 'sqlite:////var/roundcube/db/sqlite.db?mode=0646';
$config['default_host'] = 'mailserver';  // 👈 핵심: localhost 대신 mailserver 컨테이너 지정
$config['smtp_server'] = 'tls://mailserver';
$config['smtp_port'] = 587;
$config['support_url'] = '';
$config['des_key'] = 'rcmail-!24tercegfdsxdfvcxs345';
$config['plugins'] = array('archive', 'zipdownload');
$config['language'] = 'ko_KR';