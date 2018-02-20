<?php

class UserHandler {
    private function __construct() {
    }
    
    public static function userDetailsCard($userId) {
        $user = DatabaseHandler::whereOne("User", "Id", $userId);

        if ($user) {
            return
            "<div class='card-body'>
                <table class='table table-bordered table-hovered table-hover table-responsive text-center'>
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>{$user->getUserName()}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{$user->getEmail()}</td>
                        </tr>
                        <tr>
                            <td>First Name</td>
                            <td>{$user->getFirstName()}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>{$user->getLastName()}</td>
                        </tr>
                    </tbody>
                </table>
            </div>";
        } else {
            return MessageHandler::warning("No user data found");
        }
    }

    public static function getUserProfileImage($userId) {
        $user = DatabaseHandler::whereOne("User", "Id", $userId);

        if ($user) {
            return
            "<div class='card-body text-center' id='profileImage'>
                <a data-fancybox='gallery' href='{$user->getProfileImage()}'>
                    <img src='{$user->getProfileImage()}' alt='profile' id='profile-image' class='card-img'>
                </a>
            </div>";
        } else {
            return MessageHandler::warning("No profile image found");
        }        
    }

    public static function updateProfileImage($userId) {
        if (isset($_POST["upload"])) {
            $file = $_FILES["file"];
            $upload = new Upload();

            if ($upload->checkUpload($file)) {
                $upload->fileUpload($file, "assets/images/uploads/profiles/", "profile$userId");
                $fileName = $upload->getFinallyName();

                $sql = "UPDATE User SET ProfileImage = '$fileName' WHERE id = $userId";

                DatabaseHandler::update($sql);

                return MessageHandler::success("Image uploaded successfully");
            } else {
                return MessageHandler::error($upload->getErrorMsg());
            }
        }
    }
}

?>
