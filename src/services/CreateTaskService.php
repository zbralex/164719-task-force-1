<?php


namespace taskForce\services;



use frontend\models\Attachment;
use Yii;
use yii\web\UploadedFile;

abstract class CreateTaskService
{
    public static function taskHandler($task, $model)
    {
        $model->files = UploadedFile::getInstances($model, 'files');

        $task->name = $model->name;
        $task->description = $model->description;
        $task->status = 'new';
        $task->price = $model->price;
        $task->category_id = $model->category;
        $task->author_id = Yii::$app->user->getIdentity()->id;
        $task->execution_date = $model->execution_date;

        $task->save(false);

        $paths = [];
        $names = [];

        foreach ($model->files as $item) {
            $names [] = $item->name;
        }

        if (count($model->files)) {
            foreach ($model->upload() as $key => $item) {
                $attachment = new Attachment();
                $paths [] = $item;
                $attachment->task_id = $task->id;
                $attachment->name = $names[$key];
                $attachment->url = $item;
                $attachment->save(false);
            }
        }
    }

}
