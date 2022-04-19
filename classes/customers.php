<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once("collection.php");

class customers extends collection 
{
    function _contruct()
    {
        global $connection;
        
        $sql = "call customer_all()";
        
        $PDOobject = $connection->prepare($sql);
        $PDOobject->execute();
        while($row = $PDOobject->fetch(PDO::FETCH_ASSOC))
        {
            $customer = new customer($row["customer_id"], $row["firstname"],$row["lastname"], $row["address"],
                    $row["city"], $row["province"],$row["postal_code"], $row["username"], $row["password"], $row["avatar"]);
            $this->add($row["customer_id"], $customer);            
                    
        }
    }
}