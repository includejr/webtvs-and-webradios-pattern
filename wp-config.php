<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'your_db_name' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'your_db_user' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'your_db_password' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '#tyqX5,t)ObhIZrcExJA62t2}+Hv%}4jf/%j7k]43FCJ6,f1DW7CF=mlXBb/d s4' );
define( 'SECURE_AUTH_KEY',  '6cFBMLN^;z#h+C:}IvRM3|=b7ja{.US3xG#?Iv5rj@~Tw$fNIe=!7ZqVskb5Lt7M' );
define( 'LOGGED_IN_KEY',    '[Xi7G)_UdC4Z+,?w$xW73XEzCtXH%+&8bD/0|N5>U:-Uv2C=0yjt,,@$V@#&5;.N' );
define( 'NONCE_KEY',        'Xx_S8J?|M_A0GyP7r~=[|(b:Gty9L*?|xl(1eZjpaC3}Ua*xN9v=j=,+A*e$UmR9' );
define( 'AUTH_SALT',        '%Pb^hl+HBqyhtE=|~-x4N5VXS&4ZI?JaI^$CWHOZI- l$RPwB|2%{9YR[-D9@QKo' );
define( 'SECURE_AUTH_SALT', 'Y7_{ZhQ`<Ma c]YT}UN1N;jGQwh_3Hjo N~ev,{_ bqXxv_){*MMg`_|]}V`T6<O' );
define( 'LOGGED_IN_SALT',   'WES1QkgyDw~7Q|@qv&->B|saJ-l@UL0L^J!bZ{G2f_[Zj5$7h7&P ce6]()z5dP(' );
define( 'NONCE_SALT',       'tp!dL#&aC,R}j:m8@53EVi/t{]<[6gAEU$}v/}|>a;@HU35@$X))Qrs*XFLK0&p@' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');

/** Permite o downloads e atualizações no localhost */
define('FS_METHOD', 'direct');
