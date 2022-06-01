<?php

namespace App\Console\Commands;

use Artisan;
use File;
use Illuminate\Console\Command;
use Jackiedo\DotenvEditor\DotenvEditor;
use Storage;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts installation process';
    protected DotenvEditor $editor;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(DotenvEditor $editor)
    {
        $this->editor = $editor;
        if ($this->checkEnv()) {
            $this->alert('Application already installed');
            return 1;
        }

        $this->info('Starting setup process...');

        $app_name = $this->ask('Choose app name', 'Photo app');
        $this->setEnvValue('APP_NAME', $app_name);

        $app_env = $this->confirm('Is this a production version?', true);
        if ($app_env) {
            $this->setEnvValue('APP_ENV', 'production');
        } else {
            $this->setEnvValue('APP_ENV', 'local');
        }

        $this->info('Generating app key...');
        $this->setEnvValue('APP_KEY');
        $app_key = Artisan::call('key:generate');
        if ($app_key == 0) {
            $this->info('App was generated successfully!');
        } else {
            $this->error('Failed to generate key (' . $app_key . ')');
        }

        $app_url = $this->ask('Choose app url', 'http://example.com');
        $this->setEnvValue('APP_URL', $app_url);

        $log_channel = $this->choice('Logging channel', ['stack', 'syslog', 'slack', 'daily', 'errorlog', 'monolog', 'null', 'papertrail', 'single'], 0);
        $this->setEnvValue('LOG_CHANNEL', $log_channel);
        $this->setEnvValue('LOG_DEPRECATIONS_CHANNEL', 'null');
        $log_level = $this->choice('Logging level', ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'], 7);
        $this->setEnvValue('LOG_LEVEL', $log_level);

        $db_connection = $this->choice('Database', ['mysql'], 0);
        $this->setEnvValue('DB_CONNECTION', $db_connection);
        $db_host = $this->ask('Database host', '127.0.0.1');
        $this->setEnvValue('DB_HOST', $db_host);
        $db_port = $this->ask('Database port', '3306');
        $this->setEnvValue('DB_PORT', $db_port);
        $db_database = $this->ask('Database database', 'photo_app');
        $this->setEnvValue('DB_DATABASE', $db_database);
        $db_username = $this->ask('Database username', 'photo_app');
        $this->setEnvValue('DB_USERNAME', $db_username);
        $db_password = $this->secret('Database password');
        $this->setEnvValue('DB_PASSWORD', $db_password);

        $broadcast_driver = $this->choice('Broadcast driver', ['log'], 0);
        $this->setEnvValue('BROADCAST_DRIVER', $broadcast_driver);
        $cache_driver = $this->choice('Cache driver', ['apc', 'array', 'database', 'file', 'memcached', 'redis', 'dynamodb', 'octane'], 3);
        $this->setEnvValue('CACHE_DRIVER', $cache_driver);
        $fileSystem_disk = $this->choice('File system disk', ['local', 'public', 's3'], 0);
        $this->setEnvValue('FILESYSTEM_DISK', $fileSystem_disk);
        $queue_connection = $this->choice('Queue connection', ['sync', 'database', 'beanstalkd', 'sqs', 'redis'], 0);
        $this->setEnvValue('QUEUE_CONNECTION', $queue_connection);
        $session_driver = $this->choice('Session driver', ['file', 'cookie', 'database', 'memcached', 'redis', 'dynamodb', 'array'], 2);
        $this->setEnvValue('SESSION_DRIVER', $session_driver);
        $session_lifetime = $this->ask('Session lifetime', 120);
        $this->setEnvValue('SESSION_LIFETIME', $session_lifetime);

        if ($cache_driver == 'memcached' || $queue_connection == 'memcached') {
            $memcached_host = $this->ask('Memcached host', '127.0.0.1');
            $this->setEnvValue('MEMCACHED_HOST', $memcached_host);
        } else {
            $this->info('Memcached wasn\'t used. Not asking for input');
            $this->setEnvValue('MEMCACHED_HOST', '127.0.0.1');
        }

        if ($cache_driver == 'redis' || $queue_connection == 'redis' || $session_driver == 'redis') {
            $redis_host = $this->ask('Redis host', '127.0.0.1');
            $this->setEnvValue('REDIS_HOST', $redis_host);
            $redis_password = $this->secret('Redis password');
            $this->setEnvValue('REDIS_PASSWORD', $redis_password);
            $redis_port = $this->ask('Redis port', '6379');
            $this->setEnvValue('REDIS_PORT', $redis_port);
        } else {
            $this->info('Redis wasn\'t used. Not asking for input');
            $this->setEnvValue('REDIS_HOST', '127.0.0.1');
            $this->setEnvValue('REDIS_PASSWORD', 'null');
            $this->setEnvValue('REDIS_PORT', '6379');
        }

        $mail_mailer = $this->choice('Mail mailer', ['smtp', 'ses', 'mailgun', 'postmark', 'sendmail', 'log', 'array', 'failover'], 0);
        $this->setEnvValue('MAIL_MAILER', $mail_mailer);
        $mail_host = $this->ask('Mail host', 'mailhog');
        $this->setEnvValue('MAIL_HOST', $mail_host);
        $mail_port = $this->ask('Mail port', '1025');
        $this->setEnvValue('MAIL_PORT', $mail_port);
        $mail_username = $this->ask('Mail username', 'null');
        $this->setEnvValue('MAIL_USERNAME', $mail_username);
        $mail_password = $this->secret('Mail password');
        $this->setEnvValue('MAIL_PASSWORD', $mail_password);
        $mail_encryption = $this->choice('Mail encryption', ['null', 'TLS', 'SSL']);
        $this->setEnvValue('MAIL_ENCRYPTION', $mail_encryption);
        $mail_from_address = $this->ask('Mail from address', 'hello@example.com');
        $this->setEnvValue('MAIL_FROM_ADDRESS', $mail_from_address);
        $mail_from_name = $this->ask('Mail from name', '${APP_NAME}');
        $this->setEnvValue('MAIL_FROM_NAME', $mail_from_name);

        if ($fileSystem_disk == 's3') {
            $aws_access_key_id = $this->ask('AWS access key ID');
            $this->setEnvValue('AWS_ACCESS_KEY_ID', $aws_access_key_id);
            $aws_secret_access_key = $this->ask('AWS secret access key');
            $this->setEnvValue('AWS_SECRET_ACCESS_KEY', $aws_secret_access_key);
            $aws_default_region = $this->ask('AWS default region', 'us-east-1');
            $this->setEnvValue('AWS_DEFAULT_REGION', $aws_default_region);
            $aws_bucket = $this->ask('AWS bucket');
            $this->setEnvValue('AWS_BUCKET', $aws_bucket);
            $aws_use_path_style_endpoint = $this->confirm('AWS use path style endpoint');
            $this->setEnvValue('AWS_USE_PATH_STYLE_ENDPOINT', $aws_use_path_style_endpoint);
        } else {
            $this->info('AWS wasn\'t used. Not asking for input');
            $this->setEnvValue('AWS_ACCESS_KEY_ID');
            $this->setEnvValue('AWS_SECRET_ACCESS_KEY');
            $this->setEnvValue('AWS_DEFAULT_REGION', 'us-east-1');
            $this->setEnvValue('AWS_BUCKET');
            $this->setEnvValue('AWS_USE_PATH_STYLE_ENDPOINT', 'false');
        }

        $this->info('Setup was complete!');

        return 0;
    }

    public function checkEnv()
    {
        $file_exists = file_exists('.env');
        return $file_exists;
    }

    public function setEnvValue($key, $value = "") {
        // $this->editor->load();
        $this->editor->setKey($key, $value);
        $this->editor->save();
    }
}
