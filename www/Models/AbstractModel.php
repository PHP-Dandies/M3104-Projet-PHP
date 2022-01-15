<?php
class AbstractModel {
    public static function constructFromArray(array $array): AbstractModel
    {
        $obj = new self();
        foreach ($array as $dataKey => $dataValue) {
            $setter = "set$dataKey";
            if (method_exists($obj, $setter)) {
                $obj->$setter($dataValue);
            }
        }
        return $obj;
    }
}