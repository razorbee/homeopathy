<?php

$localhost = array('127.0.0.1', "::1", 'localhost');
if(in_array($_SERVER['REMOTE_ADDR'], $localhost)){
 $rbpath = 'C:/xampp/htdocs/homeopathy/';
   $domain = 'http://localhost/homeopathy/';

  $rb_database= 'homeopathy';
  $rb_username = 'root';
  $rb_password = '';
  $storage = 'C:/xampp/htdocs/data/';
}

else{
  $rbpath = '/var/www/html/pms.razorbee.com/homeopathy/';
   $domain = 'http://pms.razorbee.com/homeopathy/';
  $rb_database= 'pms_dr_diary';
  $rb_username = 'root';
   $rb_password = 'razorbee@123';
   $storage = '/var/www/html/pms.razorbee.com/data/';
}

return array (
  'auth' =>
  array (
    'defaults' =>
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' =>
    array (
      'web' =>
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' =>
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' =>
    array (
      'users' =>
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' =>
    array (
      'users' =>
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'app' =>
  array (
    'has_installed' => '1',
    'name' => 'Dr Diary',
    'env' => 'local',
    'debug' => true,
    'url' => 'localhost',
    'timezone' => 'UTC',
    'generic_name' => '0',
    'fancy_font' => '1',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'key' => 'base64:jXjHoXK+WlQrghiuqsXtQWk6lfci78qMMZr/dHO0Ccs=',
    'cipher' => 'AES-256-CBC',
    'log' => 'single',
    'log_level' => 'debug',
    'providers' =>
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' =>
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
    ),
  ),
  'mail' =>
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailtrap.io',
    'port' => '26',
    'from' =>
    array (
      'address' => 'hello@example.com',
      'name' => '',
    ),
    'encryption' => NULL,
    'username' => '',
    'password' => '',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' =>
    array (
      'theme' => 'default',
      'paths' =>
      array (
        0 => $rbpath.'resources/views/vendor/mail',
      ),
    ),
  ),
  'services' =>
  array (
    'mailgun' =>
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' =>
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' =>
    array (
      'secret' => NULL,
    ),
    'stripe' =>
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'database' =>
  array (
    'default' => 'mysql',
    'connections' =>
    array (
      'sqlite' =>
      array (
        'driver' => 'sqlite',
        'database' => 'test1',
        'prefix' => '',
      ),
      'mysql' =>
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',

        'database' => $rb_database,
        'username' => $rb_username,
        'password' =>  $rb_password,
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => NULL,
      ),
      'pgsql' =>
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'test1',
        'username' => 'rbanam',
        'password' => 'Test135#',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' =>
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'test1',
        'username' => 'rbanam',
        'password' => 'Test135#',
        'charset' => 'utf8',
        'prefix' => '',
      ),
    ),
    'migrations' => 'migrations',
    'redis' =>
    array (
      'client' => 'predis',
      'default' =>
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'cache' =>
  array (
    'default' => 'file',
    'stores' =>
    array (
      'apc' =>
      array (
        'driver' => 'apc',
      ),
      'array' =>
      array (
        'driver' => 'array',
      ),
      'database' =>
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' =>
      array (
        'driver' => 'file',
        'path' => $storage.'storage/framework/cache/data',
      ),
      'memcached' =>
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' =>
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' =>
        array (
        ),
        'servers' =>
        array (
          0 =>
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' =>
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'dr_assistant_cache',
  ),
  'session' =>
  array (
    'driver' => 'file',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => $storage.'storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' =>
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'dr_diary_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'queue' =>
  array (
    'default' => 'sync',
    'connections' =>
    array (
      'sync' =>
      array (
        'driver' => 'sync',
      ),
      'database' =>
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' =>
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' =>
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' =>
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' =>
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'broadcasting' =>
  array (
    'default' => 'log',
    'connections' =>
    array (
      'pusher' =>
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' =>
        array (
        ),
      ),
      'redis' =>
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' =>
      array (
        'driver' => 'log',
      ),
      'null' =>
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'view' =>
  array (
    'paths' =>
    array (
      0 => $rbpath.'resources/views',
    ),
    'compiled' => $storage.'storage/framework/views',
  ),
  'filesystems' =>
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' =>
    array (
      'local' =>
      array (
        'driver' => 'local',
        'root' => $storage.'storage/app',
      ),
      'public' =>
      array (
        'driver' => 'local',
        'root' => $storage.'storage/app/public',
        'url' => 'localhost/storage',
        'visibility' => 'public',
      ),
      's3' =>
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
      ),
    ),
  ),
  'trustedproxy' =>
  array (
    'proxies' =>
    array (
      0 => '192.168.1.10',
    ),
    'headers' =>
    array (
      1 => 'FORWARDED',
      2 => 'X_FORWARDED_FOR',
      4 => 'X_FORWARDED_HOST',
      8 => 'X_FORWARDED_PROTO',
      16 => 'X_FORWARDED_PORT',
    ),
  ),
  'datatables' =>
  array (
    'search' =>
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
    ),
    'index_column' => 'DT_Row_Index',
    'engines' =>
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
    ),
    'builders' =>
    array (
      'Illuminate\\Database\\Eloquent\\Relations\\Relation' => 'eloquent',
      'Illuminate\\Database\\Eloquent\\Builder' => 'eloquent',
      'Illuminate\\Database\\Query\\Builder' => 'query',
      'Illuminate\\Support\\Collection' => 'collection',
    ),
    'nulls_last_sql' => '%s %s NULLS LAST',
    'error' => NULL,
    'columns' =>
    array (
      'excess' =>
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' =>
      array (
        0 => 'action',
      ),
      'blacklist' =>
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' =>
    array (
      'header' =>
      array (
      ),
      'options' => 0,
    ),
  ),
);
?>
