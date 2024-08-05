<div class="d-flex h-100 w-100 flex-row border flex-wrap justify-content-start border-dark rounded rounded-3 overflow-auto p-2" style="background-color: #20202050;">
    <?php
    $getNexts = GetNextsFromFolloweds();
    if (isset($getNexts) && !empty($getNexts)) {
        foreach ($getNexts as $key => $value) {
            $data = GetSingleNext($value[0]);
            switch ($value[2]) {
                case 1: // text 
    ?>
                    <div title="from <?= htmlspecialchars($data["username"]) ?>"  class="NextItem overflow-hidden m-2 d-flex flex-column d-flex justify-content-start rounded rounded-3 border border-light" style="width:40%;height:min-content;">
                        <h5 class="m-0 w-100 p-1" style="background-color: #90909090;height:min-content;" onclick="PopUpProfileWithId(<?= $data['userid'] ?>)" title="<?= htmlspecialchars($data["username"]) ?>"><?= htmlspecialchars($data["username"]) ?></h5>
                        <h4 class="m-0 p-1 h-25" style="background-color: #60606090;height:min-content;"><?= htmlspecialchars($data["title"]) ?></h4>
                        <p class="w-100 overflow-auto h-100 m-0 p-1" style="background-color: #25252590;white-space: pre-line;"><?= htmlspecialchars($data["content"]) ?></p>
                        <a class="bg-dark text-white" href="?view=nextComments.php&id=<?= $data['nextId'] ?>"><i class="fa fas-comment"></i>comments</a>
                    </div>
                <?php break;
                case 2: //image 
                ?>
                    <div title="from <?= htmlspecialchars($data["username"]) ?>"  class="NextItem overflow-hidden m-2 d-flex flex-column d-flex justify-content-end rounded rounded-3 border border-light" style="aspect-ratio: 1;background-color: #252525;background-image:url('<?= $data["image"] ?>');background-repeat:no-repeat;background-size:contain;background-position:center;height:20vw;">
                        <h5 class="m-0 w-100 p-1 overflow-hidden" style="background-color: #25252590;height:min-content;" onclick="PopUpProfileWithId(<?= $data['userid'] ?>)" title="<?= $data['title'] ?>"><?= $data['title'] ?></h5>
                        <?php if (isset($data['descr']) && strlen($data["descr"])) { ?>
                            <p class="text-wrap w-100 overflow-auto m-0 p-1" style="max-height:30%;height:auto;background-color: #15151590;">
                                <?= htmlspecialchars($data["descr"]) ?>
                            </p>
                        <?php } ?>
                        <a class="bg-dark text-white" href="?view=nextComments.php&id=<?= $data['nextId'] ?>"><i class="fa fas-comment"></i>comments</a>
                    </div>
                <?php break;
                case 3: //video 
                ?>

                    <div title="show profile" onclick="PopUpNextComments(<?= $data['nextId'] ?>)" class="NextItem overflow-hidden m-2 d-flex flex-column d-flex justify-content-between rounded rounded-3 border border-light" style="aspect-ratio:1;height:25vw;background-color:#151515;">
                        <h5 class="m-0 w-100 p-1 overflow-hidden" style="min-height:10%;background-color: #90909090;" title="<?= $data["username"] ?>"><?= $data["username"] ?></h5>
                        <iframe class="h-100" src="<?= GenerateVideoPath($value[0], ".", $value[1]) ?>"></iframe>
                        <h4 class="m-0 p-1" style="height:min-content;background-color: #60606090;"  onclick="PopUpProfileWithId(<?= $data['userid'] ?>)"  title="<?= htmlspecialchars($data["title"]) ?>"><?= htmlspecialchars($data["title"]) ?></h4>
                        <?php if (isset($data["descr"]) && strlen($data["descr"])) { ?>
                            <p class="text-wrap w-100 h-25 overflow-auto m-0 p-1" style="background-color: #25252590;">
                                <?= htmlspecialchars($data["descr"]) ?>
                            </p>
                        <?php } ?>
                        <a class="bg-dark text-white" href="?view=nextComments.php&id=<?= $data['nextId'] ?>"><i class="fa fas-comment"></i>comments</a>
                    </div>

        <?php break;
            }
        }
    } else { ?>
        <div class="alert alert-danger w-100" style="height:min-content;">no N E X T found,go to <a href='?view=searchUser.php'> search/users </a> for find someone to follow
        <?php }

        ?>
        </div>