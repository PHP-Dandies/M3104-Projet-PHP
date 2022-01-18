<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page('test');
/** @var array $data */
if (isset($data['IDEA'])){
    $idea = $data['IDEA']['IDEA'];
}
if(isset($data['USER'])){
    $user=$data['USER'];
}
if (isset($data['COMMENTS'])){
    $comments = $data['COMMENTS'];
}
if (isset($data['CONTENTS'])){
    $users = $data['CONTENTS'];
}
if(isset($data['ERROR'])){
    $errorVote = $data['ERROR'];
}
navbar();
if(!empty($data['IDEA']))
{
?>
<div class="container" style="margin-top: 5px">
        <div class="is-vertical-align is-horizontal-align" style="margin-top: 5px; height: 20vh; background-image: url('../Images/0.jpg'); background-position: center; background-size: cover;">
            <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white"><?php echo $idea['TITLE'] ?></h1>
        </div>

     <div>
            <div class="row" style="margin-top: 5px">
                <div class="col-8">
                    <p>mettre image ici</p>
                    <?php echo $idea['DESCRIPTION'] ?>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h3>Organisateur : <?php echo $data['IDEA']['USER']['USERNAME'] ?></h3>
                        <progress value="<?php echo $idea['TOTAL_POINTS'] ?>" max="<?php echo $idea['GOAL'] ?>"></progress>
                        <p><?php echo $idea['TOTAL_POINTS'] ?> sur <?php echo $idea['GOAL']?> pts</p>
                    </div>

                    <div class="card" style="margin-top: 5px">
                        <?php if($idea['REALIZED']==0){?>
                        <form action="?controller=Jury&action=juryVote&param=<?php echo $idea['IDEA_ID'];?>&campaignID=<?php echo $idea['CAMPAIGN_ID'] ?>" method="post">
                            <input type="hidden" name="campaignID" value="<?php echo $idea['CAMPAIGN_ID'] ?>">
                            <input type="submit" value="Vote">
                        </form>
                        <?php } else {?>
                        <div>
                            <p>Cette idée a déjà été validé</p>
                        </div>
                        <?php }?>
                    </div>

                    <?php
                    if (isset($data['CONTENTS'])) {
                        foreach($data['CONTENTS'] as $content) {
                            ?>
                            <div class="card" style="margin-top: 5px">
                                <h4> <?php echo $content['TITLE'] ?> </h4>
                                <code> <?php if ($content['POINTS'] < $idea['TOTAL_POINTS']) echo 'Atteint'; else echo $content['POINTS']; ?> </code>
                                <p><?php echo $content['DESCRIPTION'] ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="is_vertical_align" style="margin-top: 5px">
                <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white">Commentaires</h1>
                <?php
                if(!empty($comments)){
                foreach ($comments as $comment) { ?>
                    <div class="is_vertical_align">
                        <p><?php echo $comment['USERNAME']?></p>
                        <p><?php echo $comment['comment']?></p>
                    </div>
                    <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
else{?>
        <div>
            <?php if(empty($errorVote)){?>
            <p>Impossible d'aller plus loin, veuillez retourner à la page d'accueil</p>
            <?php }else{?>
                <p><?php echo$errorVote?></p>
            <?php }?>
            <a href="/"><button type="button"> Page d'accueil</button></a>
        </div>
    <?php
}
end_page();
?>