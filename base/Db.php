<?php

namespace base;

/**
 * Db.
 */
class Db
{
    protected $config;
    protected $db;

    public function __construct()
    {
        $config = require(__DIR__ . '/../config.php');
        if(isset($config['db'])) $this->config = $config['db'];
    }

    /*
     * Соединяемся с бд
     */
    public function connect()
    {
        $this->db = new \PDO(
            'mysql:host='.$this->config['db_host'].';dbname='.$this->config['db_name'].';charset=UTF8',
            $this->config['db_user'],
            $this->config['db_password']
        );
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if(!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(':'.$key, $value);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

}

