<?php
/**
 * Created by JetBrains PhpStorm.
 * User: eyal
 * Date: 7/19/12
 * Time: 10:11 AM
 * To change this template use File | Settings | File Templates.
 */

/**
 * Get the current user name or NULL if not logged in
 *
 * @return string|null
 */
function get_user_name()
{
    if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    } else {
        return null;
    }
}

?>