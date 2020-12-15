<?php

$this->title = $title;

//var_dump($staff);
?>

<main class="container staff-list">
    <div class="row mb-2">
        <?php foreach($staff as $item): ?>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <div class="staff-item__head">
                        <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
                        <h3 class="mb-0">
                            <a class="text-dark" href="#"><?= $item['fullname'] ?></a>
                        </h3>
                    </div>
                    <div class="mt-5"><span class="text-muted">тел:</span> <?= $item['phone']?></div>
                    <div class="mb-1"><span class="text-muted">email:</span> <?= $item['email']?></div>
                    <div class="mb-1"><span class="text-muted">город:</span> <?= $item['city_id']?></div>
                    <div class="mb-1"><span class="text-muted">отдел:</span> <?= $item['department_id']?></div>
                    <h5 class="card-text mb-auto mt-1">Задачи к исполнению:</h5>
                    <?php if(count($item['tasks_assigned']) == 0): ?>
                        <p>нет задач</p>
                    <?php else: ?>
                        <?php foreach($item['tasks_assigned'] as $task): ?>
                        <a href="#"><?= $task['name'] ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php if($item['id'] == 1): ?>
                    <img class="card-img-right flex-auto d-none d-md-block" src="/images/staff/1.jpg" alt="Card image cap">
                <?php else: ?>
                    <img class="card-img-right flex-auto d-none d-md-block" src="/images/staff/nophoto.png" alt="Card image cap">
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</main>
