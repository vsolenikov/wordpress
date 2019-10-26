<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'vovas2' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'worder2' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '794Thnk3' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'MCFJO4TRFPc9(KtDGtaI;_]%#pS+[95qv-(H$N~Aa]F5v^I9K4FnuvekA{?:0ZLc' );
define( 'SECURE_AUTH_KEY',  'o7`2x:wBQ8;iDHa+HjAxV611JP>lTl<e:J@$*Y/ok3<AE6,^zZ:jV(8BG/(bA-Zu' );
define( 'LOGGED_IN_KEY',    'gd877MtJ%#_JZ9X1<R1K}:FACJ8PA*v:J1!)!EQt$6RDHz0/ zsr;,R/r%ql;-9[' );
define( 'NONCE_KEY',        'h<y~AQ,YY@u%Ya^ti/TA^{B;NTK&THi=FJ^wZ3U`~Fu~+C*PbSQxhTgai5S7yIw`' );
define( 'AUTH_SALT',        'C=|%z/qiyMDeDiyFwWX$aC</jwLwYiK,N ?Mz)yhAJ-Lv1XbOD g[zWu[J,b*_}D' );
define( 'SECURE_AUTH_SALT', 'z T|~O+:f0J2V<]U]%6b3|-mXeuILJdwqAD*o!g[dF>XUHr:<ekNYR}im(y(8nJ?' );
define( 'LOGGED_IN_SALT',   '-v3$V|||r@7d@aGlx:y?Yb0.V+.Ti~WeP#K)LqCZktKN:a6z*Jt>H,~iK7$-GN%h' );
define( 'NONCE_SALT',       'oHR/4&kaUlRq`C!TeaQVQPghd5M!+fJm3$]hAkkf5li2g#FgA4zydmxsfH)vCSfx' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
