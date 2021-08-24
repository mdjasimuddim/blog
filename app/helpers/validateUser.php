<?php
    function validateUser($user){
        $errors=array();
        if(empty($user['username'])){
            array_push($errors, 'Username is required');
        }
        if(empty($user['email'])){
            array_push($errors, 'Email is required');
        }
        if(empty($user['password'])){
            array_push($errors, 'Password is required');
        }
        if($user['passwordConf']!==$_POST['password']){
            array_push($errors, 'Password do not much');
        }
        // $existingUser=selectOne('users',['email'=>$user['email']]);
        // if($existingUser){
        //     array_push($errors,'Email already Exists');
        // }

        $existingUser=selectOne('users',['email'=>$user['email']]);
        if($existingUser){

            if(isset($user['update-user'])&& $existingUser['id']!=$user['id']){
                array_push($errors,'Email already Exists');
            }


            if(isset($user['create-admin'])){
                array_push($errors,'Email already Exists');
            }
            
        }

        return $errors;
    }

    //for login
    function validateLogin($user){
        $errors=array();
        if(empty($user['username'])){
            array_push($errors, 'Username is required');
        }
        
        if(empty($user['password'])){
            array_push($errors, 'Password is required');
        }
        return $errors;
    }

?>