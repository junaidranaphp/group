<?php
Class User extends CI_Model
{
    function login($username, $password) {

        $this->db->select();
        $this->db->from('users');
        $this->db->where('user', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
    }
    
    function GetUserAuthentication(){
                
        if( isset( $_SESSION['USER'] ) && isset( $_SESSION['USER_PASSWD']) ){    	
            $user = $_SESSION['USER'];
            $password = $_SESSION['USER_PASSWD'];
            $sql="select * from user where user='$user' AND active=1 AND password='$password'";
            $res=mysql_query($sql);
            //die($sql);	    
            if(IsRes($res)){
                $U=mysql_fetch_assoc($res);
                $_SESSION['S_PERMISSION'] = GetTableRow("permissions","id_user",$U['id']);	    
                return $_SESSION['USER_ID'];
            } else {
                //die("2");	    
                // wrong details
                unset ( $_SESSION['USER'] );
                unset ( $_SESSION['USER_PASSWD'] );
                header("location:login.php");
                exit; 		    
            }
        }
        elseif( !isset($_REQUEST['user']) || !isset($_REQUEST['pw']) ){	
            //die("not set");
            header("location:login.php");
            exit; 	
        } else {
            $user=mysql_real_escape_string($_REQUEST['user']);
            $password=mysql_real_escape_string($_REQUEST['pw']);
            $sql="select * from user where user='$user' AND active=1 AND password=md5('$password')";
            //echo $sql;
            //die($sql);	    
            $res=mysql_query($sql);
            if(IsRes($res)){
                $U=mysql_fetch_assoc($res);
                $_SESSION['USER_ID']=$U['id'];
                $_SESSION['USER']=$_REQUEST['user'];
                $_SESSION['USER_PASSWD']=md5($password);
                $_SESSION['USER_EMAIL']=$U['email'];
                $_SESSION['USER_LANGUAGE']=$U['language'];
                $_SESSION['USER_LANGUAGE_ID'] = GetTableField("def_sprachen","sprachvariante","code",$U['language']);
                $_SESSION['USER_SACHBEARBEITER'] = $U['id_sachbearbeiter'];
                $_SESSION['S_PERMISSION'] = GetTableRow("permissions","id_user",$U['id']);
                $_SESSION['_USER'] = $U;	  
                return $U['id'];
            }
            //die('user not found ' . $sql);
            header("location:logout.php");
            exit;
        }
    }
    
    public function getLanguage($username){
            
        $this->db->select('default_lang.id');
        $this->db->from('users');
        $this->db->join('default_lang', 'default_lang.code = users.language', 'left');
        $this->db->where('user', $username);        
        $this->db->limit(1);

        $query = $this->db->get();        

        if($query->num_rows() == 1)
        {
            $row = $query->row_array();
            return $row['id'];
        }
        else
        {
          return false;
        }
        
    }
    
    public function CheckPermission($What){
        
        $UserID = $this->session->userid;
        $this->db->select($What);
        $this->db->from('permissions');
        $this->db->where('id_user', $UserID);

        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            $row = $query->row_array();
            return $row[$What];
        }
        else
        {
          return false;
        }   
    
    }
    public function DiePermission($What){
            
        $UserID = $this->session->userid;
        $this->db->select($What);
        $this->db->from('permissions');
        $this->db->where('id_user', $UserID);
        
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
            $row = $query->row_array();
            return ;
        }
        else
        {
            die("Keine Zugangsrechte: $What<br><a href='javascript:history.back();'>zur&uuml;ck</a>");
            return false;
        }
    
    
    }
    public function IsOwnAddress($id_address,$what = "Edit"){
               
        if( CheckPermission($what . 'Adressen') ) {
            return true;
        }
        if( CheckPermission($what . 'OwnAdressen') ){
            
            $this->db->select('id');
            $this->db->from('sachbearbeiter');
            $this->db->where('id_adresse', $id_address);
            $this->db->where('id_sachbearbeiter', $this->session->user_sachbearbeiter);
            
            $query = $this->db->get();
            if($query->num_rows() == 1)
            {                
                return true;
            }
            else
            {
                return false;
            }
            
        }
        return false;
    }
    
    public function IsOwnObject($id_object,$what = "Edit"){
        
        if( CheckPermission( $what . 'Objekte') ) {
            return true;
        }
        if( CheckPermission($what . 'OwnObjekte') ){            
            
            $this->db->select('id');
            $this->db->from('obj_sachbearbeiter');
            $this->db->where('id_object', $id_object);
            $this->db->where('id_sachbearbeiter', $this->session->user_sachbearbeiter);
            $query = $this->db->get();
            if($query->num_rows() == 1)
            {                
                return true;
            }
            else
            {
                return false;
            }
        }
        return false;
    }    
}
?>