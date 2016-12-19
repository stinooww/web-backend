<?php

/**
 * Created by PhpStorm.
 * User: benhe
 * Date: 19/12/2016
 * Time: 15:46
 */
class Database
{
    private $db;

    public function __construct( $db )
    {
        $this->db = $db;
    }
    public function query( $queryString, $parameters )
    {
        $statement = $this->db->prepare( $queryString );
        if ( $parameters ) {
            foreach ($parameters as $parameter => $value) {
                $statement->bindValue( $parameter, $value );
            }
        }
        $statement->execute();
        /* data ophalen */
        $data = array();
        while ($row = $statement->fetch( PDO::FETCH_ASSOC )) {
            $data[] = $row;
        }
        /* veldnamen ophalen */
        $fieldnames = array();
        if ( isset( $data[ 0 ]) ) {
            foreach ($data[0] as $key => $value) {
                $fieldnames[] = $key;
            }
        }

        $returnArray[ 'fieldnames' ] = $fieldnames;
        $returnArray[ 'data' ] = $data;
        return $returnArray;
    }
}