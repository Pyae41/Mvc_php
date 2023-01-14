<?php

namespace app\core;

trait Model
{

    use Database;

    public function all()
    {
        $query = "select * from $this->table";

        return $this->query($query);
    }
    public function select($id = "")
    {
        $query = "select * from $this->table where id = $id";
        $result = $this->query($query);

        return $result[0];
    }
    public function save($data)
    {
        if (!empty($this->fillable)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->fillable)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);

        $query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

        return $this->saveQuery($query, $data);
    }

    public function update($id, $data, $id_column = 'id')
    {

        /** remove unwanted data **/
        if (!empty($this->fillable)) {
            foreach ($data as $key => $value) {

                if (!in_array($key, $this->fillable)) {
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " where $id_column = :$id_column ";

        $data[$id_column] = $id;

        return $this->updateQuery($query, $data);
    }
    public function delete($id, $id_column = 'id')
    {

        $query = "delete from $this->table where $id_column = $id ";

        return $this->deleteQuery($query);
    }
}
