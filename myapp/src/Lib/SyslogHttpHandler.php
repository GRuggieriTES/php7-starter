<?php declare(strict_types=1);

namespace App\Lib;

use DateTimeInterface;
use Monolog\Logger;
use Monolog\Utils;
use Monolog\Handler\AbstractSyslogHandler;

class SyslogHttpHandler extends AbstractSyslogHandler
{
    const RFC3164 = 0;
    const RFC5424 = 1;
    const RFC5424e = 2;

    private $dateFormats = array(
        self::RFC3164 => 'M d H:i:s',
        self::RFC5424 => \DateTime::RFC3339,
        self::RFC5424e => \DateTime::RFC3339_EXTENDED,
    );

    public function __construct(string $host, int $port = 3000, $facility = LOG_USER, $level = Logger::DEBUG, bool $bubble = true, string $ident = 'php', int $rfc = self::RFC5424)
    {
        parent::__construct($facility, $level, $bubble);

        $this->host = $host;
        $this->port = $port;
        $this->ident = $ident;
        $this->rfc = $rfc;

    }

    protected function write(array $record): void
    {
        $dateNew = $record['datetime']->setTimezone(new \DateTimeZone('UTC'));
        $date = $dateNew->format($this->dateFormats[$this->rfc]);

        $url = "http://$this->host:$this->port";
        $data =  [
            'date' => $date,
            'message' => $record['context']
        ];
        $jsonData = json_encode($data);
        
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            echo 'Response from server: ' . $response;
        }

        curl_close($ch);
    }

    public function close(): void
    {
        echo "SyslogHttpHandler close\n";
    }
}
