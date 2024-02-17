<?php
class query
{
    private static $pdo;
    public static function make($pdo)
    {
        self::$pdo=$pdo;
    }
    public static function get(string $table,$id='id')
    {
       $qu= self::$pdo->prepare("select *from {$table} where id={$id}");
       $qu->execute();
       return ($qu->fetchAll());
    }
    public static function INSERT($table, $data)
    { 
        $fielde=array_keys($data);
        $fieldStr=implode(',', $fielde);
        $valuesStr=str_repeat('?,',count($fielde)-1).'?';
        $query="insert into {$table}({$fieldStr})values({$valuesStr})";
        $ststement=self::$pdo->prepare( $query);
        $ststement->execute(array_values($data));
    }
     public static function updata($table,$data,$id)
     {
        
        $valuesStr=implode('= ?,',array_keys($data)).'= ?';
        $v=array_values($data);
        $query="update {$table} set {$valuesStr} where id={$id}";
        $ststement=self::$pdo->prepare( $query);
        $ststement->execute($v);
     }
    public static function delete($table,$id,$column='id',$oper='=')
    {
        $query="delete from {$table} where {$column} {$oper} {$id}";
        $ststement=self::$pdo->prepare( $query);
        $ststement->execute();
    }
}
?>