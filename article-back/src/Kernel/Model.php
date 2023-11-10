<?php

namespace Digi\Keha\Kernel;

class Model extends \PDO {


    private static function getEntityName() 
    {
        $classname = static::class;
        $tab = explode('\\', $classname);
        $entity = $tab[count($tab)-1];
        return $entity; 
    }

    private static function getClassName()
    {
        return static::class;
    }

    private static function Execute($sql)
    {
        $pdostatement = Db::getInstance()->query($sql);
        return $pdostatement->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function getAll()
    {
        $sql = "select * from ".self::getEntityName();
        return self::Execute($sql);
    }

    public static function getById(int $id)
    {
        $sql = "select * from ".self::getEntityName()." where id=$id";
        $result = self::Execute($sql);
        return $result[0];
    }

    public static function insert(array $datas)
    {
        $sql = "insert into ".self::getEntityName()." values (NULL,";
        $count = count($datas);
        $i = 1;
        foreach ($datas as $data) {
            if ($i < $count) {
                $sql .= "'$data',";
            } else {
                $sql .= "'$data'";
            }   
            $i++;         
        }
        $sql .= ")";
        return Db::getInstance()->exec($sql);
    }

    public static function delete(int $id)
    {
        $sql = "delete from ".self::getEntityName()." where id=$id";
        return Db::getInstance()->exec($sql);

    }

    public static function update(int $id, array $datas)
    {
        $sql = "update ".self::getEntityName()." set ";
        $count = count($datas);
        $i=1;
        foreach ($datas as $key=>$value) {
            if ($i<$count) {
                $sql .= "$key='$value',";
            } else {
                $sql .= "$key='$value'";
            }
            $i++;
        }
        $sql .= " where id=$id";
        return Db::getInstance()->exec($sql);
    }
}