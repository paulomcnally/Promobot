<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');
/**
 * Permission Model
 *
 *
 */
class UserPermission extends AppModel {
    public $name = 'acos';
    
       public function getAcos(){
            $sql = 'SELECT id,alias,parent_id FROM shdb.acos;';
            //$sql = 'SELECT alias FROM shdb.acos where parent_id = 1;';
            return $this->query($sql);
       }
       
       public function getAcosID($id){
           $sql = 'SELECT aco_id FROM aros_acos INNER JOIN aros ON aro_id = aros.id where aros.id = ' . $id;
           return $this->query($sql);   
       }
      
       public function getAlias($id){
           $sql = 'SELECT id,alias FROM acos WHERE id = ' . $id;
           return $this->query($sql);
       }
       
       public function getAcosAlias($id){
           $sql = 'SELECT id,alias FROM acos WHERE parent_id = ' . $id;
           return $this->query($sql);
       }
       
       public function getParentAlias($id){
           $sql = 'SELECT id,alias FROM acos WHERE id = (SELECT parent_id FROM acos WHERE id = ' . $id .')';
           return $this->query($sql);
       }
       
       public function deleteAco($id){
          //var_dump($id);
          //exit();
          // $sql = "DELETE FROM aros_acos WHERE aro_id = (SELECT id FROM aros WHERE foreign_key = " . $id . " AND model = 'Group')";
           $sql = "DELETE FROM aros_acos WHERE aro_id = " . $id;
           $this->query($sql);
       }
       
       public function saveAdmin($ad,$lid){
           if($ad == 1){
               $sql = "insert into aros_acos(id,aro_id,aco_id,_create,_read,_update,_delete)values( " . $lid . ","  . $ad . ",1,1,1,1,1)";
           }
           else{
               $sql = "insert into aros_acos(id,aro_id,aco_id,_create,_read,_update,_delete)values( " . $lid . ","  . $ad . ",1,-1,-1,-1,-1)";
           }
           $this->query($sql);
       }

       public function saveAco($lid,$aro,$aco){
           $sql = "insert into aros_acos(id,aro_id,aco_id,_create,_read,_update,_delete)values( " . $lid . "," . $aro . "," . $aco . ",1,1,1,1);";
           $this->query($sql);
       }
       
       public function getLastId(){
           $sql = 'SELECT MAX( id ) FROM aros_acos;';
           return $this->query($sql);
       }
       
       public function getAroId($id){
           $sql = "SELECT id FROM aros WHERE foreign_key = " . $id . " AND model = 'Group'";
           return $this->query($sql);
       }
}   