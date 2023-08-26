<?php 


declare(strict_types=1);

namespace App;

use Dotenv\Dotenv;

class Config 
{
    protected array $config = [];
    public function __construct(protected array $env)
    {
        $this->config = [
            'db' => [
                'host' => $env["DB_HOST"],
                'database' => $env["DB_DATABASE"],
                'user' => $env["DB_USER"],
                'pass' => $env["DB_PASS"],
                'driver' => $env["DB_DRIVER"] ?? 'mysql',
            ]
        ];
            
    }


    public function __get(string $name): array
    {
        return $this->config[$name] ?? null;
    }
}