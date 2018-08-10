<?php
/**
 * Created by PhpStorm.
 * User: genesystem
 * Date: 10/08/2018
 * Time: 03:53
 */

function idade($data_nascimento){
    $data_nascimento = new DateTime($data_nascimento);
    $agora = new DateTime();

    $idade = $agora->diff($data_nascimento);
    return $idade->y;
}