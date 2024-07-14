<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PDOException;

/**
 *  Checking database connections
 */
trait DatabaseChecker
{
    /**
     * @var array
     */
    private array $connections;

    /**
     * @return bool
     */
    private function checkAccessDB(): bool
    {
        while (!empty($this->connections)) {
            try {
                DB::getPdo();
                return true;
            } catch (PDOException $e) {
                $connectionName = DB::getName();
                $indexConnection = array_search($connectionName, $this->connections);
                unset($this->connections[$indexConnection]);
                DB::disconnect($connectionName);
                Log::warning("Database $connectionName don't access.");

                if(empty($this->connections))
                    break;

                $connectionName = current($this->connections);
                Config::set('database.default', $connectionName);
                DB::reconnect($connectionName);
                //dd($this->connections);
            }
        }

        Log::error("Databases are not available");
        return false;
    }

}
