<?php

namespace models;

/**
 * Task.
 */
class Task extends \base\Model
{
    public static $statuses = [
        1 => 'Новая',
        2 => 'В работе',
        3 => 'Завершена',
    ];

    public function getAll()
    {
        return $this->db->row('SELECT * FROM `tasks`');
    }

    public function findCreated($staff_id)
    {
        $params = [
            'staff_id' => $staff_id,
        ];

        $data = $this->db->row('
            SELECT * FROM `tasks` WHERE `created_by` = :staff_id
        ', $params);
        return $data;
    }

    public function findAssigned($staff_id)
    {
        $params = [
            'staff_id' => $staff_id,
        ];

        $data = $this->db->row('
            SELECT * FROM `tasks` WHERE `assigned_to` = :staff_id
        ', $params);
        return $data;
    }
}
