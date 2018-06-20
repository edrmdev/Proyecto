<?php 
/**
 * Clase creada por Edgar Rmz 01-06-2018 12:29am.
 */
class ConexionMYSQL extends PDO
{
    public function __construct($file = 'config.ini')
    {
        if (!$settings = parse_ini_file($file, TRUE))
            throw new exception('No se puede abrir archivo: ' . $file . '.');

        $dns = $settings['database']['driver'].':host='.$settings['database']['host'].((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '').';dbname='.$settings['database']['schema'];
        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
}
 ?>