<?php
if (!function_exists('isFollow')) {
    function isFollow($user, $following)
    {
        $CI = &get_instance();
        $CI->load->library('session');
        $check = $CI->db->query("SELECT * FROM follows WHERE follower_id = '$user' AND following_id = '$following'")->row();
        if ($check) {
            return $check->id;
        } else {
            return 0;
        }
    }
}
