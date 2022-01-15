<?php
require_once('../Utils/AutoLoader.php');


class IdeaController {
    /**
     * @throws Exception
     */
    public function read($campaign_id) {
        'SELECT * FROM IDEA WHERE CAMPAIGN_ID = ' . $campaign_id;
        $ideas = IdeaModel::get_ideas($campaign_id);
        ViewHelper::display(
            $this,
            'ReadAll',
            $ideas
        );
    }



    public function create() {
        ViewHelper::display(
            $this,
            'Create',
            array()
        );
    }

    public function edit($id) {
        $idea = IdeaModel::fetchIdea($id);
        ViewHelper::display(
            $this,
            'Edit',
            $idea
        );
    }

    public function createIdea(): void
    {
        $doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
        include_once $doc_root . '/../Utils/Database.php';

        $title = $_POST['title'];
        $description = $_POST['caption'];
        $goal = $_POST['goal'];

        // Where the file is going to be placed
        $file = time() . '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
        $rel_path = '/images/' . $file;
        $target_path = $doc_root . $rel_path;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            header("HTTP/1.1 500 Internal Server Error");
            die();
        }


        $uid = $_SESSION['id'];
        $cid = -1;
        $campaigns = CampaignModel::fetchCampaigns();
        foreach ($campaigns as $campaign) {
            if ($campaign['STATUS'] == 'running') {
                $cid = $campaign['CAMPAIGN_ID'];
            }
        };

        if ($cid == -1) {
            header('Location: /');
            die();
        }

        $query = "INSERT INTO IDEA(TITLE, DESCRIPTION, GOAL, PICTURE, USER_ID, CAMPAIGN_ID) "
            . "VALUES('$title', '$description', '$goal', '$rel_path', '$uid', '$cid')";


        if (Database::executeUpdate($query)) {
            header("Location: /organisateur");
        } else {
            header("HTTP/1.0 404 Not Found");
            die();
        }
    }

    public function editIdea(): void
    {
        $doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
        include_once $doc_root . '/../Utils/Database.php';

        if (isset($_FILES['image']) and $_FILES['image']['tmp_name'] != "") {
            echo "file !!";
            // Where the file is going to be placed
            $file = time() . '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
            $rel_path = '/images/' . $file;
            $target_path = $doc_root . $rel_path;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                header("HTTP/1.1 500 Internal Server Error");
                die();
            }
        }

        $iid = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $goal = $_POST['goal'];

        if (isset($_FILES['image']) and $_FILES['image']['tmp_name'] != "") {
            $query = "UPDATE IDEA SET TITLE = '$title', DESCRIPTION = '$description', GOAL = '$goal', PICTURE = '$rel_path' WHERE IDEA_ID = $iid;";
        } else {
            $query = "UPDATE IDEA SET TITLE = '$title', DESCRIPTION = '$description', GOAL = '$goal' WHERE IDEA_ID = $iid;";
        }

        if (Database::executeUpdate($query)) {
            header("Location: /organisateur");
        } else {
            header("HTTP/1.0 404 Not Found");
            die();
        }
    }
}
