<?php declare(strict_types=1);


namespace mvc\app;

interface ModelInterface
{ 
    public function __construct();
	public function getTableName(): string;
	public function getDatabaseName(): string;
	public function getDataById(string $id): array;
	public function getDataByParam(string $param): array;
	public function getDataByParams(array $params = []): array;
	
	public function setDataById(string $id): bool;
	public function setDataByParam(string $param): bool;
	public function setDataByParams(array $params = []): bool;
}

abstract class Model implements ModelInterface
{
	public function __construct(){}
	public function getTableName(): string{}
	public function getDatabaseName(): string{}
	public function getDataById(string $id): array{}
	public function getDataByParam(string $param): array{}
	public function getDataByParams(array $params = []): array{}
	
	public function setDataById(string $id): bool{}
	public function setDataByParam(string $param): bool{}
	public function setDataByParams(array $params = []): bool{}
}