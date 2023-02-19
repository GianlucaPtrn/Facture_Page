<?php
 function getFacture($conn,$id){
     $roleIdSearch = preg_replace("/[^a-zA-Z0-9]/", "", $_SESSION['roleIdSearch']);
     $query = $conn->prepare("SELECT factureId,name,firstName,adress,postalCode,communication,montant,paye FROM facture where $roleIdSearch = :id");
     $query->execute([
         'id'=>(int)$id
     ]);
     $result = $query->fetchAll();
     return $result;
 }