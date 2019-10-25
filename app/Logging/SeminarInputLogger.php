<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class SeminarInputLogger
{
    public function __invoke(array $config)
    {
        $datetimeFormat = 'Y_m_d_H:i:s';
        $currentDateTime = date($datetimeFormat);

        $logger = new Logger('seminar');
        $logger->pushHandler(new StreamHandler(__DIR__."../../storage/logs/$currentDateTime.log", Logger::INFO));
        $logger->setFormatter(new LineFormatter("%datetime%,%message%", $datetimeFormat));

        return $logger;
    }
}