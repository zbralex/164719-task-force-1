<?php

namespace taskForce\classes\utils;


use frontend\models\UserInfo;

abstract class FilterUtil {
    public static function formFilter($form) {
        $query = UserInfo::find()
            ->joinWith('user u')
            ->orderBy('u.created_at ASC');

        foreach ($form as $key => $item) {
            if ($item) {
                switch ($key) {
                    case 'categories':
                        $query->joinWith('userCategories uc')->where(['uc.category_id' => $item]);
                        break;
                    case 'online':
                        $query->andWhere(['<=', 'online', date("Y-m-d H:i:s", strtotime("+3 hour"))]);
                        $query->andWhere(['>=', 'online', date("Y-m-d H:i:s", strtotime("+150 minutes"))]);
                        break;
                    case 'isFree':
                        $query->joinWith('tasks t');
                        $query->andWhere(['t.executor_id' => null]);
                        break;
                    case 'review':
                        $query->joinWith('review r');
                        $query->andWhere(['not', ['r.user_id' => null]]);
                        break;
                    case 'favorite':
                        $query->joinWith('favorites f');
                        $query->andWhere(['f.user_selected_id' => null]);
                        break;
                    case 'search':
                        $query->andWhere(['LIKE', 'user_info.name', $item]);
                        break;
                }
            }
        }
        return $query;
    }
}
