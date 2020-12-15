<?php

namespace models;

/**
 * Staff.
 */
class Staff extends \base\Model
{
    public static $departments = [
        1 => 'Отдел продаж',
        2 => 'Отдел маркетинга',
        3 => 'Отдел управления',
        4 => 'Отдел финансов',
    ];

    public function getAll()
    {
        $data = $this->db->row('
            SELECT * FROM `staff` s
            -- INNER JOIN `tasks` tasks_created ON tasks_created.`created_by` = s.`id`
            -- INNER JOIN `tasks` tasks_assingned ON tasks_assingned.`assingned_to` = s.`id`
            -- GROUP BY s.`id`
        ');
        $result = array_map(function($item){
            $item['department_id'] = self::$departments[$item['department_id']];
            $item['city_id'] = City::$cities[$item['city_id']];
            $item['tasks_created'] = (new Task)->findCreated($item['id']);
            $item['tasks_assigned'] = (new Task)->findAssigned($item['id']);
            return $item;
        }, $data);

        return $result;
    }
}
