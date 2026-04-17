<?php 



interface  PaisRepository

{


public function  save(PaisModel $pais):void;
public function findByName(string $nombre): ?PaisModel;
public function getALL(): array;
public function delete(string $nombre):void;


}