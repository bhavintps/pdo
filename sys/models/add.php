<?php
if (!defined('MypRoject')) {
    echo 'Direct Access Not Allow';
    die();
}
class add extends base_model
{
    public function participant_add($user_name, $first_name, $last_name, $email, $contact_no, $password, $course_name, $college_code, $is_active = 0)
    {
        $sth = $this->prepare("INSERT INTO participant_details(participant_user_name,participant_first_name,participant_last_name,participant_email,participant_contactno,participant_password,participant_course,collage_code,participant_is_active)
		VALUES(:user_name,:first_name,:last_name,:email,:contact_no,:password,:course_name,
		       :college_code,:is_active)");

        $sth->bindParam(':user_name', $user_name);
        $sth->bindParam(':first_name', $first_name);
        $sth->bindParam(':last_name', $last_name);
        $sth->bindParam(':email', $email);
        $sth->bindParam(':contact_no', $contact_no);
        $sth->bindParam(':password', $password);
        $sth->bindParam(':course_name', $course_name);
        $sth->bindParam(':college_code', $college_code);
        $sth->bindParam(':is_active', $is_active);
        $sth->execute();
    }
}
?>