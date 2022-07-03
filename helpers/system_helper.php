<?php 
    // redirect function
    function redirect ($page = false, $message = null, $message_type = null) {
        if (is_string($page)) {
            $location = $page;
        } else {
            $location = $_SERVER['SCRIPT_NAME'];
        }

        // check for message
        if ($message != null) {
            // set message
            $_SESSION['message'] = $message;
        }

        // check for type
        if ($message_type != null) {
            // set message type
            $_SESSION['message_type'] = $message_type;
        }

        header ('Location: ' . $location);
        exit;
    }

    function display_message() {
        if (!empty($_SESSION['message'])) {
            
            // set message var
            $message = $_SESSION['message'];

            if (!empty($_SESSION['message_type'])) {
                $message_type = $_SESSION['message_type'];

                // output
                if ($message_type == 'error') {
                    echo "<div class='alert alert-danger'>$message</div>";
                } else {
                    echo "<div class='alert alert-success'>$message</div>";
                }
            }
            // unset session list
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        } else {
            echo '';
        }
    }
?>