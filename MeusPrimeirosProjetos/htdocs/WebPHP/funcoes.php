<?php

function datatobr($data)
{
    $data = explode("-", $data);
    return $data[2]."/".$data[1]."/".$data[0];
}

function datatoen($data)
{
    $data = explode("/", $data);
    return $data[2]."-".$data[1]."-".$data[0];
}

