<?php

namespace OVAdmin\Api\SSH;

use phpseclib\Net\SSH2;

class SSH
{
    /** @var SSH2 */
    private $connection;
    private $host;
    private $port;

    public function connect($host, $port = 22, $timeout = 3) {
        $connection = new SSH2($host, $port, $timeout);

        if (!$connection) return;

        $this->host = $host;
        $this->port = $port;
        $this->connection = $connection;

        return $this;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function execute(...$args) {
        $commandsResult = [];

        foreach ($args as $command) {
            $commandsResult[] = $this->connection->exec($command);
        }

        return $commandsResult;
    }

    public function read($expect = '', $mode = SSH2::READ_SIMPLE) {
        return $this->connection->read($expect, $mode);
    }

    public function write($cmd) {
        return $this->connection->write($this->addCaret($cmd));
    }

    private function addCaret($command) {
        return $command . '\n';
    }
}