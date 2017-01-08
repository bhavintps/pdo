<?php
if (!defined('MypRoject')) {
    echo 'Direct Access Not Allow';
    die();
}
class model extends base_model
{
    // check value is exist or not
    public function check_exist($table_name, $column_name, $base_value, $value)
    {
        $sql = "SELECT COUNT(*) FROM " . $table_name . " WHERE " . $column_name . "='$base_value'";
        $sth = $this->query($sql);
        if ($sth->fetchColumn() == $value) {
            return true;
        } else {
            return false;
        }
    }
    // count row fron selected table
    public function count_row($table_name)
    {
        $sql = "SELECT count(*) FROM " . $table_name;
        $sth = $this->query($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        return $sth->fetchColumn();
    }
    // Select all field from selected table
    public function select_table($table_name)
    {
        $sql = "SELECT * FROM " . $table_name;
        $sth = $this->query($sql);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        return $sth->fetchAll();
    }

    // select single row from table
    public function select_row($field, $table_name, $column_name, $base_value)
    {
        $sql = "SELECT " . $field . " FROM " . $table_name . " WHERE " . $column_name . "='$base_value'";
        $sth = $this->query($sql);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        return $sth->fetchColumn();
    }

    //Activate the participant
    public function Activate_row($field, $table_name, $column_name, $base_value)
    {
        $sql = "UPDATE " . $table_name . " SET " . $field . "=1 WHERE " . $column_name . "='$base_value'";
        $sth = $this->prepare($sql);
        $sth->execute();

    }
    public function encode_url($string, $key = "ins@123")
    {
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);

        $encrypted = base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_128, hash('sha256', $key, true), $string, MCRYPT_MODE_CBC, $iv));
        return $encrypted;
    }

    public function decode_url($encrypted, $key = "ins@123")
    {
        $data = base64_decode($encrypted);


        $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, hash('sha256', $key, true), substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)), MCRYPT_MODE_CBC, $iv), "\0");
        return $decrypted;
    }
}

?>