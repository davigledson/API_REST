<?php 
namespace App\Services;
use App\Models\User;
class UserService{
   public function get($id = null){
    if($id){
     
      return User::select($id);

    } else{
      return User::selectAll();
    }
   } 
   public function post(){
    
   } 
   public function update(){
    
   } 
   public function delete(){
    
   } 
}