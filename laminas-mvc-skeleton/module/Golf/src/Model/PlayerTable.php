<?php

namespace Golf\Model;

use Laminas\Db\Exception\RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class PlayerTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function savePlayer(Player $player)
    {
        $data = [
            "first_name" => $player->first_name,
            "last_name" => $player->last_name,
        ];

        $id = (int)$player->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getPlayer($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(
                sprintf(
                    "Cannot update album with identifier %d; does not exist",
                    $id
                )
            );
        }
        $this->tableGateway->update($data, ["id" => $id]);
    }

    public function getPlayer($id)
    {
        $id = (int)$id;
        $rowset = $this->tableGateway->select(["id" => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(
                sprintf(
                    "Could not find row with identifier %d",
                    $id
                )
            );
        }
        return $row;
    }

    public function deletePlayer($id)
    {
        $this->tableGateway->delete(["id" => (int)$id]);
    }


}