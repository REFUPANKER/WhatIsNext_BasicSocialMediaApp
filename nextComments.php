<div class="p-1">
    <?php

    if (!isset($_GET["id"])) {
        echo "<div class='alert alert-danger'>ID not valid for get comments (redirecting)</div>";
        header("refresh:3,url=home.php");
        return;
    }
    $next = GetSingleNext($_GET["id"]);

    if (!isset($next)) {
        echo "<div class='alert alert-danger'>No N E X T existing for this id (redirecting)</div>";
        header("refresh:3,url=home.php");
        return;
    }

    if (isset($_POST["sendcomment"])) {
        SendComment($next["nextId"], $_POST["comment"]);
        header("refresh:0");
    }
    print_r($_POST);

    if (isset($next["image"])) { ?>
        <div title="from <?= htmlspecialchars($next["username"]) ?>" onclick="PopUpProfileWithId(<?= $next['userid'] ?>)" class="NextItem overflow-hidden m-2 d-flex flex-column d-flex justify-content-end rounded rounded-3 border border-light" style="aspect-ratio: 1;background-color: #252525;background-image:url('<?= $next["image"] ?>');background-repeat:no-repeat;background-size:contain;background-position:center;height:20vw;">
            <h5 class="m-0 w-100 p-1 overflow-hidden" style="background-color: #25252590;height:min-content;" title="<?= $next['title'] ?>"><?= $next['title'] ?></h5>
            <?php if (isset($next['descr']) && strlen($next["descr"])) { ?>
                <p class="text-wrap w-100 overflow-auto m-0 p-1" style="max-height:30%;height:auto;background-color: #15151590;">
                    <?= htmlspecialchars($next["descr"]) ?>
                </p>
            <?php } ?>
        </div>
    <?php }
    ?>

    <?php
    $comments = GetCommentsOfNext($next["nextId"]);

    ?>
    <form class="d-flex" method="post">
        <input required name="comment">
        <button name="sendcomment" value="1">Send</button>
    </form>
    <div class="d-flex flex-column w-100 h-50 overflow-auto">
        <?php
        foreach ($comments as $key => $value) {
        ?>
            <div id="<?= $value[0] ?>" class="d-flex m-1 flex-column bg-dark rounded rounded-3 p-2">
                <label title="by <?= $value[1] ?>"><?= $value[2] ?></label>
                <i><?= $value[3] ?></i>
            </div>
        <?php
        }
        ?>
    </div>
</div>