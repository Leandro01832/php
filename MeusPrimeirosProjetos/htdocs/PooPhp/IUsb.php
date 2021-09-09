<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author leand
 */
interface IUsb {
    const versao = 1.0;


    function conecte();
    function desconecte();
    function verVersao();
}
